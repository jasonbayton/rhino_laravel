<!---
title: "Windows 7 display issues on old Dell desktops"
date: "2010-11-26"
categories:
  - "guides"
  - "quicktip"
tags:
  - "display-error"
  - "gx260"
  - "windows"
--->

![](/wp-content/uploads/2010/11/28368781-300x225.jpg "28368781")Windows 7 is fantastic, on 9/10 machines I install it to it'll install with no issues what-so-ever - everything runs "out of the box". However, as with most things in life - it's never smooth sailing all the way across the channel and when it does go wrong, it can be a real pain to figure out.

Today I'll quickly cover a simple fix for making sure you're not left with a completely useless display after installing Windows 7 onto an old Dell. The model in particular I mention is the Dell Optiplex GX260. I mention this as I fixed the issue earlier this evening. If everything else is working as you'd expect, but no matter what you do the display is showing? up oversized and pixelated, fear not! Here's what you do:

- [Download this file](/download/R67150.EXE "Dell display driver") and run it.
- Allow it to extract to **C:\\dell\\drivers.**
- Navigate to **C:\\dell\\drivers\\r67150.**
- Right click on **setup.exe** and select properties.
- Check the compatibility box. Windows XP SP3 is fine.
- While you're there, check **run as admin**.
- Apply, OK and execute setup.exe

You'll now note that it completes installation and reboots to a wonderful, fully corrected resolution - job is a good one!

As I said, this was a brief and almost random post, however since I've faced this issue tonight, I have no doubt other people will.

Good luck!

R67150.EXE
