<!---
title: "Nexcloud behind a proxy: fixing mixed-content warnings with SSL"
date: "2017-06-03"
--->

## [1\. Why this happens](#1-why-this-happens) {#1-why-this-happens}

If you've setup Nextcloud to sit behind a proxy, you may encounter the following errors and find not all content loads correctly:

```
Content Security Policy: The page’s settings blocked the loading of a resource at http://cloud.myserver.com/core/img/background.jpg?v=20 (“img-src https://cloud.myserver.com data: blob:”).
Content Security Policy: The page’s settings blocked the loading of a resource at http://cloud.myserver.com/core/img/logo.svg?v=20 (“img-src https://cloud.myserver.com data: blob:”).
```

Normally this means the proxy is configured for SSL but proxies to Nextcloud over HTTP rather than HTTPS, like this:

```
ProxyPass / http://192.10.110.24/
ProxyPassReverse / http://192.10.110.24/
```

Or, in NGINX, like this:

```
proxy_pass http://192.10.110.24;
```

This configuration will terminate SSL on the proxy and have the proxy communicate with Nextcloud over HTTP. Since Nextcloud won't be configured to respond over HTTPS by default, all internal requests for content (like stylesheets, images, etc) will also be made over HTTP, resulting in mixed content warnings.

## [2\. How to fix it](#2-how-to-fix-it) {#2-how-to-fix-it}

In order to resolve this, make the following changes to your Nextcloud `config.php`:

```
'overwrite.cli.url' => 'https://cloud.myserver.com',
'overwriteprotocol' => 'https',
```

Nextcloud will then ensure all requests are made and returned over `https://` rather than `http://`, mitigating the mixed-content errors.

**Note**: Be aware, if you access Nextcloud internally via IP over HTTP, this will either a) give you SSL errors or b) not work at all - 443 is not configured by default, so it may refuse to connect when it forces, due to that setting, the connection from http:// to https://
