<!---
title: "Samsung, Oreo and an inconsistent Android Enterprise UX"
date: "2018-04-17"
categories:
  - "enterprise"
  - "mobile"
tags:
  - "android"
  - "android-enterprise"
  - "emm"
  - "enterprise"
  - "mdm"
  - "oreo"
  - "samsung"
--->

Oreo was released to the public last August; by Christmas I had a selection of Android 8.0 devices to hand and as of last week only 20% of my Android estate was not running 8.0 or above, one of which was my Note 8 which had been seemingly permanently stuck on 7.1.1 and failed to get any security updates beyond Jan 2018.

On Sunday evening however I did one of many weekly manual update checks since the announcement of Oreo for the Note some time back, and finally the upgrade had arrived (with last month's security update - March 2018) with Samsung Experience 9 in tow.

I'd heard and read Samsung were fiddling with the Android Enterprise work profile experience, some EMMs have even published KBs warning of the changes, but of course I reserved judgement until I received and tested it for myself. Here's my experience as a work profile user:

## Upgrading with an existing work profile {#1}

### Removing app shortcuts {#11}

For some reason, and this is a situation I have _never_ experienced on a device upgrade before, work application shortcuts from folders on my homescreen had been inexplicably removed. I maintain a consistent homescreen, give or take, across all devices I use, so noticed this immediately upon reboot:

![](/wp-content/uploads/2018/04/Modified-205633_Nova-Launcher-e1523976004258-500x332.jpg)

It's very easy to put these back where they belong, but a pretty silly bug to have to encounter.

### Hidden work notification content {#12}

Again, despite permitting work notification content to be shown normally, by default it had been changed to hidden and presented the following instead:

![](/wp-content/uploads/2018/04/Screenshot_20180415-205601_Nova-Launcher-e1523964613975-500x464.jpg)

With the notification came an indication of the new changes afoot, I've never needed to "enter Workspace" before. Furthermore, it took a bit of fumbling around Workspace settings to locate the notification contents settings and return it back to how I had it.

### A new work app indicator {#13}

Personally this seems unnecessary, but when a work application is opened, Workspace now adds a small triangle in the bottom corner to indicate the app icon with a bright orange work badge you tapped to launch the app, is still a work app after launching[:](/wp-content/uploads/2018/04/yodog.jpg)

![](/wp-content/uploads/2018/04/Screenshot_20180415-205850_My-Files-e1523964859828-500x166.jpg)

### Multicolour work badge {#14}

Following the upgrade it appears Workspace didn't know whether to colour the work badge orange or blue:

![](/wp-content/uploads/2018/04/Screenshot_20180415-225507_Nova-Launcher-e1523964986556-500x333.jpg)

It adds a bit of colour to the app drawer in any case. After re-enrolling however they all went blue. Goodbye orange briefcase! I'm thankful at least to see Samsung didn't change _everything_ and left the work applications displaying in the app drawer after the upgrade.

## On removing and re-enrolling the device {#2}

Convinced with the experience above was a bit buggy, I figured I'd take the opportunity to ditch the work profile and re-enrol for a fresh Workspace experience.

### Work apps are now hidden by default {#21}

Within the app drawer there's a new icon for Workspace, before tapping there you won't see your work applications:

![](/wp-content/uploads/2018/04/Screenshot_20180415-210109_Workspace-e1523965366112-500x462.jpg)

As an isolated feature I don't mind this at all. Organisations have asked many times in the past why their users see duplicate applications and is one area of improvement for [Android P](/2018/03/android-p-demonstrates-googles-focus-on-the-enterprise/). As an unexpected change to the UX though it could well initially be a tad confusing. It is however easy enough to revert back:

![](/wp-content/uploads/2018/04/2018_04_17_14_25_20.gif)

It's also worth noting this "feature" only appears to work with the Samsung launcher. Nova, my launcher of choice for all of my BYO devices today, showed the work apps with a badge irrespective of whether that setting was toggled or not. Considering work profile is very much a BYOD tool, I'd have thought it would have been better QA'd with other popular launchers.

### Notification content is hidden again {#22}

Likely a limitation of the EMM I enrolled with, but once more notification content defaults to hidden and has to be manually permitted via Workspace settings.

## Moving away from a consistent UX {#3}

Samsung continues the march to make themselves different from everyone else on the market with the switch from work profile to Workspace for Android Enterprise deployments. Workspace is obviously not a new solution as it's been around for years prior to the Android Enterprise/Knox unification and offers a nice value-add for paying customers over and above the standard Android Enterprise work profile. Depending on where an organisation comes from though - be that Samsung's Workspace with Device Administrator management, or containerisation via any other means - it could either feel familiar, or bizarre. Given Samsung have supported work profile natively for a long time and that's been the _only_ option for work profile deployments, I'd lean towards the latter.

Based on my own lukewarm experience upgrading to Oreo and Knox experience 9, this is not going to be a smooth upgrade for many, and just as EMMs have published documentation warning of the changes, so too will organisations need to prepare their users and _be prepared_ for unexpected changes, bugs and more.

The recent launch of [work profiles on fully managed devices](/2018/03/mobileiron-launch-android-enterprise-work-profiles-on-fully-managed-devices/) means Workspace will no doubt end up in use with work-managed devices. For every other OEM however, organisations will have one, clear, reliable user experience. Just as with the lack of zero-touch support today, I wouldn't be surprised if the thought of managing Workspace _and_ work profiles would be enough to reconsider Samsung when organisations look to purchase new devices, if the Android Enterprise Recommended requirement hasn't done that already.

Time will tell.

_Have you upgraded to Oreo? Seen and experienced Workspace first-hand? What do you think of it? Let me know your thoughts in the comments,_ [_@jasonbayton_](https://twitter.com/jasonbayton) _on twitter or_ [_@bayton.org_](https://facebook.com/bayton.org) _on Facebook. If you’re on LinkedIn, you can also find me there –_ [_/in/jasonbayton_](https://linkedin.com/in/jasonbayton).
