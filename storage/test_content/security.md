## Overview

As part of our commitment to the security and longevity of our portfolio, Rhino devices benefit from software updates throughout the lifetime of each model. Updates are provided in two ways:

### Android version upgrades

All Rhino devices are guaranteed a minimum of one Android version upgrade from the date of launch. For Global SKU devices, upgrades are rolled out in stages across all devices from our central OTA servers. For Private SKU customers, upgrades are made available on an agreed-upon basis, or shortly following Global SKU rollout if no agreements are in place.

As Rhino is made for extended support and availability, new Android version upgrades may be undertaken during the period of hardware availability. This may be due to demand, customer agreement, or otherwise. If your organisation leverages Rhino and desires a version upgrade, reach out to [sales](mailto:sales@socialmobile.com).

### Android security updates & maintenance releases

**All Rhino devices benefit from security updates within 90 days of release from Google, normally sooner, for 3-5 years, model-depending.**

Security updates include all CVEs addressed by Google for the referenced SPL (security patch level), and may also address CVEs published by SOC vendors (eg, MediaTek) and partners (eg, Honeywell) if available. We recommend security updates are applied as soon after release from our central OTA servers as possible. For customers with EMMs supporting it, we also make the OTA files available for local/closed network installation via Android Enterprise (Android 10) and OEMconfig (Android 9.0+).

As the Rhino range of devices supports A/B seamless updates, downtime for system updates is minimal, requiring only a reboot once the update is applied in the background. Should this update fail to apply, it will reboot back into the previous OS build. This minimises risk for deployed endpoints.

Occasionally, maintenance releases will be required. These include changes outside of security patches and may resolve performance issues, bugs, configuration issues or update system applications. These updates will typically include an updated SPL but not always. A maintenance release can be identified by _Build type: **MR**_ compared to a security update's _Build type: **SMR**_.

## Android security update support

The following table outlines each available Rhino device and pertinent information relating to support.
<div id="support_table" markdown="1">
| **Model** | **SKU** | **OS** | **Upgrade** | **EOA**   | **SMR EOS** |
|-----------|---------|--------|-------------|-----------|-------------|
| T5se      | Global  | 11     | 12          | TBD       | TBD         |
| T8        | Global  | 9      | 10          | June 2023 | June 2023   |
| C10       | Global  | 9      | 10          | June 2023 | June 2023   |
| M10p      | Global  | 10     | 11          | Sept 2023 | Sept 2025   |
| K27p      | Global  | 10     | 11          | TBD       | TBD         |

EOA - End of availability (manufacture)  
SMR EOS - Expected end of security update releases  
</div>

## Disclosing vulnerabilities

For details on disclosing vulnerabilities to the Rhino team, [click here](/security/vulnerability-disclosure).
