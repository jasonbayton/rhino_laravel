-<!--
title: "Android P demonstrates Google's focus on the enterprise"
date: "2018-03-21"
categories:
  - "enterprise"
tags:
  - "airwatch"
  - "android"
  - "android-enterprise"
  - "android-p"
  - "google"
  - "mobileiron"
--->

Just over a week ago Google [released](https://developer.android.com/preview/index.html) the first Android P developer preview.

It's a good one.

On the consumer side, Google introduced a nice slew of features that have been extensively covered by mainstream media, including:

- The mild design tweaks (it's all very rounded now)
- The improvements to notifications
- New, long-overdue restrictions for the camera(s), microphone(s) and sensors when an app is idle
- Multi-camera support
- Display cutout (notch!) support

.. unsurprisingly I found myself far more interested in the changes, additions and improvements for Android Enterprise that come with P.

There are _a lot_.

In fact, it's probably safe to say this is the most enterprise-focused release of Android to date; the primary reason it's taken over a week to publish a post about the changes in P has been due to the amount of [testing I've been doing](https://lnkd.in/dBe8PXE)! Here are some highlights:

## 1\. Improved separation of work and personal applications {#1}

![](/wp-content/uploads/2018/03/2018_03_19_16_57_47.gif) Today when deploying either _work profile_ or _work profile on fully managed devices_ into an organisation, the work and personal applications are fully mixed together within the launcher. While not overly problematic, it has been a source of feedback for Google (and myself via customer deployments) with end-users asking why their applications are duplicated.

Obviously with this change the application duplication itself hasn't been addressed (and I'm OK with that), but the stock Google launcher now features a distinct separation between work and personal apps (pictured), making it much easier to differentiate whilst significantly reducing the cluttered feeling of seeing duplicate applications in the app drawer.

Just in case you're wondering, the personal & work tabs don't show up unless a work profile is present.

If the stock launcher would also introduce swipe gestures and manual backups for layouts, I'd finally consider letting go of Nova launcher because this implementation is _nice._

## 2\. More ways to toggle the work profile on and off {#2}

![](/wp-content/uploads/2018/03/2018_03_19_23_15_10.gif) Tying into the separation above, Google also added new options for toggling the work profile in P.

Being able to turn the work profile off for BYOD users is something I believe to be quite important; when a device is shared between work and personal usage there's a natural tendency to fall into the always-on culture that offers little time to _switch off_.

Google's earlier introduction of the work profile toggle enables users to literally _turn off work_ and be entirely left alone until it's switched back on, but being hidden up in the quick settings means it's often forgotten about.

While it's being used in the stock launcher (pictured), APIs becoming available mean any application with the permission `MANAGE_USERS` or `MODIFY_QUIET_MODE` will now be able to modify the work profile state, whether through a toggle or otherwise.

I'm quite pleased to see more attention being given to this.

## 3\. Simpler switching between work and personal accounts within apps {#3}

![](/wp-content/uploads/2018/03/2018_03_19_21_30_07.gif) The focus on the work and personal split continues with this next simple, but massively impacting change; it'll be possible (once applications support it) to switch between work and personal profiles from within apps directly.

Today if you have a personal account and a work account (via the work profile) in an app like Gmail, you'll need to actively switch between the work and personal instances of Gmail on the device (pictured). Once support is available, switching between work and personal email accounts will be as simple as switching between multiple accounts within a profile is today.

This change is more about adding dynamic shortcuts between the two versions of the application, so this change will have no impact on EMM-enforced DLP controls, separately encrypted work/personal app storage or anything else that has been put in place to secure corporate data.

## 4\. Easier QR code provisioning {#4}

Up to Oreo 8.1, when provisioning a device for enrolment using a QR code, a few time-consuming things happen:

1. You need to input Wi-Fi details
2. You must wait for the QR libraries to download and install before a QR reader will open.

With P, both of these issue are resolved.

Wi-Fi configuration details can now be embedded into the QR code, a raw example as follows (highlighted in bold):

{
"android.app.extra.PROVISIONING\_DEVICE\_ADMIN\_COMPONENT\_NAME":
"com.mobileiron/com.mobileiron.receiver.MIDeviceAdmin",

"android.app.extra.PROVISIONING\_DEVICE\_ADMIN\_PACKAGE\_CHECKSUM":
"S-21kvHAUKM0Uy7Ps7oBI4s8XPoH9QldPSWTj\_cwXS4",

"android.app.extra.PROVISIONING\_DEVICE\_ADMIN\_PACKAGE\_DOWNLOAD\_LOCATION":
"https://home.bayton.org/download/mobileiron-MIClient-latest.apk",
"android.app.extra.PROVISIONING\_SKIP\_ENCRYPTION": false,
"android.app.extra.PROVISIONING\_LEAVE\_ALL\_SYSTEM\_APPS\_ENABLED":false,
**"android.app.extra.PROVISIONING\_WIFI\_SSID":"BAYTONwifi",**
**"android.app.extra.PROVISIONING\_WIFI\_SECURITY\_TYPE":"WPA",**
**"android.app.extra.PROVISIONING\_WIFI\_PASSWORD":"wifiallthings",**
"android.app.extra.PROVISIONING\_ADMIN\_EXTRAS\_BUNDLE": {
"server":"core.bayton.org",
"user":"jason",
"quickStart":true
}
}

If those look familiar, it's because they're already supported in the NFC payload. The difference is now because Android P comes bundled with the QR code libraries out of the box, there's no need to first connect to Wi-Fi and wait for them to download, the reader pops up immediately allowing Wi-Fi to configure in the background. That easily saves up to 2 minutes per device, maybe more on slower connections!

Here's a demo of it in action:

https://youtu.be/-eVbZb9xDyo

## 5\. APN configuration support {#5}

A long-awaited feature, Android P introduces support for remotely configuring APN settings on Android Enterprise work-managed devices.

Many no doubt won't consider this to be particularly important at all, however if you work in Government or in an organisation generally large enough to warrant (and afford!) a private, dedicated network APN for mobile devices, it has been a difficult few years of manually editing APN settings.. or not using Android Enterprise at all.

A notable solution taking advantage of APN settings is Wandera; with APN settings available Wandera will be able to fully support native Android Enterprise devices as well as Samsung. It's a pretty big deal for that alone.

## 6\. More control over updates {#6}

Today organisations can already postpone Android Enterprise-managed device updates by up to 30 days, or force them to install immediately.

With P, 30 days stretches out to a whopping **90** days, offering organisations three times the amount of time for testing and validation on the release of updates, or simply the ability to prevent devices attempting to update over an extended holiday period (or some other reason a change-freeze may be in place).

However, those thinking of indefinitely postponing updates to support the legacy Android 2.3-era Frankenstein application barely just holding on with Oreo will be disappointed as there's a cooling-off period of 60 days after being postponed, which means updates will eventually make their way to devices no matter what.

## 7\. Several new device restrictions {#7}

As with every Android update, P includes some new restrictions in order to offer more control to organisations, these include:

- `DISALLOW_AIRPLANE_MODE`
- `DISALLOW_AMBIENT_DISPLAY`
- `DISALLOW_CONFIG_BRIGHTNESS`
- `DISALLOW_CONFIG_DATE_TIME`
- `DISALLOW_CONFIG_LOCATION`
- `DISALLOW_CONFIG_SCREEN_TIMEOUT`
- `DISALLOW_PRINTING`

I'm particularly fond of the ability to prevent Airplane mode, though I've had requests for configuring Date/Time, Location and more granular control of screen timeout in the past; these will be well-received by organisations I've worked with!

## 8\. Support for multiple users on dedicated devices {#8}

Another long-awaited feature particularly useful to the COSU/dedicated market (Zebra comes to mind): Ephemeral users.

Multi-user support in Android has been around for a long time, however it has been very much consumer-focused, intended to allow a device at home to be shared between families and other similar situations.

However, since COSU devices are often shared between many end-users - be that in a warehouse, logistics, or even shared tablets in hotels, hospitals and other situations - providing platform support for managed ephemeral users to provide short-term access to devices either as guests or a fixed users will come in _very_ handy. Revolutionary, even.

With this feature alone I imagine we'll be seeing a very positive shift in how COSU devices are managed today.

## 9\. The introduction of DA deprecation {#9}

At this point the deprecation of Device Administrator APIs should not be new information; Google [announced it](https://www.blog.google/products/android-enterprise/why-its-time-enterprises-adopt-androids-modern-device-management-apis/) in December, I have [written about it](/2017/12/google-is-deprecating-device-admin-in-favour-of-android-enterprise/) extensively both here and on social media, and at this point many mainstream media outlets have talked about it also.

The following policies will start to throw warnings when used in Android P, and will throw an exception (or error and fail) in Android Q next year:

- `USES_POLICY_DISABLE_CAMERA`
- `USES_POLICY_DISABLE_KEYGUARD_FEATURES`
- `USES_POLICY_EXPIRE_PASSWORD`
- `USES_POLICY_LIMIT_PASSWORD`

It's definitely time to be thinking about [migrating from legacy Android enrolment to Android Enterprise](/docs/enterprise-mobility/android/considerations-when-migrating-from-device-administrator-to-android-enterprise/).

## Conclusion {#conclusion}

There are far more additions to P I haven't referenced here, which is definitely [worth a read](https://developer.android.com/preview/work.html) for those interested. There are controls and features added around COSU for example that will be very welcome for organisations deploying shared, single use devices.

Given this is only the developer preview I'm sure there's potentially more to come; I'll be waiting with my Pixel to test the next drop and will report back anything new and interesting I find either here, on [LinkedIn](https://linkedin.com/in/jasonbayton) or [Twitter](https://twitter.com/jasonbayton). Keep an eye out for updates!
