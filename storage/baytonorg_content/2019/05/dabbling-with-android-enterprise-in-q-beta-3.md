<!---
title: "Dabbling with Android Enterprise in Q beta 3"
date: "2019-05-08"
categories:
  - "enterprise"
tags:
  - "android"
  - "android-enterprise"
  - "emm"
  - "enterprise"
  - "enterprise-mobility"
  - "q"
--->

Yesterday Google announced Q beta 3 for [21 phones across 13 brands](https://developer.android.com/preview/devices), an incredible increase on the 11 devices last year with Pie.

I happen to have several devices on hand (but no Pixel!) thanks in part to my [device testing](/docs/enterprise-mobility/android/android-enterprise-device-support/), and of them all, Sony probably has the slickest, most straight-forward opt-in through their Xperia Companion desktop app.

All I needed to do was plug the XZ3 in while switched on, hold down Option (Mac, ALT on Windows) and click software repair. It gave me a few warnings and such, then just got on with it.

![](/wp-content/uploads/2019/05/image-3.png)

Moments later, Q.

I'll preface all of the following with a small disclaimer: everything below was tested on the first public, non-Pixel beta and reflects only how Q behaves on the Sony Xperia XZ3. There may be aspects of the below which work well on Pixel, Nokia or other OEMs.

## Starting with provisioning {#provisioning}

There's a new provisioning flow with Q which adds more contextual information, and offers end-users a clearer indication of what's happening during provisioning.

![](/wp-content/uploads/2019/05/Screenshot_20190430-164850-1140x2280.png)

![](/wp-content/uploads/2019/05/Screenshot_20190430-164908-1140x2280.png)

![](/wp-content/uploads/2019/05/Screenshot_20190430-164912-1140x2280.png)

![](/wp-content/uploads/2019/05/Screenshot_20190508-120553-1140x2280.png)

![](/wp-content/uploads/2019/05/Screenshot_20190508-120558-1140x2280.png)

![](/wp-content/uploads/2019/05/Screenshot_20190508-120606-1140x2280.png)

![](/wp-content/uploads/2019/05/Screenshot_20190508-120609-1140x2280.png)

![](/wp-content/uploads/2019/05/Screenshot_20190508-120612-1140x2280.png)

This appears to come at the cost of provisioning speed, however, as demonstrated in my typically rubbish demo video:

https://youtu.be/5wBAJuQnxDM
_XZ3 with Q on the left_

At 1:10 in the video the Nokia is already finished, ready to go. It took another 20 seconds and a couple more taps to get to the same outcome with Q.

On the one hand I like how thoughtful Google are being about end-user perception and setting expectations, consider this following screen which seems to change depending on provisioning method/type:

![](/wp-content/uploads/2019/05/Screenshot_20190508-124517-1140x2280.png)

![](/wp-content/uploads/2019/05/Screenshot_20190508-120606-1140x2280.png)

![](/wp-content/uploads/2019/05/Screenshot_20190508-130328-1140x2280.png)


On the other hand, I want my corporate devices provisioned with as few taps as possible, and introducing more contradicts that.

I wasn't able to test NFC or zero-touch provisioning as they're not supported in beta 3 on the XZ3 it would appear, however I did quickly whiz through DPC identifier provisioning to check _one_ thing:

![](/wp-content/uploads/2019/05/Screenshot_20190508-124551.png)

The Google services prompt is still present in Q, unfortunately it looks like we may go another year skipping through it.

There are also a few new screens with work profile enrolment:

![](/wp-content/uploads/2019/05/Screenshot_20190508-130312-1140x2280.png)

![](/wp-content/uploads/2019/05/Screenshot_20190508-130316-1140x2280.png)

![](/wp-content/uploads/2019/05/Screenshot_20190508-130323-1140x2280.png)

![](/wp-content/uploads/2019/05/Screenshot_20190508-130328-1-1140x2280.png)


## EMMs don't function well, yet {#emms}

In the enrolments above I opted for an AMAPI based solution as this is the only solution I tested that managed to successfully enrol the XZ3.

Both MobileIron Core and Cloud agents locked up as soon as they launched following provisioning, and VMware Workspace ONE UEM force-closed both during and after provisioning. After setting up the device normally and attempting to enrol using a work profile the same happened, with neither MI nor WS1 able to complete the creation of a work profile.

![](/wp-content/uploads/2019/05/Screenshot_20190508-132841-1140x2280.png)

![](/wp-content/uploads/2019/05/Screenshot_20190508-123846-1140x2280.png)

![](/wp-content/uploads/2019/05/Screenshot_20190508-134753-1140x2280.png)


Is this surprising? Of course not. There were a few new features introduced with Q surrounding provisioning which EMMs clearly won't have implemented yet, as well as the fact that betas are such for a reason.

## Other items of interest {#other}

### Cross-profile calendar access {#cross-profile}

While poking around I did find a couple of other things worth note. To start with, the new [cross-profile calendar access](/2019/03/android-enterprise-in-q-features-and-clarity-on-da-deprecation/#cross-profile-calendar-access) feature, which I noted was forced to **enabled** with both the failing EMMs and AMAPI:

![](/wp-content/uploads/2019/05/Screenshot_20190508-141253-1140x2280.png)

![](/wp-content/uploads/2019/05/Screenshot_20190508-141245-1140x2280.png)


As it happens Google Calendar doesn't support this yet, so nothing was shown, nor is it clear if this is working already as a feature. In any case, it should probably default to disabled given the privacy implications of exposing calendar entries.

### Subtle passcode setup change {#passcode}

I also noted during normal setup, there's a change in how passcode is presented to users. While in previous Android versions passcode has been opt-in, in Q the passcode and fingerprint is presented as if it's part of the setup flow:

![](/wp-content/uploads/2019/05/Screenshot_20190508-125607-1140x2280.png)

![](/wp-content/uploads/2019/05/Screenshot_20190508-125617-1140x2280.png)

![](/wp-content/uploads/2019/05/Screenshot_20190508-125622-1140x2280.png)

![](/wp-content/uploads/2019/05/Screenshot_20190508-125631-1140x2280.png)


It can of course be skipped, but I do very much like this approach and wonder how this will impact passcode adoption. I also noted how much faster it was to set up a fingerprint, though this is likely nothing to read into just yet.

### QR code WiFi connection {#wifi}

Connecting to WiFi via QR code, another feature introduced with Q, is also so incredibly slick; with the exception of cert-based WiFi, I've never connected to a network so rapidly:

![](/wp-content/uploads/2019/05/Screenshot_20190430-165103-1140x2280.png)

### New permissions prompts {#permissions}

Finally I also got a bit of a taste of the revamped Q permissions system, and I have to say I like it, though perhaps the big blocky overlay could be adjusted to look a little nicer.

![](/wp-content/uploads/2019/05/Screenshot_20190508-130306-1140x2280.png)

![](/wp-content/uploads/2019/05/Screenshot_20190508-130219-1-1140x2280.png)

![](/wp-content/uploads/2019/05/Screenshot_20190508-130228-2-1140x2280.png)


I also learned today MobileIron asks for both the ability to manage phone calls (normal for IMEI info etc) and view call logs, the latter WS1 does not (this isn't new, I just hadn't paid attention having not actively compared EMM permission requests before!).

## Conclusion {#conclusion}

It was interesting to dig into Q a little, though by no means does this really mean an awful lot. The beta will change rapidly as we approach official release and so I likely won't spend much more time in the nitty gritty until closer to the end of the beta cycle.

That said, once I get set up with the Nokia 8.1 and Pixel 3a, I'll likely do a bit of compare and contrast on beta 3 just to see if there are large disparities between the OEMs.
