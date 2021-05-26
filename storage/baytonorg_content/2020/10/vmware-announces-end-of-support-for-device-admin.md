<!---
title: "VMware announces end of support for Device Admin"
date: "2020-10-01"
categories:
  - "enterprise"
tags:
  - "airwatch"
  - "android"
  - "android-enterprise"
  - "enterprise"
  - "vmware"
--->

This week, VMware [announced](https://kb.vmware.com/s/article/80971?lang=en_US&queryTerm=device+admin) their intention to end support for Device Admin based Android management.

A [topic](/2017/12/google-is-deprecating-device-admin-in-favour-of-android-enterprise/) I've [covered](/docs/enterprise-mobility/android/infobyte-did-you-know-device-admin-deprecation/) [in depth](/docs/enterprise-mobility/android/android-enterprise-vs-device-administrator-legacy-enrolment/) since Google's announcement way back at the end of 2017, this has been a long time coming (_so_ long), and trends with the wider ecosystem adoption of Android Enterprise over the last few years as Device Admin functionality has slowly but surely eroded away with each major Android release.

3 years on from that announcement it's clear however DA isn't going away as rapidly as some would hope; whether that's due to slow device refresh cycles (some industries take _years_ to swap out hardware), organisational reluctance, device choice (GMS-free devices, regional restrictions) or a lack of education (my [What is Android Enterprise](/docs/enterprise-mobility/android/what-is-android-enterprise-and-why-is-it-used/) doc still sees significant traffic on a monthly basis!), when many organisations enrol new devices today, irrespective of OS version, it's still via Device Admin.

It goes without saying, given VMware's (AirWatch's) history and longevity, they have a not-insignificant share of those DA-managed devices today, and a fair amount of work ahead in realising their [Android Enterprise-first strategy](https://blogs.vmware.com/euc/2017/12/android-enterprise-front-center.html). This is a big step in the right direction.

## What end of support means {#what-end-of-support-means}

Ending support itself possibly isn't as immediately disruptive as it may sound; for devices running 9 and below still in 2022 it will continue to be possible to enrol Android devices into Device Admin for existing customers. What the end of support rather means is simply when customers reach out to VMware with an issue relating in any way to Device Admin management, it won't be supported. Customers therefore are on their own should they choose to continue management of Android devices via DA.

In fact, the changes happening before this, as early as November 2020, referenced in the announcement and linked [here](https://kb.vmware.com/s/article/79206?lang=en_US), will be more disruptive as they'll prevent all new customers from leveraging Device Admin, and all current customers from enrolling new Android 10+ devices as Device Admin. Those devices on 10 or later coinciding with when VMware's Intelligent Hub switches to targeting API level 29 per Google Play policy referenced [here](https://developer.android.com/distribute/play-policies) with more detail [here](https://developer.android.com/distribute/best-practices/develop/target-sdk).

![](/wp-content/uploads/2020/09/20200930_180257-1140x495.jpg)

Because the technical ability to continue managing existing Device Admin devices isn't going away, those customers who feel confident in their ability to self-support the management mode may continue to do so effectively until something on the platform ceases to work correctly. Unfortunately, given that lack of support and development, this pivotal point could be years - or months - and therefore would be an ongoing risk until devices are migrated away.

## The inevitable {#the-inevitable}

It's well documented that Android Enterprise is [simpler](/docs/enterprise-mobility/android/what-is-android-enterprise-and-why-is-it-used/), more [secure](/docs/enterprise-mobility/android/gartner-comparison-of-security-controls-for-mobile-devices-2019/) and more [flexible](/docs/enterprise-mobility/android/infobyte-did-you-know-android-enterprise-work-managed-provisioning-methods/) in its [approach](/docs/enterprise-mobility/android/considerations-for-choosing-Android-in-the-enterprise/) to Android management, and for organisations the world over is the best way to manage devices. VMware's push not only to ensure new customers leverage modern Android management by default in the near future, but to actively route customers to Android Enterprise as the only supported option for Android management in in the next few years is bold, yet not [without consideration](/2019/08/vmware-ws1-uem-1908-supports-android-enterprise-enrolments-on-closed-networks-and-aosp-devices/) of those organiastions who have struggled with the obvious limitations of device management in Google-restricted countries or devices without GMS as is often a problem with legacy fleets in some industry sectors.

VMware's announcement is one of many I hope to see over time across the ecosystem as we transition fully from a Device Admin to an Android Enterprise-only world, and while some may not like the path ecosystem partners are taking, it is the inevitable, and brighter, future for Android management.
