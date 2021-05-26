When things go wrong with managed Android devices, vendors typically tend to follow a common set of troubleshooting steps. To speed up time to resolution, these steps (and more) are provided below. Some steps involve obtaining simple tidbits of information often overlooked, some require a little time and patience.

## [Determine how many devices are affected](#determine-how-many-devices-are-affected) {#determine-how-many-devices-are-affected}
Can you replicate your issue(s) on more than one device? If not, there's a fair chance the problem you're experiencing is local, and should be handled differently to an issue you can replicate on multiple devices.

There's not much more to this really, but it makes a big difference determining this before reporting an issue, as it's often one of the first requests you'll get back from your vendor, partner, reseller, or OEM ("vendor").

## [The basics](#the-basics) {#the-basics}
For devices affected, prepare the following:
- Manufacturer
- Model
- OS (major, eg. 11)
- OS build (Settings > About [phone/tablet] ( > Software information) > Build number )
- How the device is managed (Fully managed, work profile, work profile on fully managed (COPE < 11), work profile on corporate owned (COPE > 11))
- The EMM managing the devices

## [When did the issue begin?](#when-did-the-issue-begin) {#when-did-the-issue-begin}
Look for links, even tenuous, that may coincide with the start of the behaviour you're reporting. Some common examples include:
- Application updates
  - A good example of an application update causing an issue is the [2021 WebView update](https://www.theverge.com/2021/3/22/22345696/google-android-apps-crashing-fix-system-webview) which impacted many apps and services on devices
  - More commonly, application updates are associated with specific productivity or workflow issues, such as email apps crashing, or data failing to sync.
- System updates (device)
  - Major OS upgrades, such as 9.0 to 10 are a very commonly linked to issues
  - Minor OS upgrades, such as a monthly or 90 day SPL (security patch level) changes are less obvious, but have been known to introduce issues
  - Play System Updates, for newer Android releases, as many system components have recently been modularised as part of Project Mainline
- System updates (management platform)
  - May include an EMM platform update, or a local host update
- A change of environment
  - Network changes, such as starting to work from home, or changes to corporate infrastructure (firewall rules, content filtering, etc)
  - Issues associated with physical location, particularly where admins have set geo policies
  - Whether the issue persists on LTE should it be network related
- A change of ownership
- A change in policy

Fathoming what may be perceived to be the issue may allow you to debug and resolve it before needing to escalate, but if escalation is still necessary, will again save time debugging with the vendor.

## [Capture replication steps](#capture-replication-steps) {#capture-replication-steps}
When escalating an issue, clear, concise steps on how to replicate your experience is a must. All too often support outlets, be they in private with your MSP or EMM vendor, or publicly such as on the [help community](http://androidenterprise.help) or other forums/community groups, are inundated with _doesn't work_'s with little context. This often leads to far longer resolution times.

An example of replication steps could be:
1. Turn the device on
2. Tap continue on the welcome screen
3. Connect to cellular, rather than WiFi
4. Receive a message after 40 seconds stating "taking too long? Go back to try another connection method"
5. Setup does not continue

As well as written steps, providing either screenshots, a video, or both demonstrating the issue can avoid any misinterpretation of the steps provided and help the vendor see what you see, even if they cannot replicate it.

## [Can it be replicated on another EMM, or outside of management?](#can-it-be-replicated-on-another-emm-or-outside-of-management) {#can-it-be-replicated-on-another-emm-or-outside-of-management}
While not everyone will have multiple EMMs in use, it's helpful to know if the particular issue, assuming it's not management specific, like deploying certificates or WiFi network payloads, can be replicated outside of management, so when the device has been set up normally.

For management-derived issues, many scenarios can be tested through the Android Management API quickstart platform.

## [Capture logs](#capture-logs) {#capture-logs}
Logs allow vendors to deep-dive into the issue as the device experiences it, often allowing the vendor to see exactly what's happening, when, and why. There are two approaches to gathering logs, as follows.

### [Logcat](#logcat) {#logcat}
A logcat is a live, as-it-happens log which can be piped to a file for later review. It's very easy to generate, but requires a bit of preparation due to the need to connect to a computer. Logcat is ideal for issues which can be replicated over and over, but it falls short for issues during provisioning or enrolment, as typically debugging is disabled and is not possible to enable until after enrolment completes. For those situations, grab a bug report as soon as possible after the issue occurs instead.

#### [Set up ADB](#set-up-adb) {#set-up-adb}
There will be a link here once the respective doc is written up, however for now Googling ADB setup with Windows, Mac or Linux will offer many guides to follow online.

#### [Enable USB debugging](#enable-usb-debugging) {#enable-usb-debugging}
For most devices,

1. Settings > System > About device
2. Tap the build number seven times
3. Head to Settings > System > Developer options
4. Scroll down to USB debugging, and toggle it on

For Samsung,

1. Settings > About device > Software information
2. Tap the build number seven times
3. Head to Settings > Developer options
4. Scroll down to USB debugging, and toggle it on

#### [Get the log](#get-the-log) {#get-the-log}
Within the command line/terminal window, enter `adb logcat > path/to/logcat.txt` where the path is your preferred location to find the file later. Once the command is executed, replicate the issue if possible.

### [Bug report](#bug-report) {#bug-report}
Bug reports capture a full snapshot of the device at a particular time, collecting not only a stream of log information as captured by `adb logcat`, but also device posture, management and applied policies, installed applications, accounts, and more.

Because it captures such a wide range of information, it's important to stress a bugreport shouldn't be provided to _just anyone_, and should preferably be shared in such a way that you retain control of its distribution, such as via a Google Drive or OneDrive link shared directly, and not via public link.

Should you be capturing the bugreport of a fully managed device with no personal information, and with little concern over visibility of installed applications, the above doesn't quite matter as much.

With that aside, there are two means of capturing a bugreport:

1. Run the command `adb bugreport` via the command line from a host computer the device is connected to, bearing in mind the same prerequisites necessary for running `adb logcat` apply here. Running `adb bugreport` alone will pull a bugreport to the current directory on the host machine from which the command was run.
2. Head into Settings > System > Developer options (or Settings > Developer options on some devices) and locate "Bug report". Tapping this will prompt to select either full or interactive, full is normally appropriate, but gain guidance from the vendor as to what they want selected. After a few moments, the bugreport will generate and generate a notification in the notification area, from which you can share it as required directly from the device.

## [What debugging has been done so far?](#what-debugging-has-been-done-so-far) {#what-debugging-has-been-done-so-far}
An important step to avoid being asked to redo troubleshooting already done, be sure to outline the steps taken so far to attempt to either resolve, or at least troubleshoot the issue at hand, examples:
- Rebooted the device(s)
- Switched from WiFi to LTE (or opposite)
- Re-enrolled the device(s)
- Factory reset the device(S)
- Checked for, or updated, affected device(s)
- Checked the issue is not present outside of management
- etc..
