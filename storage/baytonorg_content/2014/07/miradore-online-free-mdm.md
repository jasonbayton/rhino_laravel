<!---
title: "First look: Miradore Online free MDM"
date: "2014-07-02"
categories:
  - "enterprise"
  - "reviews"
tags:
  - "emm"
  - "free-mdm"
  - "management"
  - "mdm"
  - "miradore"
  - "mobile"
  - "mobile-device-management"
--->

This article was published in 2014. There are two new articles you may find interesting: [Miradore Online MDM Review: A second Look](/2015/03/miradore-online-mdm-review-a-second-look/) & [Miradore Online MDM: Expanding management with subscriptions](/2016/02/miradore-online-mdm-expanding-management-with-subscriptions/).

At this point in time, it's very unlikely mobile isn't already a part of most organisations in some way or another. Whether it's a case of supplying devices to employees or granting access to corporate resources (such as email) on personally-owned devices, organisations need some form of control over the data they're granting access to and perhaps even a fail-safe for when a device is lost or stolen. For these reasons, EMM and MDM solutions were created.

When you think of [MDM solutions](http://en.wikipedia.org/wiki/Mobile_device_management), which companies come to mind? [AirWatch](http://www.air-watch.com)? [Mobile Iron](http://mobileiron.com)? [Good](http://good.com)? [MaaS360](http://www.maas360.com)?

All pretty decent solutions in their own right, but they all also charge a license fee for every device enrolled; a costly bill for someone who may want a management solution without all the bells and whistles of a full [EMM](http://en.wikipedia.org/wiki/Enterprise_Mobility_Management) suite, perhaps. So what if there was a solution that provided a simple, no-frills, cloud-based MDM solution absolutely free of charge?

Enter [Miradore](http://miradore.com).

![Free MDM from the Cloud Miradore Online](/wp-content/uploads/2014/07/Free-MDM-from-the-Cloud-Miradore-Online.png)

I stumbled across Miradore around April of this year whilst perusing various MDM solutions (as you do in your free time, right?) for my own personal devices. Miradore advertise their MDM platform as a completely free, cloud-based solution supporting Android, iOS _and Windows Phone_ with unlimited users and no time limit - there are no trials, no ads to click or add-ons to pay for, it's all free. I believe it will remain free even out of beta, as a complimentary product to their [On-Premise](http://mms.miradore.com/) range of solutions from which they currently generate revenue.

Accepting the fact that it is still beta software, I fired up my own private instance and immediately enrolled a couple of devices to get a look at the solution and where it's headed.

## Enrolment {#1}

The enrolment process is fairly straightforward, initially requiring the user of the device be added to the portal by the administrator, after which an email can be sent out with a set of simple enrolment steps.

_Enrolment workflow from the console:_

\[gallery columns="5" type="rectangular" ids="1973,1974,1975,1976,1977"\]

_Enrolment workflow on the device:_

\[gallery columns="5" type="square" ids="1978,1979,1980,1982,1983,1986,1985,1987"\]

As shown in the gallery above, on enrolling a Samsung device you're prompted with not one, but two system notifications. The first is the agreement to Samsung's terms (presumably due to Miradore using their APIs) and the second to agree to allowing Miradore to administer the device. Once enrolled the devices show up on the _devices_ dashboard and are ready to receive their relevant MDM profiles.

[![Devices view – Miradore Online – baytonorg](/wp-content/uploads/2014/07/Devices-view-–-Miradore-Online-–-baytonorg.png)](/wp-content/uploads/2014/07/Devices-view-–-Miradore-Online-–-baytonorg.png)

## Configuration profiles {#2}

Admittedly, Miradore does not provide a whole lot of options around the profiles they provide. Android is primarily limited to password enforcement and WIFI configuration. Samsung - through Enterprise APIs - allow a little more on their Android devices in that you can deploy Exchange email configurations or put the device into Kiosk Mode.

Apple and Windows Phone are better by comparison, offering roaming settings, basic restrictions, VPN configuration and device encryption, amongst other options. The offering around profiles certainly can't compete with some of the top EMM providers in the market, but Miradore are adding features regularly and they're definitely improving (since April alone I've seen a whole range of new features and functionality).

For now the policies available are adequate for basic management of devices and are quite easy to configure and deploy, as shown:

_Configuring a profile:_

\[gallery type="rectangular" ids="1989,1990,1991,1992,1993,1994,1995"\]

_Deploying a profile:_

\[gallery type="square" ids="1998,1996,1997"\]

The profiles deploy quickly and provide the functionality advertised. Once applied, it's easy to forget the device is being managed at all; Miradore sits in the background whirring away, allowing the user of the device to get on with what they want to do.

## Dashboard & device management {#3}

Whilst end users may have nothing more to do with Miradore once enrolled, the same cannot be said for the platform Administrator(s). Miradore provides a nice, clean dashboard showing a high-level overview of the devices enrolled along with some basic information associated with them (some of which is applied manually, but certainly not everything).

[![](/wp-content/uploads/2014/07/dash.png)](/wp-content/uploads/2014/07/dash.png)

The dashboard is great for information at-a-glance, but to actually do anything to a specific device, you'll need to bring up the device record:

[![Device view](/wp-content/uploads/2014/07/Device-view.png)](/wp-content/uploads/2014/07/Device-view.png)

From the device record you can see an overview of the state of the device as of its last check-in, the applications installed, where the device is assigned (this is a manually configured Location field) and device details such as IMEI, serial number, etc.

In addition, you're also able to deploy a profile, lock the device, remove it from Miradore ("Unenroll device") and completely wipe it back to factory settings. The device record is useful for managing any aspect of a single device from one location.

## Conclusion {#4}

I certainly haven't covered every aspect of Miradore in this article, there's a whole area on reporting that I haven't really looked at so far due to the minuscule amount of devices I have on the solution. What I have seen looks to be very granular if not a little raw (opting for system calls rather than friendly names for the various arguments to report against, for example) and could definitely provide some very nice, highly customised reports when configured correctly.

Of what I have seen, Miradore is clearly on a roll with their platform. It won't compare with the market leaders, but from what I can gather it was never supposed to; acting rather as a complimentary product for their existing portfolio of solutions that just happens to be open to anyone. In tandem with their other solutions (asset management, etc) it looks like it could be a nice little add-on, but equally as a simple, no frills, pleasantly simple and clean solution to manage a small number of mobile devices (Android/iOS/WinPhone) it does the job nicely.

I'm looking forward to seeing where it goes. I'd like to see granular control over device hardware (most of which is accessible through APIs/SDKs on all platforms) for shutting off WIFI, bluetooth, GPS, etc. I'd also like to see it poll for location occasionally (which is currently a set-and-forget manual option within the interface) and black/block lists for applications. Enrolment could be a little slicker too, but I can see that improving going forward anyway, so that won't be a problem.  

Keep it up Miradore, I think you're on to a winner!
