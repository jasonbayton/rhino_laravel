Google today dropped the most significant update to zero-touch since its introduction with the Google Pixel back in 2016!

Rolling out over the next several months, all GMS certified Android devices – new and existing – running 9.0 or above will support zero-touch by default, with no additional OEM effort required.

## Why does this matter? {#header1}
Zero-touch, Google’s equivalent of Apple’s Device Enrolment, Samsung’s Knox Mobile Enrolment, and Microsoft’s Autopilot, allows for the assignment of a device to a customer-defined EMM platform before it’s even taken out of the box.

It means I as a customer can purchase devices from a zero-touch reseller, have them added to my zero-touch customer account as part of the purchasing process, and ship them directly to my end users without any hands-on effort required – zero-touch, if you will. It’s a pretty powerful tool and removes a lot of overhead from IT, including the need to hand-hold during user-led provisioning, as well as the time and effort associated with in-house staging. More of the benefits of ZT can be found here.

The limitation to date has been device selection; that’s not to say there aren’t many device models supporting zero-touch today, quite the opposite with a few hundred devices available to date, but the solution is ultimately opt-in and it has remained that plenty of devices – whether due to choice or lack of awareness by the OEM, or OEMs having equivalent solutions such as KME for Samsung.

### Does that mean.. {#does-that-mean}
Yes, this change does also include Samsung devices! Samsung estates as well as any other Android 9.0+ device under management can now all fall under one provisioning service rather than needing both ZT for everything else, and KME for Samsung.

Samsung will undoubtedly expend effort playing up to the strengths of KME, as they rightly should given the flexibility and provisioning options KME provides surpass zero-touch, but if all organisations require is a simple and centralised provisioning service, migrating devices into ZT will be the logical next step.

Zero-touch isn’t the only thing Samsung have embraced with today’s announcement, however.

> We are excited to welcome Samsung Galaxy smartphones and tablets to the Android Enterprise Recommended program building upon our longstanding partnership to deliver great mobile experiences to businesses.
> <cite> David Still, Managing Director of Android Enterprise, Google </cite>

With Samsung’s support of zero-touch, it should come as little surprise Samsung’s devices are now also officially join Android Enterprise Recommended (though none show in the Solutions Directory at time of writing).

<div class="callout callout-warning">
	<div class="callout-heading">The future of COPE</div>
	How Android Enterprise implements COPE is changing, requiring all of the below EMMs who’ve worked to bring support for the solution set to market to rework COPE support once more from Android 11.
	<a href="/2020/02/android-enterprise-in-11-google-reduces-visibility-and-control-with-cope-to-bolster-privacy/">Read more</a>
</div>

<div class="callout callout-danger">
	<div class="callout-heading">The future of COPE</div>
	How Android Enterprise implements COPE is changing, requiring all of the below EMMs who’ve worked to bring support for the solution set to market to rework COPE support once more from Android 11.
	<a href="/2020/02/android-enterprise-in-11-google-reduces-visibility-and-control-with-cope-to-bolster-privacy/">Read more</a>
</div>

<div class="callout callout-info">
	<div class="callout-heading">The future of COPE</div>
	How Android Enterprise implements COPE is changing, requiring all of the below EMMs who’ve worked to bring support for the solution set to market to rework COPE support once more from Android 11.
	<a href="/2020/02/android-enterprise-in-11-google-reduces-visibility-and-control-with-cope-to-bolster-privacy/">Read more</a>
</div>

<div class="callout callout-success">
	<div class="callout-heading">The future of COPE</div>
	How Android Enterprise implements COPE is changing, requiring all of the below EMMs who’ve worked to bring support for the solution set to market to rework COPE support once more from Android 11.
	<a href="/2020/02/android-enterprise-in-11-google-reduces-visibility-and-control-with-cope-to-bolster-privacy/">Read more</a>
</div>

<div class="callout callout-primary">
	<div class="callout-heading">The future of COPE</div>
	How Android Enterprise implements COPE is changing, requiring all of the below EMMs who’ve worked to bring support for the solution set to market to rework COPE support once more from Android 11.
	<a href="/2020/02/android-enterprise-in-11-google-reduces-visibility-and-control-with-cope-to-bolster-privacy/">Read more</a>
</div>

<div class="callout callout-dark">
	<div class="callout-heading">The future of COPE</div>
	How Android Enterprise implements COPE is changing, requiring all of the below EMMs who’ve worked to bring support for the solution set to market to rework COPE support once more from Android 11.
	<a href="/2020/02/android-enterprise-in-11-google-reduces-visibility-and-control-with-cope-to-bolster-privacy/">Read more</a>
</div>

While the announcements go into little technical detail, it’s long been a prerequisite for devices to support zero-touch in order to be considered for AER validation. With Samsung’s reluctance to add ZT support in the past being really the only obvious technical requirement missing for said validation, given their otherwise recently decent track record for security updates and Android Enterprise support, the addition of ZT in GMS Core to enable this functionality was likely the remaining technical tick in the box.

![rocket](https://media.timeout.com/images/105653190/image.jpg)

The politics of “competing solutions” between KME/ZT and Samsung’s previously held views of AER given their dominance in enterprise also played a big role in how long it’s taken to get to this point, of course, but that’s now evidently water under the bridge.

##Before diving in {#before-diving-in}
While every certified 9.0+ device will support zero-touch going forward, it’s worth pointing out that doesn’t automatically validate every device for ZT provisioning; there are still OEMs out in the wild today, particularly amongst the lower-end of the market, that won’t automatically support Android Enterprise either due to lack of interest or technical challenges.

Although ZT will now be available on these devices, other issues, such as Wizard crashes, an inability to enrol the device after provisioning, or issues managing devices generally may remain.

This announcement therefore should not change the way organisations approach device vetting before committing to a particular make or model, unless said device is already AER validated.

##Do I need to do anything?
For resellers, check out the zero-touch partner portal for details on how and when reseller accounts go live.

Customers, get in touch with your resellers to discuss your options, including retrospective import of devices where supported by resellers.

OEMs – carry on as always, if you bundle Oobconfig.apk for devices today, keep doing it. If you haven’t, it should still just start working regardless, but do take the time to give it a bit of internal testing to avoid disappointing customers!

<iframe width="560" height="315" src="https://www.youtube.com/embed/OP-Szl2nPEc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

##That’s not all, folks
If universal support for zero-touch wasn’t enough, Google have also introduced EMM zero-touch integration following an announcement earlier this year at the partner summit; this allows for EMMs to more directly hook into zero-touch via APIs to enable the management of zero-touch configurations without customer interaction, removing the need to interface two separate portals.

It has long been something of a pain to manage zero-touch configurations due to the need to fiddle with JSON code for DPC extras, to the degree I’ve been maintaining my own resource to assist customers in quickly and easily locating the right JSON to use for different EMMs, although naturally EMMs individually hold this information as well.

With the integration, the need for manual JSON editing should vanish with EMMs able to generate configs through the respective zero-touch APIs, and because it’s an iFrame, customers will equally be able to manage configurations and devices themselves, directly within the EMM.

EMMs will be starting to go live with this integration from today, though as always, some will get it sooner than others. Speak to your EMM vendor for more information on this.

##And finally
One other notable change is to the information and filtering options available in the Solutions Directory.

From today, the following changes take effect –

* The zero-touch filter is no more, so only Android Enterprise Recommended devices will be shown on the directory
* Google have added more details concerning security updates, including (provided by the OEM):
  * End date of security update support
  * Security update frequency
* Additional certifications have been added, including ioXt & Common Criteria

These changes should add more transparency around software/security update support, and help to better set expectations when devices are purchased just how long they’ll be under support; hopefully avoiding a common complaint of organisations buying recommended devices mid-lifecycle only to find they’ve potentially far fewer than the 3 years of security updates advertised given few organisations validate when devices are released before purchasing!

##header1
###hedear2
##header3
###header4
####header5
###header6
####header7
##header8
