<!---
title: "How to locate a private Android app assigned to an organisation ID"
date: "2021-02-17"
type: "post"
--->

An issue that often pops up is being unable to locate within the Google Play iFrame a private application which has been assigned to your organisation (enterprise) ID by an external developer or developer account.

Often for applications intended not to be made available on the public Google Play Store, a developer will instead opt to publish the app privately for up to 100 unique organisation IDs.

![](/wp-content/uploads/2021/02/image.png)

When searching for an app which has been assigned to your organisation ID, you may note it is not immediately visible within the Google Play iFrame, nor on play.google.com/work. Often this is mistaken for propagation, however in reality it's a limitation of Play today.

A simple method to locating the app is simply searching for the package name, with `pname:` prepended to it, as follows:

`pname:app.package.name`

![](/wp-content/uploads/2021/02/image-1.png)

This should, under most circumstances, bring up the application in question, from which you'll be able to approve and distribute it normally.
