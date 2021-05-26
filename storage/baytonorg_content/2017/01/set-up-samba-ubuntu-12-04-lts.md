---
title: "Set up Samba - Ubuntu 12.04 LTS+"
date: "2017-01-08"
categories: 
  - "guides"
tags: 
  - "cifs"
  - "samba"
  - "share"
  - "smb"
  - "ubuntu"
  - "windows"
---

Samba is an incredibly useful, open source program for setting up and/or accessing network shares from \*nix operating systems. Samba shares are easily accessible from any modern OS using SMB/CIFS. Originally designed for DOS, SMB/CIFS is the most commonly used protocol for the sharing of directories and printers in the enterprise and Samba was created to guarantee a level of interoperability in mixed-OS environments.

Check out the video below for a walkthrough demonstrating how to set up Samba on a Ubuntu 16.04 LTS host. The written guide is below as well.

**NB:** Ubuntu 12.04 LTS is the earliest release I’ve used this with. It should work on earlier versions also, but your mileage may vary.

## Video

https://www.youtube.com/watch?v=Ns6fuS8nXN4

## Installation

From the commandline, run the following to install Samba:

`sudo apt install samba`

This will prompt you to install a pretty hefty number of packages, with the output looking similar to the below:

Reading package lists... Done
Building dependency tree
Reading state information... Done
The following additional packages will be installed:
attr libaio1 libavahi-client3 libavahi-common-data libavahi-common3 libcups2
libfile-copy-recursive-perl libldb1 libpython-stdlib libpython2.7
libpython2.7-minimal libpython2.7-stdlib libtalloc2 libtdb1 libtevent0
libwbclient0 python python-crypto python-dnspython python-ldb python-minimal
python-samba python-talloc python-tdb python2.7 python2.7-minimal
samba-common samba-common-bin samba-dsdb-modules samba-libs
samba-vfs-modules tdb-tools update-inetd
Suggested packages:
cups-common python-doc python-tk python-crypto-dbg python-crypto-doc
python2.7-doc binutils binfmt-support bind9 bind9utils ctdb ldb-tools ntp
smbldap-tools winbind heimdal-clients
The following NEW packages will be installed:
attr libaio1 libavahi-client3 libavahi-common-data libavahi-common3 libcups2
libfile-copy-recursive-perl libldb1 libpython-stdlib libpython2.7
libpython2.7-minimal libpython2.7-stdlib libtalloc2 libtdb1 libtevent0
libwbclient0 python python-crypto python-dnspython python-ldb python-minimal
python-samba python-talloc python-tdb python2.7 python2.7-minimal samba
samba-common samba-common-bin samba-dsdb-modules samba-libs
samba-vfs-modules tdb-tools update-inetd
0 upgraded, 34 newly installed, 0 to remove and 0 not upgraded.
Need to get 14.1 MB of archives.
After this operation, 70.7 MB of additional disk space will be used.
Do you want to continue? \[Y/n\]

If you're happy with that, tap `Enter` to continue; Samba will install quite quickly and you'll be ready to move on to configuration.

## Configuration

If it doesn't yet exist, create the directory you intend on sharing:

`sudo mkdir **/media/Storage**`

`/media/Storage` can be substituted for any file path you wish to share.

Open the `smb.conf` file. This will allow you to edit the Samba workgroup (if required) and add your new share (I like Vim for editing files):

`sudo vim /etc/samba/smb.conf`

[![](/wp-content/uploads/2017/01/sambaconf.png)](/wp-content/uploads/2017/01/sambaconf.png)

If you use a DOMAIN/WORKGROUP, edit the following line, otherwise, skip down to near the bottom of the file:

`workgroup = **WORKGROUP**`

[![](/wp-content/uploads/2017/01/workgroup.png)](/wp-content/uploads/2017/01/workgroup.png)

`WORKGROUP` can be substituted for a domain (such as bytn.uk shown in my video) or a custom workgroup name.

Now head down to the end of the file, and add your share like so:

[![](/wp-content/uploads/2017/01/shareinsert.png)](/wp-content/uploads/2017/01/shareinsert.png)

Here's a handy template to copy/paste:

\[sharename\]
  comment = a simple description
  path = /media/Storage
  browseable = yes
  readonly = no
  guest ok = no
  create mask = 0755

`create mask` is optional, but I've found it useful on occasion. The mask 0755 will give write permissions to the file owner (the user authenticating when uploading a file/folder) and read & execute permissions to everyone else. This could well instead be 0740 to allow the owner to edit, the file group to view (but not execute) and everyone else to have no permissions at all. Configure it as required.

`guest ok` is the difference between everyone being able to access the share without a username/password and authentication being required. In this instance I've required authentication in order to mount the share on a remote client as the data stored may be of a sensitive nature.

Save and quit the Vim editor by tapping Escape `(ESC)`, then `:wq` and hit `Enter`. This will write to the file and quit, returning you to the command line to then be able to restart Samba:

`sudo service smbd restart`

Next, as the share requires authentication you'll need usernames and passwords to access it. Start by adding a Samba password for your Ubuntu user account:

`sudo smbpasswd -a **jason**`

[![](/wp-content/uploads/2017/01/passwd.png)](/wp-content/uploads/2017/01/passwd.png)

The password doesn't have to match that of your Ubuntu user account, it can be totally unique to Samba (which isn't a bad idea!).

If you need to add other Samba users, create a new unix account on the Ubuntu server and repeat the process above for the new user.

You should now be able to access the share from another machine!

I hope this has been helpful, as always I’m [@jasonbayton](https://twitter.com/jasonbayton) on Twitter, [@bayton.org](https://facebook.com/bayton.org) on Facebook and will also respond to comments below if you have any questions.

_If you spot any errors in the above, or have suggestions on how to improve this guide, feel free to reach out._
