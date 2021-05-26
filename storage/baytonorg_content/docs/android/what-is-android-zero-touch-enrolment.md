<!---
title: "What is Android zero-touch enrolment?"
date: "2017-10-26"
--->

<div class="callout callout-info">
	<div class="callout-heading">What is Android Enterprise?</div>
	For information regarding Android Enterprise, including what it is, the deployment scenarios stated below and how it can benefit organisations, have a read of	<a href="/docs/enterprise-mobility/android/android-enterprise-device-support/#what-is-android-enterprise">What is Android Enterprise?</a>
</div>

## [What it is](#what-it-is) {#what-it-is}

Zero-touch enrolment enables out-of-box EMM enrolment, without the manual processes traditionally associated with Android provisioning, for devices running Android 8.0 where the OEM has opted in, or [all GMS certified devices running 9.0 or above](/2020/11/google-announce-big-changes-to-zero-touch/). If you're familiar with Samsung's [KNOX Mobile Enrolment](https://www.samsungknox.com/en/solutions/mobile-enrollment) or Apple's [Device Enrolment Programme](https://deploy.apple.com), Android's zero-touch enrolment will not be a new concept.

Zero-touch as a solution has been available since the original Pixel, with [documentation referencing it](https://developers.google.com/android/work/requirements/features) as far back as Android 7.1 launched at the end of 2016. With only the original Pixel supporting it however, it failed to make any significant impact on the industry (and I can personally attest to how difficult getting any official information on it had been before the wider launch for 8.0+ devices).

## [How it works](#how-it-works) {#how-it-works}

[![](/wp-content/uploads/2017/09/ZT-Demo-Gif_pixel.gif)](/wp-content/uploads/2017/09/ZT-Demo-Gif_pixel.gif)

With zero-touch, organisations purchase their Android 8.0+ devices from an authorised reseller. After which, the reseller creates a [zero-touch console](https://partner.android.com/zerotouch) customer accounts for the organisation and imports the devices. From there, the organisation can then log into the console and associate these devices to one of any of the EMMs that currently support a fully managed deployment scenario (Device Owner mode) via a configuration. These configurations also support [DPC extras](/docs/enterprise-mobility/android/android-enterprise-zero-touch-dpc-extras-collection/), which allow organisations to pre-configure items like server URL and username.

The DPC (EMM Agent) will be pulled down automatically along with any defined configurations when the device first boots or is factory reset, as demonstrated in the above GIF.

## [Where can I get it?](#where-can-i-get-it) {#where-can-i-get-it}

As well as being an [Android Enterprise Recommended](/docs/enterprise-mobility/android/what-is-android-enterprise-recommended/) requirement with devices running 8.0+ (and generally a decent benchmark to align to for device selection), from late 2020 zero-touch is available on all GMS certified devices running 9.0+. Prior to the announcement of global availability, Google had partnered with almost all popular OEMs to have the functionality implemented - Huawei, Sony, HTC, HMD Global (Nokia), and more already supported zero-touch from 8.0.

Once a zero-touch supported device is identified, organisations need only select a zero-touch enrolment reseller to purchase the devices from. With global availability, should the device not be Android Enterprise Recommended, it is advised to validate the model correctly supports Android Enterprise ahead of purchasing in bulk.

On the EMM side, there's not a considerable amount of work to be done - for EMMs that do already support fully managed deployments it's basically ready to go. For EMMs that don't yet support it, more information on allowing support can be found [here](https://developers.google.com/android/work/requirements/work-managed-device).

Resellers are being actively engaged, with already a number across the world already available. The resellers - aside from selling the devices - will also be responsible for setting customers up with a zero-touch portal account where, as mentioned above, the DPC and configurations are set. Once access is provided however, organisations can manage which resellers are associated with the portal themselves should it ever need to be changed.

## [Video](#video) {#video}

The below demonstrates zero-touch configured on a new, out-of-the-box Sony Xperia XZ1 enrolling into MobileIron Core:

https://youtu.be/OP-Szl2nPEc

The above video process is documented in my [zero-touch provisioning guide](/download/doc/ae-guides/Android-enterprise_WM-ZT-MICore.pdf). All guides can be found under [Android Enterprise provisioning guides](/docs/enterprise-mobility/android/android-enterprise-provisioning-guides/).
