<!---
title: "Android Enterprise zero-touch DPC extras collection"
date: "2019-01-08"
--->

DPC extras can be used to associate Android Enterprise fully managed devices with a particular EMM/UEM platform during provisioning. 

The following examples offer a complete DPC extra snippet that can be copied and pasted into the zero-touch configuration. The items **in bold** will **need to be edited** to suit your environment, though, otherwise the zero-touch enrolment process will fail.

<div class="callout callout-warning">
	<div class="callout-heading">Editing ADMIN EXTRAS BUNDLE</div>
  <p>To be of value, the ADMIN_EXTRAS_BUNDLE should ideally at least include the server URL or identifier (where appropriate), however lines for username, password, and more can optionally be omitted to allow the config to remain generic.</p>

  <p>JSON doesn't leave room for error - the last line within ADMIN_EXTRAS_BUNDLE must not have a trailing comma ",". See "user" in the MobileIron config has a comma, but "quickstart" does not? If you remove "quickstart", you'd need to remove the comma from "user" as it then becomes the last line, otherwise it could throw up an error.</p>
</div>

<div class="callout callout-warning">
	<div class="callout-heading">Trust but verify</div>
  Most of these DPC extra collections have been submitted either by EMM vendors or customers of the EMM referenced. The vendor may make changes to the extras they provide <b>without my knowledge</b> so it is recommended should the below extras fail to properly work, that you validate with your EMM before contacting me (but do feel free to reach out with updates!)
</div>

<div class="callout callout-danger">
	<div class="callout-heading">Usernames & passwords</div>
  Unless the username and password are stipulated for the purpose of <b>staging</b>, they should <b>not</b> be included at all due to the potential security risks associated. If an IMEI not belonging to an organisation is mistakenly added (typo, miscommunication, human error), the device will be able to enrol automatically and potentially gain access to corporate resources.
</div>

<div class="callout callout-info">
	<div class="callout-heading">Google announces zero-touch EMM integration</div>
  <p>For those who consider copying and pasting JSON code a bit of a pain, you're in luck; Google announced the zero-touch iFrame, allowing EMMs to integrate with a customer zero-touch account, allowing - <a href="/2020/11/google-announce-big-changes-to-zero-touch/">amongst other features</a> - the ability to manage DPC extras automatically.</p>

  <p>Reach out to your vendor to ask when this functionality will be available.</p>
</div>

## [MobileIron](#mobileiron) {#mobileiron}
<pre>
{
"android.app.extra.PROVISIONING_LEAVE_ALL_SYSTEM_APPS_ENABLED":<b>true/false</b>,
"android.app.extra.PROVISIONING_ADMIN_EXTRAS_BUNDLE":{
"server":"<b>your.server.com</b>",
"user":"<b>user</b>",
"quickStart":<b>true/false</b>
}
}
</pre>
## [AirWatch / Workspace One UEM](#airwatch-workspace-one-uem) {#airwatch-workspace-one-uem}
<pre>
{
"android.app.extra.PROVISIONING_LEAVE_ALL_SYSTEM_APPS_ENABLED":<b>true/false</b>,
"android.app.extra.PROVISIONING_ADMIN_EXTRAS_BUNDLE":{
"serverurl":"<b>your.server.com</b>",
"gid":"<b>yourGroupID</b>",
"un":"<b>staginguser</b>",
"pw":"<b>example</b>"
}
}
</pre>
## [SOTI](#soti) {#soti}
<pre>
{
"android.app.extra.PROVISIONING_LEAVE_ALL_SYSTEM_APPS_ENABLED":<b>true/false</b>,
"android.app.extra.PROVISIONING_ADMIN_EXTRAS_BUNDLE":{
"enrollmentId":"<b>EnrollmentID</b>"
}
}
</pre>
## [MaaS360](#maas360) {#maas360}
<pre>
{
"android.app.extra.PROVISIONING_LEAVE_ALL_SYSTEM_APPS_ENABLED":<b>true/false</b>,
"android.app.extra.PROVISIONING_ADMIN_EXTRAS_BUNDLE":{
"enrollment_corp_id”:”<b>CorporateID</b>”,
”enrollment_account_type":"<b>userAccount</b>",
"enrollment_domain":"<b>domain</b>",
"enrollment_username”:”<b>staginguser</b>”,
"enrollment_email":"<b>emailaddress@email.com</b>",
"enrollment_password”:”<b>example</b>”,
"enrollment_ownership":"<b>Corporate Owned</b>"
}
}
</pre>
## [Codeproof EMM](#codeproof-emm) {#codeproof-emm}
<pre>
{
"android.app.extra.PROVISIONING_LEAVE_ALL_SYSTEM_APPS_ENABLED":<b>true/false</b>,
"android.app.extra.PROVISIONING_ADMIN_EXTRAS_BUNDLE":{
"displayname":"<b>devicename</b>",
"userid":"<b>staginguser</b>".
"password":"<b>example</b>"
}
}
</pre>
## [Intune](#intune) {#intune}
<pre>
{
"android.app.extra.PROVISIONING_LEAVE_ALL_SYSTEM_APPS_ENABLED":<b>true/false</b>,
"android.app.extra.PROVISIONING_ADMIN_EXTRAS_BUNDLE":{
"com.google.android.apps.work.clouddpc.EXTRA_ENROLLMENT_TOKEN": "<b>YourEnrollmentToken</b>"
}
}
</pre>
## [Miradore](#miradore) {#miradore}
<pre>
{
"android.app.extra.PROVISIONING_LEAVE_ALL_SYSTEM_APPS_ENABLED":<b>true/false</b>,
"android.app.extra.PROVISIONING_ADMIN_EXTRAS_BUNDLE": {
"RegistrationKey": "<b>REGISTRATIONKEY</b>",
"EnrollmentKey": "<b>ENROLLMENTKEY</b>",
"SiteIdentifier": "<b>SITEIDENTIFIER</b>"
}
}
</pre>
## [BlackBerry UEM](#blackberry-uem) {#blackberry-uem}
<pre>
{
"android.app.extra.PROVISIONING_LEAVE_ALL_SYSTEM_APPS_ENABLED":<b>true/false</b>,
"android.app.extra.PROVISIONING_ADMIN_EXTRAS_BUNDLE": {
"URL":"<b>SERVERURL</b>",
"CACFPrint":"<b>CHECKWITHBB</b>",
"stc":"<b>CHECKWITHBB</b>",
"Username":"<b>USERNAME</b>"
}
}
</pre>
## [FAMOC](#famoc) {#famoc}
<pre>
{  
"android.app.extra.PROVISIONING_LEAVE_ALL_SYSTEM_APPS_ENABLED":<b>true/false</b>,  
"android.app.extra.PROVISIONING_ADMIN_EXTRAS_BUNDLE": {   
"fqdn":"<b>your.server.com</b>",   
"bootstrap_key":"<b>yourIndividualKey</b>"   
}   
}
</pre>
## [mySync](#mysync) {#mysync}
<pre>
{   
"android.app.extra.PROVISIONING_LEAVE_ALL_SYSTEM_APPS_ENABLED":<b>true/false</b>,  
"android.app.extra.PROVISIONING_ADMIN_EXTRAS_BUNDLE": {   
"serviceUrl": "<b>https://server.host.name.here/rest/api</b>",  
"installationCode": "<b>ten-character-code</b>"   
}   
}
</pre>
## [XenMobile](#xenmobile) {#xenmobile}
<pre>
{   
"android.app.extra.PROVISIONING_LEAVE_ALL_SYSTEM_APPS_ENABLED":<b>true/false</b>,  
"android.app.extra.PROVISIONING_ADMIN_EXTRAS_BUNDLE": {   
"serverURL":"<b>URL</b>",   
"xm_username":"<b>username</b>",   
"xm_password":"<b>password</b>"   
}   
}
</pre>
## [VXL Fusion UEM](#vxl-fusion-uem) {#vxl-fusion-uem}
<pre>
{   
"android.app.extra.PROVISIONING_LEAVE_ALL_SYSTEM_APPS_ENABLED":<b>true/false</b>,  
"android.app.extra.PROVISIONING_ADMIN_EXTRAS_BUNDLE": {   
"fusionuem_server_url":"<b>server url</b>",   
"fusionuem_token_id":"<b>token id</b>"  
}   
}
</pre>
## [Samsung Knox Manage](#samsung-knox-manage) {#samsung-knox-manage}
<pre>
{
"android.app.extra.PROVISIONING_LEAVE_ALL_SYSTEM_APPS_ENABLED":<b>true/false</b>,
"android.app.extra.PROVISIONING_ADMIN_EXTRAS_BUNDLE": {
"ServerUrl": "<b>Your Server Url</b>",
"TenantId": <b>"Your Knox Manage Tenant ID</b>",
"TenantType": "<b>M</b>",
"Method": "<b>ZeroTouch</b>"
}
}
</pre>
## [Chimpa MDM](#chimpa-mdm) {#chimpa-mdm}
<pre>
{
"android.app.extra.PROVISIONING_LEAVE_ALL_SYSTEM_APPS_ENABLED":<b>true/false</b>,
"android.app.extra.PROVISIONING_ADMIN_EXTRAS_BUNDLE":{ "chimpa_activationCode":"<b>YOURTENANTCODE</b>",
"provisionType":<b>0/1</b>,
"additionalProvisioningText":"<b>your additional text to show</b>",
"whiteLabelLogo":"<b>https://yoururl/resource.png</b>",
}
}
</pre>
**provisionType** values:  
**0** Fully Managed  
**1** Enhanced Work Profile (Android 11+)

## [42Gears SureMDM](#42gears-suremdm) {#42gears-suremdm}
<pre>
{
"android.app.extra.PROVISIONING_LEAVE_ALL_SYSTEM_APPS_ENABLED": <b>true/false</b>,
"android.app.extra.PROVISIONING_ADMIN_EXTRAS_BUNDLE”:{
"AccountId":"<b>1000001</b>",
"ServerPath":"<b>suremdm.42gears.com</b>"
}
}
</pre>
## [Meraki Systems Manager](#meraki-systems-manager) {#meraki-systems-manager}
<pre>
{
"android.app.extra.PROVISIONING_LEAVE_ALL_SYSTEM_APPS_ENABLED":<b>true/false</b>,
"android.app.extra.PROVISIONING_ADMIN_EXTRAS_BUNDLE":{
"enrollment_url":"https://m.meraki.com/enroll/?android_from_store=true&enrollment_code=<b>Your_Meraki_Enrollment_Identifier</b>"
}
}
</pre>
## [TinyMDM](#tinymdm) {#tinymdm}
<pre>
{
"android.app.extra.PROVISIONING_LEAVE_ALL_SYSTEM_APPS_ENABLED":<b>true/false</b>, "android.app.extra.PROVISIONING_ADMIN_EXTRAS_BUNDLE": {
"enrollmentId": “<b>XXXXXXXXXXXXXXXX</b>"
}
}
</pre>
## [Other interesting zero-touch config options](#other-interesting-zero-touch-config-options) {#other-interesting-zero-touch-config-options}

The following additional options go **before** the ADMIN\_EXTRAS\_BUNDLE line and may require EMM support to function:
<pre>
"android.app.extra.PROVISIONING_SKIP_EDUCATION_SCREENS":<b>true/false</b>,
"android.app.extra.PROVISIONING_LOCALE":"<b>en_GB</b>",
"android.app.extra.PROVISIONING_USE_MOBILE_DATA":<b>true/false</b>,
</pre>
[Here's a few more.](https://developer.android.com/reference/android/app/admin/DevicePolicyManager.html#EXTRA_PROVISIONING_ACCOUNT_TO_MIGRATE)

## [Submit zero-touch DPC extras](#submit-zero-touch-dpc-extras) {#submit-zero-touch-dpc-extras}

If you’d like to see your DPC extras added to this list, please fill out [this form](https://goo.gl/forms/igE9wXZFO1qX2qjm1) or comment below.
