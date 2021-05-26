<!---
title: "Feature spotlight: Android Smartlock"
date: "2018-08-06"
--->

A very common question I am asked, almost on every Android deployment I undertake in fact, is "what is Smartlock?".

It is a commonly overlooked configuration within EMMs, due either to the fact organisations don't know what it is, or that "smart" in the name gives the wrong impression and is therefore deemed safe.

## [A quick overview](#a-quick-overview) {#a-quick-overview}

Smartlock is a convenience feature in Android that aims to reduce how often a device with a passcode enabled needs to be unlocked in situations where it could be deemed _low risk._ Some of these situations include:

- Trusted places
- Trusted accessories
- On-body detection

Used correctly it can indeed offer a balance between security and convenience in genuinely trusted environments, however although it can be controlled granularly via some UEM solutions in terms of the types of Smartlock available, it is still frequently subject to overuse or abuse.

### [Trusted places](#trusted-places) {#trusted-places}

![](/wp-content/uploads/2018/08/Screenshot_20180807-104018.png)
_Selecting a trusted location on a map_

If you're at home, at your parents or a close friend's home, you're in a location you trust. It's unlikely (though not impossible) an unknown bad actor is going to walk into the living room and steal your phone.

It's fair to assume with the environment considered safe, _trusted_, you might not need to make use of authentication to gain access to your device.

Herein lies the problem. End-users may select the coffee shop, the local library or the pub as locations where they frequent and don't want to have their devices lock up.  

It is up to the end-user to deem what scenarios are safe; any location in the world, plus a fixed radius around it, can be set as trusted. Not good.  

When a device is not locked, it can be stolen and very easily accessed if it's in a trusted location and this is therefore not a great idea for corporate devices.

### [Trusted accessories](#trusted-accessories) {#trusted-accessories}

![](/wp-content/uploads/2018/08/Screenshot_20180807-105048.png)
_Selecting a trusted device from paired Bluetooth devices_

When entering a car, your device might automatically connect up to your Bluetooth system. When out for and about perhaps you have wireless headphones or at home connect up a keyboard and mouse wirelessly for typing up reports.

Trusted accessories allows you to reduce the frequency of inputting the passcode when a device is paired to particular Bluetooth devices.

Once again, since any Bluetooth accessory can be deemed trusted under any circumstance, if the device is stolen and unlocked within range of the Bluetooth accessory, the attacker will have full access to the device; in the case of an item such as a WearOS watch, it could remain unlocked for extended periods of time.  

### [On-body detection](#on-body-detection) {#on-body-detection}

![](/wp-content/uploads/2018/08/Screenshot_20180807-103854.png)
_Enabling on-body detection_

An Android device is exceptionally smart. It knows when it's static, when it's picked up and even when it's in motion. Using the latter, if your device detects you moving, it can make the assumption it is on your person and therefore safe.

With on-body detection, as long as the device feels a movement that isn't dissimilar to the typical bumps, jumps and shakes any device would feel in someone's pocket or bag, it can remain unlocked.

The very obvious drawback is simply if a device is snatched out of a hand or bag while the end-user is in motion. Whilst the attacker remains in motion, the device remains unlocked, easily accessed for a decent amount of time after the fact.

## [Why Smartlock is not a great idea](#why-smartlock-is-not-a-great-idea) {#why-smartlock-is-not-a-great-idea}

With the above situations, it is clear Smartlock can be easily taken advantage of by an attacker. For a business device, this risk is absolutely not worth taking for any devices, not least those known to hold sensitive data.

It is with that in mind that Smartlock should therefore be disabled as a matter of course for managed devices. The convenience does not outweigh the very real security risk of leaving it enabled.

Smartlock can be disabled across all modern UEM solutions either in part (on an individual basis) or entirely:

### [Disabling Smartlock for Workspace One UEM](#disabling-smartlock-for-workspace-one-uem) {#disabling-smartlock-for-workspace-one-uem}

Referred to as _Keyguard Trust Agent State_

![](/wp-content/uploads/2018/09/2018-09-08-20.16.12.gif)

### [Disabling Smartlock for MobileIron Core](#disabling-smartlock-for-mobileiron-core) {#disabling-smartlock-for-mobile-iron-core}

![](/wp-content/uploads/2018/09/2018-09-08-20.08.14.gif)

### [Disabling Smartlock for MaaS360](#disabling-smartlock-for-maas360) {#disabling-smartlock-for-maas360}

Again referred to as _Allow Trust agents_. Do take note of where this setting is as by default the policy opens within **Android Settings** and not **Android Enterprise Settings.**

![](/wp-content/uploads/2018/09/2018-09-08-20.28.24.gif)

## [Conclusion](#conclusion) {#conclusion}

If your organisation allows the use of Smartlock today, consider turning it off sooner rather than later. It _is_ a common feature popular among Android users so do expect to justify its disablement, however hopefully the above will provide the necessary information for organisations to do just that.
