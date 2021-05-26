---
title: "Setting up an Elastichosts Ubuntu VM"
date: "2017-05-16"
---

## 1\. Spin up the virtual server

After logging into the ElasticHosts console, select **Add** followed by **Server** under _Virtual Machines._

![img.1](/wp-content/uploads/2016/07/img.1.png)

In the new modal, define the server spec as required for the solution to be installed.

![img.2](/wp-content/uploads/2016/07/img.2.png)

For **Type** select **Pre-installed system**, for **Image** select **Ubuntu 16.04 LTS** (or newer). Click **Add** when done.

## 2\. Assign a static IP

Like AWS, new servers are created with a dynamic IP. As we want to permanently assign a hostname to this server for web access to the solution, we'll assign a static IP. If one isn't already assigned to the account, create a new static IP from the **Add** menu.

![img.3](/wp-content/uploads/2016/07/img.3.png)

Once a static IP is available, enter the newly-created (and still powered off) server settings by clicking the "cog" icon under the power button. This will open a new page.

![img.4](/wp-content/uploads/2016/07/img.4-e1469525129465.png)

Under **Network** select the static IP from the dropdown menu and click the relevant IP under **Allowed IPs**.

#### 2.1. Manage open ports

Now would also be a good time to edit the **Firewall** settings in order to block unwanted traffic on a network level before reaching the VM. For most solutions we only need ports 22 (SSH), 80 (HTTP) and 443 (HTTPS) which can be input in **Open ports**. As this is a paid add-on, an alternative would be to configure `iptables` / `ufw` / `firewalld` on the Ubuntu server at a later time.

Click **Save** and **Start** to boot up the server for the first time.

At this point it would be a good idea to create a DNS entry for the server using the DNS provider for the domain that will resolve to this VM.

### 3\. Connect to the server

After clicking **Start** the button will change to **Connect**. On clicking this, a new window will open with server connection details:

![img.5](/wp-content/uploads/2016/07/img.5.png)

Using an SSH client, SSH to **toor@ip** and use the **VNC/****toor** password provided.

#### 3.1. Disable the root account

As soon as it's convenient to do so, disable the root/toor account from logging in over SSH. A quick, simple way to do this in Ubuntu is to disable the account as follows from a different sudo-enabled account (which would need to be created first):

`sudo passwd root -l`

Furthermore, consider switching from password to key authentication as soon as possible.
