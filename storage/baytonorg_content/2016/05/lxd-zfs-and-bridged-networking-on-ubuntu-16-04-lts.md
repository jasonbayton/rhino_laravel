---
title: "LXD, ZFS and bridged networking on Ubuntu 16.04 LTS+"
date: "2016-05-02"
categories:
  - "guides"
tags:
  - "bridge"
  - "containers"
  - "lxc"
  - "lxd"
  - "ubuntu"
  - "xenial"
  - "zfs"
---

_Updated 01/2017_

LXD works perfectly fine with a directory-based storage backend, but both speed and reliability are greatly improved when ZFS is used instead. 16.04 LTS saw the first officially supported release of ZFS for Ubuntu and having just set up a fresh LXD host on [Elastichosts](//elastichosts.com) utilising both ZFS and bridged networking, I figured it'd be a good time to document it.

In this article I'll walk through the installation of LXD, ZFS and Bridge-Utils on Ubuntu 16.04 and configure LXD to use either a physical ZFS partition or loopback device combined with a bridged networking setup allowing for containers to pick up IP addresses via DHCP on the (v)LAN rather than a private subnet.

#### Before we begin

This walkthrough assumes you already have a Ubuntu 16.04 server host set up and ready to work with. If you do not, please [download](http://www.ubuntu.com/download/server) and install it now.

You'll also need a spare disk, partition or adequate space on-disk to support a loopback file for your ZFS filesystem.

Finally this guide is reliant on the command line and some familiarity with the CLI would be advantageous, though I'll do my best to make this a copy & paste article as much as possible.

## Part 1: Installation

To get started, let's install our packages. They can all be installed with one command as follows:

`sudo apt-get install lxd zfsutils-linux bridge-utils`

However for this I will output the commands and the result for each package individually:

`sudo apt-get install lxd`

Reading package lists... Done
Building dependency tree       
Reading state information... Done
lxd is already the newest version (2.0.0-0ubuntu4).
0 upgraded, 0 newly installed, 0 to remove and 0 not upgraded.

`sudo apt-get install zfsutils-linux`

Reading package lists... Done
Building dependency tree       
Reading state information... Done
\[...\]
The following NEW packages will be installed:
  libnvpair1linux libuutil1linux libzfs2linux libzpool2linux zfs-doc zfs-zed
  zfsutils-linux
0 upgraded, 7 newly installed, 0 to remove and 16 not upgraded.
Need to get 884 kB of archives.
\[...\]
Setting up zfs-doc (0.6.5.6-0ubuntu8) ...
Setting up libuutil1linux (0.6.5.6-0ubuntu8) ...
Setting up libnvpair1linux (0.6.5.6-0ubuntu8) ...
Setting up libzpool2linux (0.6.5.6-0ubuntu8) ...
Setting up libzfs2linux (0.6.5.6-0ubuntu8) ...
Setting up zfsutils-linux (0.6.5.6-0ubuntu8) ...
\[...\]
Setting up zfs-zed (0.6.5.6-0ubuntu8) ...
zed.service is a disabled or a static unit, not starting it.
Processing triggers for libc-bin (2.23-0ubuntu3) ...
Processing triggers for ureadahead (0.100.0-19) ...
Processing triggers for systemd (229-4ubuntu4) ...

`sudo apt-get install bridge-utils`

Reading package lists... Done
Building dependency tree       
Reading state information... Done
The following NEW packages will be installed:
  bridge-utils
0 upgraded, 1 newly installed, 0 to remove and 16 not upgraded.
Need to get 28.6 kB of archives.
\[...\]
Preparing to unpack .../bridge-utils\_1.5-9ubuntu1\_amd64.deb ...
Unpacking bridge-utils (1.5-9ubuntu1) ...
Processing triggers for man-db (2.7.5-1) ...
Setting up bridge-utils (1.5-9ubuntu1) ...

You'll notice I've installed LXD, ZFS and bridge utils. LXD should be installed by default on any 16.04 host as is shown by the output above, however should there be any updates this will bring them down before we begin.

ZFS and bridge utils are not installed by default; ZFS needs to be installed to run our storage backend and bridge utils is required in order for our bridged interface to work.

## Part 2: Configuration

With the relevant packages installed, we can now move on to configuration. We'll start by configuring the bridge as before this is complete we won't be able to obtain DHCP addresses for containers within LXD.

### Setting up the bridge

We'll begin by opening `/etc/network/interfaces` in a text editor. I like vim:

`sudo vim /etc/network/interfaces`

\# The loopback network interface
auto lo
iface lo inet loopback

# The primary network interface
auto eth0
iface eth0 inet dhcp

This is the default `interfaces` file. What we'll do here is add a new bridge named `br0`. The simplest edit to make to this file is as follows (note the emphasis):

\# The loopback network interface
auto lo
iface lo inet loopback

# The primary network interface
auto **br0**
iface **br0** inet dhcp
    **bridge\_ports eth0**

iface eth0 inet **manual**

This will set the `eth0` interface to _manual_ and create a new bridge that piggybacks directly off it. If you wish to create a static interface while you're editing this file, the following may help you:

\# The loopback network interface
auto lo
iface lo inet loopback

# The primary network interface
auto br0
iface br0 inet static
        address 192.168.0.44
        netmask 255.255.255.0
        network 192.168.0.0
        broadcast 192.168.0.255
        gateway 192.168.0.1
        # dns-\* options are implemented by the resolvconf package, if installed
        dns-nameservers 8.8.8.8 8.8.4.4 #google-dns
        dns-search localdomain.local #optional-line
        # bridge options
        bridge\_ports eth0
iface eth0 inet manual

Following any edits, it's a good idea to restart the interfaces to force the changes to take place. Obviously if you're connected via SSH this will disconnect your session. You'll need to have physical access to the machine/VM.

`sudo ifdown eth0 && sudo ifup eth0 && sudo ifup br0`

Running `ifconfig` on the CLI will now confirm the changes have been applied:

jason@ubuntu-lxdzfs:~$ ifconfig
**br0**       Link encap:Ethernet  HWaddr 00:0c:29:2f:cd:30  
          inet addr:192.168.0.44  Bcast:192.168.0.255  Mask:255.255.255.0
          inet6 addr: fe80::20c:29ff:fe2f:cd30/64 Scope:Link
          UP BROADCAST RUNNING MULTICAST  MTU:1500  Metric:1
          RX packets:2235187 errors:0 dropped:37359 overruns:0 frame:0
          TX packets:111487 errors:0 dropped:0 overruns:0 carrier:0
          collisions:0 txqueuelen:1000
          RX bytes:2108302272 (2.1 GB)  TX bytes:8296995 (8.2 MB)

eth0      Link encap:Ethernet  HWaddr 00:0c:29:2f:cd:30  
          inet6 addr: fe80::20c:29ff:fe2f:cd30/64 Scope:Link
          UP BROADCAST RUNNING MULTICAST  MTU:1500  Metric:1
          RX packets:161568870 errors:0 dropped:0 overruns:0 frame:0
          TX packets:132702 errors:0 dropped:0 overruns:0 carrier:0
          collisions:0 txqueuelen:1000
          RX bytes:185204051222 (185.2 GB)  TX bytes:23974566 (23.9 MB)

\[...\]

### Configuring LXD & ZFS

With the bridge up and running we can now begin to configure LXD. Before we start setting up containers, LXD requests we run `sudo lxd init` to configure the package. As part of this, we'll be selecting our newly created bridge for network connectivity and configuring ZFS as LXD will take care of both during setup.

For this guide I'll be using a dedicated hard drive for the ZFS storage backend, though the same procedure can be used for a dedicated partition if you don't have a spare drive handy. For those wishing to use a loopback file for testing, the procedure is slightly different and will be addressed below.

#### Find the disk/partition to be used

First we'll run `sudo fdisk -l` to list the available disks & partitions on the server, here's a relevant snippet of the output I get:

**Disk /dev/sda: 20 GiB**, 21474836480 bytes, 41943040 sectors
\[...\]

Device     Boot    Start      End  Sectors  Size Id Type
/dev/sda1  \*        2048 36132863 36130816 17.2G 83 Linux
/dev/sda2       36134910 41940991  5806082  2.8G  5 Extended
/dev/sda5       36134912 41940991  5806080  2.8G 82 Linux swap / Solaris

**Disk /dev/sdb: 20 GiB**, 21474836480 bytes, 41943040 sectors
\[...\]

Device     Boot    Start      End  Sectors  Size Id Type
/dev/sdb1           2048 41940991 41938944  20G  83 Linux

Make a note of the partition or drive to be used. In this example we'll use partition `sdb1` on disk `/dev/sdb`

#### Be aware

If your disk/partition is currently formatted and mounted on the system, it will need to be unmounted with `sudo umount /path/to/mountpoint` before continuing, or LXD will error during configuration.

Additionally if there's an `fstab` entry this will need to be removed before continuing, otherwise you'll see mount errors when you next reboot.

#### Configure LXD

#### Changes to bridge configuration

As of LXD 2.5 there have been a few changes. If installing a version of LXD under 2.5 please continue below, however for 2.5 and above in order to use the pre-configured bridge select **No** for `Do you want to configure the LXD bridge (yes/no)?` then see **Configure LXD bridge (2.5+)** below for details of adding the bridge manually after this.

Check the version of LXD by running `sudo lxc info`.

Start the configuration of LXD by running `sudo lxd init`

jason@ubuntu-lxd-tut:~$ sudo lxd init
Name of the storage backend to use (dir or zfs): **zfs**
Create a new ZFS pool (yes/no)? **yes**
Name of the new ZFS pool: **lxd**
Would you like to use an existing block device (yes/no)? **yes**
Path to the existing block device: **/dev/sdb1**
Would you like LXD to be available over the network (yes/no)? **no**
Do you want to configure the LXD bridge (yes/no)? **yes**
Warning: Stopping lxd.service, but it can still be activated by:
  lxd.socket
LXD has been successfully configured.

Let's break the above options down:

`Name of the storage backend to use (dir or zfs): **zfs**`

Here we're defining ZFS as our storage backend of choice. The other option, DIR, is a flat-file storage option that places all containers on the host filesystem under `/var/lib/lxd/containers/` (though the ZFS partition is transparently mounted under the same path and so accessed equally as easily). It doesn't benefit from features such as compression and copy-on-write however, so the performance of the containers using the DIR backend simply won't be as good.

`Create a new ZFS pool (yes/no)? **yes**` `Name of the new ZFS pool: **lxd**`

Here we're creating a brand new ZFS pool for LXD and giving it the name of "lxd". We could also choose to use an existing pool if one were to exist, though as we left ZFS unconfigured it does not apply here.

`Would you like to use an existing block device (yes/no)? **yes**` `Path to the existing block device: **/dev/sdb1**`

Here we're opting to use a physical partition rather than a loopback device, then providing the physical location of said partition.

`Would you like LXD to be available over the network (yes/no)? **no**`

It's possible to connect to LXD from other LXD servers or via the API from a browser (see [https://linuxcontainers.org/lxd/try-it/](https://linuxcontainers.org/lxd/try-it/) for an example of this).

As this is a simple installation we won't be utilising this functionality and it is as such left unconfigured. Should we wish to enable it at a later date, we can run:

`lxc config set core.https_address [::]` `lxc config set core.trust_password **some-secret-string**`

Where _some-secret-string_ is a secure password that'll be required by other LXD servers wishing to connect in order to admin the LXD host or retried non-public published images.

`Do you want to configure the LXD bridge (yes/no)? **yes**`

Here we tell LXD to use our already-preconfigured bridge. This opens a new workflow as follows:

![Screenshot from 2016-05-02 10-54-58](/wp-content/uploads/2016/05/Screenshot-from-2016-05-02-10-54-58.png)
_We don't want LXD to create a new bridge for us, so we'll select **no** here._

![Screenshot from 2016-05-02 10-55-09](/wp-content/uploads/2016/05/Screenshot-from-2016-05-02-10-55-09.png)
_LXD now knows we may have our own bridge already set up, so we'll select **yes** in order to declare it._

![Screenshot from 2016-05-02 10-55-19](/wp-content/uploads/2016/05/Screenshot-from-2016-05-02-10-55-19.png)
_Finally we'll input the bridge name and select OK. LXD will now use this bridge._

And with that, LXD will finish configuration and ready itself for use.

#### Configure LXD bridge (2.5+)

In version 2.5, the above purple bridge workflow has been retired in favour of the new `lxc network` command.

With `lxd init` complete above, add the `br0` interface to the default profile with:

`lxc network attach-profile br0 default eth0`

If by accident the `lxdbr0` interface was configured, it must be first detached from the default profile with:

`lxc network detach-profile lxdbr0 default eth0`

It'll be obvious if this needs to be done as running `lxc network attach-profile br0 default eth0` will result in the error `error: device already exists`.

With that complete, LXD will now successfully use the pre-configured bridge.

#### Configuring LXD with a ZFS loopback device

Run `sudo lxd init` as above, but use the following options instead.

Name of the storage backend to use (dir or zfs): **zfs**
Create a new ZFS pool (yes/no)? **yes**
Name of the new ZFS pool: **lxd-loop**
Would you like to use an existing block device (yes/no)? **no**
Size in GB of the new loop device (1GB minimum): **20**

The size in GB of the ZFS partition is important, we don't want to run out of space any time soon. Although ZFS partitions may be resized, it's better to be a little generous now and not have to worry about reconfiguring it later.

### Increasing file and inode limits

Since it's entirely possible we may in the future wish to run multiple LXD containers, it's a good idea to already increase the number of open files and inode limits, this will prevent the dreaded "too many open files" errors which commonly occur with container solutions.

For the inode limits, open the `sysctl.conf` file as follows:

`sudo vim /etc/sysctl.conf`

Now add the following lines, as recommended by the [LXD project](https://github.com/lxc/lxd/blob/master/doc/production-setup.md)

fs.inotify.max\_queued\_events = 1048576
fs.inotify.max\_user\_instances = 1048576
fs.inotify.max\_user\_watches = 1048576

It should look as follows:

[![](/wp-content/uploads/2016/05/lxdsnip.png)](/wp-content/uploads/2016/05/lxdsnip.png)

After saving the file we'll need to reboot, but not yet as we'll also configure the open file limits.

Open the `limits.conf` file as follows:

`sudo vim /etc/security/limits.conf`

Now add the following lines. 100K should be enough:

\* soft nofile 100000
\* hard nofile 100000

It should look as follows:

[![](/wp-content/uploads/2016/05/lxdsnip2.png)](/wp-content/uploads/2016/05/lxdsnip2.png)

Once the server is rebooted (this is important!) the new limits will apply and we'll have future-proofed the server for now.

`sudo reboot`

## Part 3: Test

With our bridge set up, our ZFS storage backend created and LXD fully configured, it's time to test everything is working as it should be.

We'll first get a quick overview of our ZFS storage pool using `sudo zpool list lxd`

jason@ubuntu-lxd-tut:~$ sudo zpool list lxd
NAME   SIZE  ALLOC   FREE  EXPANDSZ   FRAG    CAP  DEDUP  HEALTH  ALTROOT
lxd   19.9G   646M  19.2G         - 2%     3%  1.00x  ONLINE  -

With ZFS looking fine, we'll run a simple `lxc info` to generate our client certificate and verify the configuration we've chosen for LXD:

jason@ubuntu-lxd-tut:~$ lxc info
Generating a client certificate. This may take a minute...

apicompat: 0
auth: trusted
environment:
  addresses: \[\]
  architectures:
  - x86\_64
  - i686
  certificate: |
    -----BEGIN CERTIFICATE-----
    \[...\]
    -----END CERTIFICATE-----
  driver: lxc
  driverversion: 2.0.0
  kernel: Linux
  kernelarchitecture: x86\_64
  kernelversion: 4.4.0-21-generic
  server: lxd
  serverpid: 5135
  serverversion: 2.0.0
  **storage: zfs**
  storageversion: "5"
config:
  **storage.zfs\_pool\_name: lxd**
public: false

It would appear the storage backend is correctly using our ZFS pool: "lxd". If we now take a look at the default profile using:

`lxc profile show default`

We should see LXD using `br0` as the default container `eth0` interface:

jason@ubuntu-lxd-tut:~$ lxc profile show default
name: default
config: {}
description: Default LXD profile
devices:
  eth0:
    name: eth0
    nictype: bridged
   ** parent: br0**
    type: nic

Success! The only thing left to do now is launch a container.

We can use the official Ubuntu image repo and spin up a Xenial container with the alias _xen1_ using the command:

`lxc launch ubuntu:xenial xen1`

Which should return an output like this:

jason@ubuntu-lxd-tut:~$ lxc launch ubuntu:xenial xen1
Creating xen1
Retrieving image: 100%
Starting xen1

Now, we can use `lxc list` to get an overview of all containers including their IP addresses:

jason@ubuntu-lxd-tut:~$ lxc list
+------+---------+----------------------+------+------------+-----------+
| NAME |  STATE  |        IPV4          | IPV6 |    TYPE    | SNAPSHOTS |
+------+---------+----------------------+------+------------+-----------+
| xen1 | RUNNING | 192.168.0.197 (eth0) |      | PERSISTENT | 0         |
+------+---------+----------------------+------+------------+-----------+

We can see the _xen1_ container has picked up an IP from our DHCP server on the LAN, which is exactly what we want.

Finally, we can use `lxc exec xen1 bash` to gain CLI access to the container we've just launched:

jason@ubuntu-lxd-tut:~$ lxc exec xen1 bash
**root@xen1:~#**

## Conclusion

While a little long-winded, setting up LXD with a ZFS storage backend and utilising a bridged interface for connecting containers directly to the LAN isn't overly difficult, and it's only gotten easier as LXD has matured to version 2.0.

I hope this guide has been helpful, as always I'm [@jasonbayton](//twitter.com/jasonbayton) on Twitter and will also respond to comments below if you have any questions. I'd also like to know if you successfully installed and configured LXD following this guide, please leave a comment below!

Are you brand new to LXD? I thoroughly recommend you take a look at LXD developer [Stéphane Graber's incredible LXD blog series](https://www.stgraber.org/2016/03/11/lxd-2-0-blog-post-series-012/) to get up to speed.

_If you spot any errors in the above, or have suggestions on how to improve this guide, feel free to reach out._

#### Check out the comments!

The comments below hold a wealth of questions, answers, benchmarks and examples from others who have followed this guide. If you're still left unsure about something after reading up to this point, take a look below. If your concerns haven't been addressed, leave a note and I'll do my best to answer!

Feel something should be included in the guide from the comment section? Upvote a comment or leave a reply.
