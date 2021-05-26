<!---
title: "Android Enterprise EMM COPE support"
date: "2019-10-07"
--->

## [The future of COPE](#the-future-of-cope) {#the-future-of-cope}

How Android Enterprise implements COPE is changing, requiring all of the below EMMs who've worked to bring support for the solution set to market to rework COPE support once more from Android 11. [Read more](/2020/02/android-enterprise-in-11-google-reduces-visibility-and-control-with-cope-to-bolster-privacy/)

Work profiles on fully managed devices (COPE) debuted with Android Oreo on the 21st of August, 2017. In the _extortionate_ amount of time since then there are still a number of EMMs in the market which do not support this perfect middle-ground between the loss of control on work profile devices, and lack of support for personal use on fully managed devices.

With advancements in Android Enterprise solutions to date, in particular OEMConfig, the workload for EMM vendors today has in theory shrunk. OEMs like Samsung and Zebra have fully embraced OEMConfig, with the former recommending the adoption of Android Enterprise over legacy DA-period SAFE APIs.

Yet EMMs continue to lag behind, implementing Android's universal APIs in dribs and drabs across the ecosystem, and providing a rather fragmented management experience for customers. COPE is just one such example.

## [Who supports COPE today?](#who-supports-cope-today) {#who-supports-cope-today}

### [MobileIron - 2018](#mobileiron-2018) {#mobileiron-2018}

MobileIron was the [first to launch](/2018/03/mobileiron-launch-android-enterprise-work-profiles-on-fully-managed-devices/) support for work profiles on fully managed devices with MobileIron Core 9.7 in early 2018. It would be several months before their other UEM, MobileIron Cloud, [gained support](/2018/12/mobileiron-cloud-r58-supports-android-enterprise-fully-managed-devices-with-work-profiles/) in late 2018 with R58.

MobileIron's implementation isn't bad, but their approach in deciding how admins should be able to manage the parent profile (by limiting available restrictions) has been a point of contention from the beginning.

### [VMware Workspace ONE UEM (AirWatch) - 2018](#vmware-workspace-one-uem-airwatch-2018) {#vmware-workspace-one-uem-airwatch-2018}

In late 2018 VMware also [introduced support](/2018/10/workspace-one-uem-1810-introduces-support-for-android-enterprise-fully-managed-devices-with-work-profiles/) for COPE with version 1810.

VMware equally uniquely provision managed Google Play accounts in both the work and parent profiles, leading to the possibility in future of deploying applications to both profiles as opposed to the work profile only.

### [BlackBerry UEM - 2019](#blackberry-uem-2019) {#blackberry-uem-2019}

BlackBerry [introduced](https://docs.blackberry.com/en/endpoint-management/blackberry-uem/12_11/release-notes-and-advisories/Whats-new-in-BlackBerry-UEM-12_11) COPE support with BlackBerry UEM 12.11, though if you thought work profiles on fully managed devices was a mouthful, BlackBerry opted bizarrely to call their's _Work and personal – full control activations for Android Enterprise devices_.

### [Samsung Knox Manage - 2019](#samsung-knox-manage-2019) {#samsung-knox-manage-2019}

Samsung introduced COPE support back in May-time 2019 for their Knox Manage EMM solution. Despite the name for anyone who is unfamiliar, Knox Manage supports Android (including non-Samsung), iOS and more.

### [Citrix Endpoint Management - 2020](#citrix-endpoint-management-2020) {#citrix-endpoint-management-2020}

Citrix introduced COPE support with [Endpoint Management 20.1.0](https://docs.citrix.com/en-us/citrix-endpoint-management/whats-new.html#endpoint-management-2010) and became the first UEM to declare support in 2020.

A particularly nice capability which all EMMs should support is the ability to Enterprise Wipe a COPE device without factory reset. Citrix supports this:

> You can use the selective wipe security action to remove the work profile of a COPE device. After the selective wipe, you can either perform a full wipe on the device or re-enroll the device with the same user name. Re-enrolling the device recreates the work profile.

### [Intune (AMAPI) - 2020](#intune-amapi-2020) {#intune-amapi-2020}

Following the [announcement](/2020/07/googles-android-management-api-will-soon-support-cope/) of support for COPE in AMAPI, Intune went into preview in late 2020.

## [And everyone else?](#and-everyone-else) {#and-everyone-else}

Other EMM/UEM vendors are working on supporting the solution - IBM, SOTI being two of the larger vendors.

Unlike the excruciating amount of time some vendors took to introduce support for work profiles on fully managed devices, the replacement for it introduced in Android 11, work profiles on company owned devices, has seen rapid uptake given it is based on a work profile deployment.
