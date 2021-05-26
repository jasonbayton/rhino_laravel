<!---
title: "Streamline XP into Ubuntu"
date: "2010-05-17"
categories:
  - "guides"
tags:
  - "seamless-integration"
  - "ubuntu"
  - "virtualbox"
  - "xp"
--->

Recently [Ubuntu 10.04 LTS](http://www.ubuntu.com/products/whatisubuntu/1004features) was released and after spending a few hours on the [LiveCD](https://ubuntu.com/download) I finally found a reason to migrate my Windows run laptops to this faster, lighter Operating System. I was getting sick of Windows and the constant management I had to do to keep it running at optimal spec, I do enough of that in work! When I get home I want a system I can turn on and in 10 seconds be browsing the net (that's basically all I use my laptop for), Ubuntu does that for me.

However (there's always something, right?), given that Windows owns roughly 91% of the Market Share of Operating Systems ([source](http://en.wikipedia.org/wiki/Microsoft_Windows)) it's inevitable that I'll want to do something with a program that's only available in Windows at some point. It's a sad truth that no matter how hard you try, completely breaking away from Windows is an extremely difficult task (I'll always have to use it in Work for example, and I'm not complaining since Windows _is_ my work!). So I'm doing the next best thing.

By streamlining Windows into my Ubuntu OS, I can use the sleek, fast OS on a daily basis and should I need to do something in Windows (Photoshop? Office 2007?) I can boot up my Windows OS and run my Windows programs natively in the Ubuntu System.

Don't get me wrong, there's always [WINE](https://help.ubuntu.com/community/Wine), but I've had more problems getting that to work seamlessly than I have getting XP to boot in Ubuntu! Here's what I did from start to finish, a **complete** guide to getting Windows (in this case XP) running seamlessly inside Ubuntu.

## 1) Creating the environment for XP to run {#first}

I want XP to run in a virtual environment, separate from Ubuntu so as not to cause any clashes between the operating systems. I want to be able to right-click and delete XP on a whim if I decide I don't want it any more!

As we're setting up a virtual environment, we will need a few things:

- Your ISO/CD to install an operating system (and license key!)
- VirtualBox

There's a great, free open source virtual manager named [VirtualBox OSE](http://www.virtualbox.org/wiki/Downloads) which I'll be using to set up the environment, but you should note immediately that the OSE version does **not** support USB. If you can't live without USB you should download the [personal edition of VirtualBox](http://www.virtualbox.org/wiki/Downloads).

Using Ubuntu's Software Centre, search for VirtualBox OSE and install it.

![Screenshot-Ubuntu Software Centre.jpg](http://lh5.ggpht.com/_XtX1xEyLe2k/S_EHqxe4BqI/AAAAAAAAFBY/GacVKPuoULw/Screenshot-Ubuntu%20Software%20Centre.jpg?imgmax=576)

Once it's installed, you'll see it in **Applications > Accessories > VirtualBox OSE**. Open the program and you'll be greeted with the VirtualBox GUI and a setup screen for a new virtual machine (if not, please click New!)

![Screenshot-Create New Virtual Machine.jpg](http://lh5.ggpht.com/_XtX1xEyLe2k/S_EHlIm3FcI/AAAAAAAAFAw/iKQm3XFS5GA/Screenshot-Create%20New%20Virtual%20Machine.jpg?imgmax=576)

![1.jpg](http://lh6.ggpht.com/_XtX1xEyLe2k/S_EHk0OFTGI/AAAAAAAAFAs/l5x57MfqqoE/1.jpg?imgmax=576)

The following screens show how I set up my new XP virtual machine:

![Screenshot-Create New Virtual Machine-1.jpg](http://lh3.ggpht.com/_XtX1xEyLe2k/S_EHlgT70pI/AAAAAAAAFA0/tcRkcJf1uGc/Screenshot-Create%20New%20Virtual%20Machine-1.jpg?imgmax=576)

![Screenshot-Create New Virtual Machine-2.jpg](http://lh3.ggpht.com/_XtX1xEyLe2k/S_EHmErhuyI/AAAAAAAAFA4/uaORPu69m6U/Screenshot-Create%20New%20Virtual%20Machine-2.jpg?imgmax=576)

I decided that at the moment, I have no intention of using memory heavy applications in XP, though I may change this at a later date. If you feel you will be wanting to run heavy applications you may consider increasing the [ram](http://en.wikipedia.org/wiki/Random-access_memory) used to a higher amount, however note that you **should not** set it too high, as you want your host OS to run stably aswell!

![Screenshot-Create New Virtual Machine-3.jpg](http://lh6.ggpht.com/_XtX1xEyLe2k/S_EHmv9i7PI/AAAAAAAAFA8/yZ3lfpUkCog/Screenshot-Create%20New%20Virtual%20Machine-3.jpg?imgmax=576)

Here as I have not created a virtual OS before, I had to set up a new virtual disk. This is what I mentioned earlier about setting up a separate system so that the OS's don't clash with each other, here are the settings I selected for the HardDisk:

![Screenshot-Create New Virtual Disk.jpg](http://lh3.ggpht.com/_XtX1xEyLe2k/S_EHnM8lYII/AAAAAAAAFBA/P08WLalj3W8/Screenshot-Create%20New%20Virtual%20Disk.jpg?imgmax=576)

![Screenshot-Create New Virtual Disk-1.jpg](http://lh5.ggpht.com/_XtX1xEyLe2k/S_EHnhbZsxI/AAAAAAAAFBE/p7K5SQt-GC4/Screenshot-Create%20New%20Virtual%20Disk-1.jpg?imgmax=576)

![Screenshot-Create New Virtual Disk-2.jpg](http://lh4.ggpht.com/_XtX1xEyLe2k/S_EHoAXaT3I/AAAAAAAAFBI/_jB_TJwrc6A/Screenshot-Create%20New%20Virtual%20Disk-2.jpg?imgmax=576)

![Screenshot-Create New Virtual Disk-3.jpg](http://lh6.ggpht.com/_XtX1xEyLe2k/S_EHpI-o8CI/AAAAAAAAFBM/NYwfbxwZJoU/Screenshot-Create%20New%20Virtual%20Disk-3.jpg?imgmax=576)

From here the Wizard finishes and gives you a nice new OS listed in your Virtual machines:

![1.jpg](http://lh6.ggpht.com/_XtX1xEyLe2k/S_EHk0OFTGI/AAAAAAAAFAs/l5x57MfqqoE/1.jpg?imgmax=576)

Select it, and click "start". You will be prompted by a window, and then a new wizard will appear:

![Screenshot-First Run Wizard.jpg](http://lh4.ggpht.com/_XtX1xEyLe2k/S_EPaYUttXI/AAAAAAAAFBc/4QeCe4d_bj4/Screenshot-First%20Run%20Wizard.jpg?imgmax=576)

![Screenshot-First Run Wizard-1.jpg](http://lh5.ggpht.com/_XtX1xEyLe2k/S_EPdFWX42I/AAAAAAAAFBg/a4iaoyb2QF0/Screenshot-First%20Run%20Wizard-1.jpg?imgmax=576)

If you're using a CD, leave the above settings as they are and click next. However if you are using an [ISO](http://en.wikipedia.org/wiki/ISO_image) from your computer you will need to click the little folder icon to the right of the Media Source drop down, on the next screen select "add" and navigate to your ISO image. It will then display as below:

![Screenshot-First Run Wizard-2.jpg](http://lh3.ggpht.com/_XtX1xEyLe2k/S_EPiGo9EwI/AAAAAAAAFBk/CsybS1tB4rc/Screenshot-First%20Run%20Wizard-2.jpg?imgmax=576)

![Screenshot-First Run Wizard-3.jpg](http://lh6.ggpht.com/_XtX1xEyLe2k/S_EPlF3wFvI/AAAAAAAAFBo/WdVjv8NykbE/Screenshot-First%20Run%20Wizard-3.jpg?imgmax=576)

That's the end of the Wizard, and now you'll see the Virtual window kick-start into life, with the familiar XP install screens:

![Screenshot-XP1 [Running] - VirtualBox OSE.jpg](http://lh4.ggpht.com/_XtX1xEyLe2k/S_EP4d59pTI/AAAAAAAAFBw/afUOmxGmsmg/Screenshot-XP1%20%5BRunning%5D%20-%20VirtualBox%20OSE.jpg?imgmax=576)

![Screenshot-XP1 [Running] - VirtualBox OSE-1.jpg](http://lh6.ggpht.com/_XtX1xEyLe2k/S_EQAOiUqWI/AAAAAAAAFB0/bFHMbbkPCdM/Screenshot-XP1%20%5BRunning%5D%20-%20VirtualBox%20OSE-1.jpg?imgmax=576)

![Screenshot-XP1 (Snapshot 1) [Running] - VirtualBox OSE.jpg](http://lh5.ggpht.com/_XtX1xEyLe2k/S_EQQhrFR8I/AAAAAAAAFB4/9imRSDp6U8w/Screenshot-XP1%20%28Snapshot%201%29%20%5BRunning%5D%20-%20VirtualBox%20OSE.jpg?imgmax=576) _The unpartitioned space will be different depending on the size of the virtual disk you made!_

Following these steps, XP will install itself (you'll get the usual XP setup screens) and within 10 or so minutes you'll be presented with the familiar grassy hills and blue start menu that you're used to! Is it good to be back? ;)

![xprunning.jpg](http://lh4.ggpht.com/_XtX1xEyLe2k/S_EU7H1abQI/AAAAAAAAFCM/VDJRRMCauok/xprunning.jpg?imgmax=576)

## 2) Let's make it Seamless... {#second}

At the moment, this is how the virtual machine looks against your normal system:

![Screenshot.jpg](http://lh4.ggpht.com/_XtX1xEyLe2k/S_EWKNKeb6I/AAAAAAAAFCQ/0G3nHTcB3T4/Screenshot.jpg?imgmax=576)

So there's still a little work to do! Back to the Virtual Window:

![Screenshot-XP [Running] - VirtualBox OSE-1.jpg](http://lh3.ggpht.com/_XtX1xEyLe2k/S_EWSuEvCVI/AAAAAAAAFCU/9yCkx2bXX8Y/Screenshot-XP%20%5BRunning%5D%20-%20VirtualBox%20OSE-1.jpg?imgmax=576) To get seamless integration to work, we'll need to first install an extra package from VirtualBox. Navigate to **Devices > Install Guest Additions... (Host + D)**

![Screenshot-XP [Running] - VirtualBox OSE-2.jpg](http://lh5.ggpht.com/_XtX1xEyLe2k/S_EWc17Y22I/AAAAAAAAFCY/oUZVBit0qNk/Screenshot-XP%20%5BRunning%5D%20-%20VirtualBox%20OSE-2.jpg?imgmax=576)

![Screenshot-XP [Running] - VirtualBox OSE-3.jpg](http://lh5.ggpht.com/_XtX1xEyLe2k/S_EWhkB5UBI/AAAAAAAAFCc/TOUsVkilfcg/Screenshot-XP%20%5BRunning%5D%20-%20VirtualBox%20OSE-3.jpg?imgmax=576)

![Screenshot-XP [Running] - VirtualBox OSE-4.jpg](http://lh6.ggpht.com/_XtX1xEyLe2k/S_EWqPXwEoI/AAAAAAAAFCg/7EsSrTch3EI/Screenshot-XP%20%5BRunning%5D%20-%20VirtualBox%20OSE-4.jpg?imgmax=576)

![Screenshot-XP [Running] - VirtualBox OSE-5.jpg](http://lh3.ggpht.com/_XtX1xEyLe2k/S_EWv8zuYKI/AAAAAAAAFCk/RB2H5gDGy9c/Screenshot-XP%20%5BRunning%5D%20-%20VirtualBox%20OSE-5.jpg?imgmax=576) Optionally, you can install Direct3D Support, though not required (I did, and it didn't make much difference).

![Screenshot-XP [Running] - VirtualBox OSE-6.jpg](http://lh5.ggpht.com/_XtX1xEyLe2k/S_EWzkrBKqI/AAAAAAAAFCs/674o1avrYD0/Screenshot-XP%20%5BRunning%5D%20-%20VirtualBox%20OSE-6.jpg?imgmax=576)

![Screenshot-XP [Running] - VirtualBox OSE-7.jpg](http://lh3.ggpht.com/_XtX1xEyLe2k/S_EW6g2TVjI/AAAAAAAAFC0/2-xFyzmnUK4/Screenshot-XP%20%5BRunning%5D%20-%20VirtualBox%20OSE-7.jpg?imgmax=576) These messages may pop up, it's the typical "non-trusted" driver installation. Continue as per normal as they're perfectly safe.

![Screenshot-XP [Running] - VirtualBox OSE-8.jpg](http://lh4.ggpht.com/_XtX1xEyLe2k/S_EXDJEqfPI/AAAAAAAAFC4/LjQIJcVJmQE/Screenshot-XP%20%5BRunning%5D%20-%20VirtualBox%20OSE-8.jpg?imgmax=576)

Once you've restarted the virtual machine, navigate to **Machine > Seamless Mode** and voila!

![Screenshot-XP [Running] - VirtualBox OSE-9.jpg](http://lh6.ggpht.com/_XtX1xEyLe2k/S_EaVDAYXLI/AAAAAAAAFC8/ojcn-wBrGsA/Screenshot-XP%20%5BRunning%5D%20-%20VirtualBox%20OSE-9.jpg?imgmax=576)

![Screenshot-1.jpg](http://lh3.ggpht.com/_XtX1xEyLe2k/S_EbCm9TlHI/AAAAAAAAFDA/c3Rnc_huN_8/Screenshot-1.jpg?imgmax=576)

## 3) We're almost there... {#third}

Well, actually we _are_ there, however something that bugged me was needing to open Virtualbox OSE when I wanted to start the XP Virtual machine. Well I'm too impatient for that, so here's a quick and easy way of making a direct shortcut to the virtual machine itself:

Right click on the desktop and select **Create Launcher...**

**

![Screenshot-2.jpg](http://lh4.ggpht.com/_XtX1xEyLe2k/S_Ed3SPlbaI/AAAAAAAAFDI/Ch_lkf6IRfM/Screenshot-2.jpg?imgmax=576)

![Screenshot-Create Launcher.jpg](http://lh5.ggpht.com/_XtX1xEyLe2k/S_EeCImrsmI/AAAAAAAAFDM/b4J4JkfmhYU/Screenshot-Create%20Launcher.jpg?imgmax=576)

In the command box, type VBoxManage startvm `your virtual machine name` and click ok.

![ss3](/wp-content/uploads/2010/05/Screenshot-3.png "Screenshot-3")

Now, whenever you need to use that Windows program you can boot up XP from the desktop shortcut, (it should default to seamless mode) and enjoy!! Should you need to get it out of seamless mode, hit **Right CTRL + L**.

I'm just happy I can now use the location feature in Windows' version of Google Chrome :)

Cheers,
