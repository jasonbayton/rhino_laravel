<!---
title: "Setup Kerberos Authentication on MobileIron Core for Android Enterprise"
date: "2019-03-18"
--->

## [Introduction](#introduction) {#introduction}

Kerberos authentication is a common method of providing Single Sign On with on-premise Microsoft Active Directory. This kind of authentication is also referred to as Integrated Windows Authentication (IWA) or SPNEGO.

Android Enterprise lacks native Kerberos support, but with a 3rd party solution, in this case [Hypergate](https://hypergate.com), it's possible to fill the native gap. This guide will describe how you can configure MobileIron Core to enable Android Enterprise to simulate Smart Card logons and leverage Kerberos Authentication to extend Single Sign On for corporate services to Android Enterprise devices.

Hypergate is not a free solution, however is priced competitively and sold through a network of partners. More information can be found [here](https://hypergate.com/pricing).

## [Prerequisites](#prerequisites) {#prerequisites}

- An existing Kerberos environment in place and functional
- Android Enterprise bound and fully configured
- MobileIron Core configured to leverage Kerberos (SCEP configs in place), and pushing client certificates to devices.
- MobileIron Tunnel
- Hypergate licensed

For context, the environment utilised for this guide is as follows:

- Our Active Directory Domain Controller has the FQDN 'DC01.MIACME.NL'
- The Realm (aka Domain for MS folks) is 'MIACME.NL'.
- MobileIron Core is configured to work with a SCEP server and client certificates are already pushed onto the devices.
- MobileIron Tunnel is used to allow the managed device to connect to the KDC (aka Domain Controller for MS folks).
- Hypergate is the Kerberos client other apps will use to request Kerberos tokens.
- The devices are fully managed. though all AE deployment scenarios are supported

## [Import Google Chrome](#import-google-chrome) {#import-google-chrome}

In MobileIron Core head to **Apps > App Catalog > Add+ > Google Play** and search for **Google Chrome**.  

![](/wp-content/uploads/2019/03/1.png)

Select the correct App, add it to the Category you want then make sure you tick the box **Install this app for Android Enterprise**.

![](/wp-content/uploads/2019/03/2.png)

## [Configure Google Chrome](#configure-google-chrome) {#configure-google-chrome}

After ticking the box to enable AE, scroll down to the managed configuration section. The Kerberos relevant configurations are:

- **Supported authentication schemes**: this needs to be “negotiate” telling Chrome to act accordingly if the Server responds with a Negotiate challenge.
- **Authentication server whitelist**: this can be a list of all servers permitted to request tokens. Wildcards are also valid. In this guide a wildcard “\*” is utilised.
- **Kerberos delegation server whitelist**: this can be a list of all servers permitted to request tokens. Wildcards are also valid. In this guide a wildcard “\*” is utilised.
- **Account type for HTTP Negotiate authentication**: this tells Chrome where to look for an App that can deal with the negotiate challenge. In this guide “ch.papers.hypergate” is used because that’s how Hypergate advertises itself.

![](/wp-content/uploads/2019/03/5-1140x883.png)

Following this, set the **Find Accounts On The Device** runtime permission to **Always Accept**:

![](/wp-content/uploads/2019/03/6.png)

Click **Finish/Save**.

## [Import Hypergate](#import-hypergate) {#import-hypergate}

Head to **Apps > App Catalog > Add+ > Google Play** and tick **Skip this step and manually provide Bundle ID and all app details** > **Next**. You will be prompted with a form in which you need to enter the package name provided by the Hypergate team. This is because Hypergate is not visible publicly on Google Play currently.

![](/wp-content/uploads/2019/03/3-1140x883.png)

Optional: For easier application list management (distinguish apps easier) you can also set the Hypergate logo in the next form by hitting “Replace Icon” and using this logo:

![](/wp-content/uploads/2019/03/4.png)

Click **Install this app for Android Enterprise**.  

## [Configure Hypergate](#configure-hypergate) {#configure-hypergate}

Scroll down to the managed configuration section. The relevant configurations are:

- **Username**: this should typically be **$USERID$**, but may need to follow naming conventions used in other SCEP configurations
- **Default realm**: this is the domain
- **Key Distribution Center**: this is the Domain Controller’s FQDN
- **PKinit KDC Hostname for PreAuth**: this is the Domain Controller’s FQDN
- **PKinit Certificate Alias**: \[intentionally blank\]
- **Certificate Authority**: Paste the CA cert, including intermediaries in this field.
- **Package name whitelist (comma separated)**: which apps should be allowed to requests tokens
- **Discoverability package names List (comma separated)**: which apps should discover Hypergate without first prompting the user with a selection screen.

![](/wp-content/uploads/2019/03/7.png)

The tick boxes control the menu displayed in the app, for production usage they should be all unticked (user only sees the ticket status), for troubleshooting/setup they can all be ticked (all menus/logging is shown).

When finished, click **Save/Finish**.

## [Configure MobileIron Tunnel](#configure-mobileiron-tunnel) {#configure-mobileiron-tunnel}

As a reminder, MobileIron Tunnel should be configured correctly and able to reach internal hosts (Chrome needs to reach intranet sites and Hypergate needs to communicate with the KDC). If using the configurations **AllowedAppList** and **DisallowedAppList** please ensure they're configured correctly to allow Chrome and Hypergate to reach their targets.  

### [These apps need assigning](#these-apps-need-assigning) {#these-apps-need-assigning}

If not already assigned to a label, please do so now for Tunnel, Chrome and Hypergate. A test label is highly recommended prior to production rollout!

## [Test Hypergate](#test-hypergate) {#test-hypergate}

Hypergate is now ready to be tested.

Assigned devices should now have Chrome, Tunnel and Hypergate installed and configured. To validate if Hypergate works correctly, simply open the app and tap “Login”, this should directly show the UPN/Username of the assigned user and current status.  

![](/wp-content/uploads/2019/03/8.png)

![](/wp-content/uploads/2019/03/9.png)

If the login does not work immediately, please check the logging section of Hypergate so troubleshoot (there are also network troubleshooting tools integrated in the “Ping KDC” menu).  

### [Chrome will do this automatically](#chrome-will-do-this-automatically) {#chrome-will-do-this-automatically}

Hypergate is only being opened manually to test the functionality. In future, Chrome will launch Hypergate and attempt to authenticate automatically.

## [Test Chrome](#test-chrome) {#test-chrome}

Within Chrome simply navigate to a website that requires authentication. Login should initiate automatically, immediately.

The first time Hypergate needs to fetch a Ticket Granting Ticket (TGT) there will be a non-intrusive short Hypergate prompt, every subsequent request will pass through without showing anything to the user.  

## [Complete!](#complete) {#complete}

At this point Hypergate should be set up correctly and Kerberos authentication will in future work correctly with Android Enterprise.

With this setup it's equally possible to enable Kerberos SSO for all apps that use Custom Chrome Tabs for authentication (e.g. Slack, Evernote,...).

Other Apps like Microsoft Edge Browser or Brave Browser will require configuration similar to that of Chrome.

https://www.youtube.com/watch?v=tnP0P3GxW-c

## [Support](#support) {#support}

For any additional information about Hypergate or its capabilities, please contact [hi@hypergate.com](mailto:hi@hypergate.com) directly.
