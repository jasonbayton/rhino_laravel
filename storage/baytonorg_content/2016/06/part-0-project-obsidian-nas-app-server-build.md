<!---
title: "Part 0 - Project Obsidian: Low power NAS & container server"
date: "2016-06-26"
categories:
  - "projects"
tags:
  - "build"
  - "linux"
  - "lxd"
  - "nas"
  - "obsidian"
  - "pc"
  - "server"
  - "ubuntu"
  - "zfs"
--->

I've built a number of machines over the years, dating back to my first Intel Celeron D build over 10 years ago; it had 2GB of RAM, 80GB storage and I'd spent months saving up for the parts one by one to eventually bring it to life. Since then times and technology have changed; my latest build completed in 2015 is a hex core AMD with 32GB RAM and 24TB of storage (and horrible cable management):

![IMG_20160119_210327](/wp-content/uploads/2016/06/IMG_20160119_210327-1500x1125.jpg)

It replaced a 2014 media centre build that shared the same processor, but with 16GB RAM and 6TB of storage (and slightly better cable management):

![DSC_0129](/wp-content/uploads/2016/06/DSC_0129-1500x1125.jpg)

The only thing these machines have in common, aside from the person who built them, is that they've never been documented. I've wanted to do a build log for years but despite repeated good intentions have never managed to do so.

For 2016 I set myself a goal to not only build a new system, but document it from start to finish, so without further ado I present my multi-part build log for Project Obsidian: a low power Ubuntu 16.04 LTS NAS & container server.

## Contents {#1}

- [Part 0 - Project Obsidian: Low power NAS & container server (introduction)](/2016/06/part-0-project-obsidian-nas-app-server-build/)
- [Part 1 - Project Obsidian: Objectives & parts list](/2016/06/part-1-project-obsidian-objectives-and-parts-list/)
- [Part 2 - Project Obsidian: Build day 1](/2016/07/part-2-project-obsidian-build-day-1/)
- [Part 3 – Project Obsidian: A change, data migration day 1 and build day 2](/2016/07/part-3-project-obsidian-a-change-data-migration-day-1-and-build-day-2/)
- [Part 4 - Project Obsidian: Obsidian is dead, long live Obsidian](/2017/01/part-4-project-obsidian-obsidian-is-dead-long-live-obsidian/)
- Part 5 - Project Obsidian: Setting up Ubuntu - LXD, ZFS & more
- Part 5 - Project Obsidian: Migrating data
- Part 6 - Project Obsidian: Conclusion

_NB: Everything is subject to change until completed._

## What is it? {#2}

This is better outlined in [objectives](/2016/06/part-1-project-obsidian-objectives-and-parts-list/), however essentially the aim of the project is to build a low power Ubuntu 16.04 LTS server with as much storage as possible. The 2015 build has 20TB in MDADM RAID6 (28TB RAW) and 4TB reserved, my aim is to increase that. Secondly, as well as being a NAS I will be running LXD, Docker and a few native applications to consolidate everything I have around a few local (and remote) servers into one central behemoth.

## Sponsors {#3}

There are no sponsors just yet.

Interested in helping out? Sponsors get a mention in every post and frequent shout-outs on social media. For this build I'm currently looking for high capacity drives (6-8TB), PCIe SATA/SAS solutions and cooling options aimed towards near silence.

## Get in touch {#4}

As always I'm [@jasonbayton](//twitter.com/jasonbayton) on Twitter, [+JasonBayton](https://twitter.com/jasonbayton) on Google+, [/in/jasonbayton](//linkedin.com/in/jasonbayton) on Linkedin and I'm available via [email](mailto:jason@bayton.org).

Free free to get in touch to discuss this or any other topics you have in mind!
