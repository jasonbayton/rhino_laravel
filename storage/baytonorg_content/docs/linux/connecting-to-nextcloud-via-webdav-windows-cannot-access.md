<!---
title: "Connecting to Nextcloud via webDAV: \"Windows cannot access..\""
date: "2017-07-13"
--->

Recent updates to Windows 10 have been interfering with my mapped Nextcloud webDAV network folder.

## [The errors](#the-errors) {#the-errors}

For existing connections:

[![](/wp-content/uploads/2017/07/Restoring-Network-Connections.png)](/wp-content/uploads/2017/07/Restoring-Network-Connections.png)

For new connections:

[![](/wp-content/uploads/2017/07/Network-Error.png)](/wp-content/uploads/2017/07/Network-Error.png)

## [The cause](#the-cause) {#the-cause}

Doing some digging, it would appear a Windows service is to blame:

[![](/wp-content/uploads/2017/07/Region.png)](/wp-content/uploads/2017/07/Region.png)

## [The fix](#the-fix) {#the-fix}

The WebClient service needs to be running and, preferably, set to Automatic. However I've noticed with Windows updates this service is infrequently being set to manual and therefore preventing access to new or existing webDAV connections.

By settings Startup type to **Automatic**, the issue will no longer present itself. To avoid a reboot, in the above screenshot simply click **Start** to restore the connection immediately.
