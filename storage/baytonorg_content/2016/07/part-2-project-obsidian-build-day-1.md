<!---
title: "Part 2 - Project Obsidian: Build day 1"
date: "2016-07-01"
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

## Just tuning in? {#tuning}

This is a multi-part build log for Project Obsidian: a low power Ubuntu 16.04 LTS NAS & container server. You're currently viewing part 2. Head over to the [introduction](/2016/06/part-0-project-obsidian-nas-app-server-build/) for context and contents.

## Building the compute module {#building}

As I'm still considering the storage aspect of Obsidian, I'm splitting the build into two halves; this half covers the top 915F housing the mini-ITX system and PSU, while the bottom 915R housing the storage will come later.

For the sake of getting Obsidian up and running I have temporarily housed the 120GB SSD and a single 4TB disk in the 915F. These will relocate down to the 915R later.

## Build video {#video}

I managed to get a half-decent build video sped up to 100fps. To do this I propped my Logitech C920 up on the highest object I could find and hoped for the best. The angle isn't ideal but it's relatively easy to follow the build. Here's the video:

<iframe width="560" height="315" src="https://www.youtube.com/embed/C9osk0UKnMA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

## Notes {#notes}

- To begin with and prior to the recorded build I pre-installed the CPU and 16GB of RAM.
- Due to poor visibility I found it somewhat difficult to install the passive heatsink, opting in the end to screw by hand the two mounting screws just enough to confirm alignment before then pushing the heatsink down onto the chip.
- With the 915's ability to remove basically every panel it was incredibly easy to work with the case, and being a mini-ITX board made it easier still.
- Cable management was not a goal during the build. I'll tidy everything up and utilise the copious amounts of zipties provided both with the 915 and PSU at a later date.
- Despite opting for a passive heatsink, while the SSD and HDD accompany the motherboard I've opted to install the supplied chassis fan to draw in air.
- Unexpectedly the supplied black sata power connectors wouldn't fit the SSD due to fouling on the backplate on which it's mounted, so a sata power extension cable was required due to having a completely flat connector on the end.

## Sponsors {#sponsors}

There are no sponsors just yet.

Interested in helping out? Sponsors get a mention in every post and frequent shout-outs on social media. For this build I'm currently looking for high capacity drives (6-8TB), PCIe SATA/SAS solutions and cooling options aimed towards near silence.

## Get in touch

As always I'm [@jasonbayton](//twitter.com/jasonbayton) on Twitter, [+JasonBayton](https://twitter.com/jasonbayton) on Google+, [/in/jasonbayton](//linkedin.com/in/jasonbayton) on Linkedin and I'm available via [email](mailto:jason@bayton.org).

Free free to get in touch to discuss this or any other topics you have in mind!
