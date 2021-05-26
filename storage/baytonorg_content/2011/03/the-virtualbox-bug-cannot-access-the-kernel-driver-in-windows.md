<!---
title: "The Virtualbox bug: \"Cannot access the kernel driver\" in Windows"
date: "2011-03-06"
categories:
  - "guides"
tags:
  - "kernel"
  - "kernel-error"
  - "update"
  - "upgrade"
  - "virtualbox"
  - "virtualbox-error"
  - "virtualbox-windows"
--->

**Update:** An alternate solution was provided in the comments:

> Go to: _C:\\Program Files\\Oracle\\VirtualBox\\drivers\\USB\\filter_ Select **VBoxUSBMon.inf** and click the right mouse button. Then pick Install. Go to: _C:\\Program Files\\Oracle\\VirtualBox\\drivers\\vboxdrv_ Select **VBoxDrv.inf** and click the right mouse button. Then pick install. VirtualBox should now work again as expected.
>
>  
>
> _Source: [https://forums.virtualbox.org/viewtopic.php?f=6&t=46845](https://forums.virtualbox.org/viewtopic.php?f=6&t=46845)_

**It doesn't appear to work for everyone,** so if that didn't work for you please read on for the original post:

It's annoying, isn't it? You finally succumb to Virtualbox's daily notification telling you to update Virtualbox, but as soon as you're done that darned error pops up when you attempt to launch your VM:

**"Cannot access the kernel driver! Make sure the kernel module has been loaded successfully."**

Wait, what?! Kernel?! Isn't that a Linux thing!? Putting the initial confusion aside, this is by no means a new bug with Virtualbox in Windows. Unfortunately, this has been happening for a long time and still hasn't been rectified. Fortunately however, it's easily fixed and should only take you a few more minutes than the upgrade itself.

1) Backup your Virtualbox VDI's 2) Uninstall Virtualbox 3) Remove any remnants of the install, depending on your version you should check both of these locations:

- "C:\\Program Files\\Sun\\Virtualbox" - or a directory similar to that under "Sun".
- "C:\\Documents and Settings\\{account username}\\.VirtualBox\\Machines

4) Reinstall Virtualbox and create a new VirtualMachine. 5) When prompted, choose your existing VDI and voila, you should be up and running again!

One of these days, Oracle may fix the bug! Until then if you have the choice, removing and installing a newer version of Virtualbox is undoubtedly much faster than attempting to let Virtualbox update itself.

Happy virtualising one and all!
