<!---
title: "How to update Rsync on Mac OS Mojave and High Sierra"
date: "2018-07-09"
categories:
  - "guides"
tags:
  - "high-sierra"
  - "homebrew"
  - "mac-os"
  - "rsync"
--->

Out of the box, Mac OS Mojave ships with a 12 year old version of Rsync. The reason for this is that Apple doesn’t include anything released under GPLv3 or similar licenses.

Luckily, it's relatively quick and simple to update Rsync using [Homebrew](https://brew.sh).

Homebrew is a package manager not dissimilar to Yum on Redhat or Apt on Debian. You can follow the instructions in the above link, or just copy and paste the commands documented as follows.  

Open the terminal and paste the command:

```
/usr/bin/ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"
```

Homebrew will link most software to /usr/local/bin. However, the terminal may be looking in other folders first, so lets make sure that /usr/local/bin is the first line in our path list.

```
sudo nano /private/etc/paths
```

![](/wp-content/uploads/2018/07/Screen-Shot-2018-07-08-at-15.31.49.png)

Now you are ready to install the new Rsync version, and can do so as follows:  

```
brew install rsync
```

Once completed, you should sign out and back in to MacOS.

When entering the command below, you will see now that you are using rsync 3.1.3 (at time of writing), instead of rsync 2.6.9. You are no longer running a 12 year old version of Rsync!

```
rsync --version
rsync  version 3.1.3  protocol version 31
```

As simple as that.
