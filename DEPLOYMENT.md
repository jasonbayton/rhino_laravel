# Deployment Guide

## Install Apache

Update the repos and install Apache

```
sudo apt update
sudo apt install apache2
```

Start the apache service and set it to run on boot

```
systemctl start apache2
systemctl enable apache2
```


Enable firewall access for apache

```
for svc in ssh http https
do 
ufw allow $svc
done
```

Enable the firewall

```
sudo ufw enable
```

Install PHP and the required dependencies

```
sudo apt install libapache2-mod-php php php-common php-xml php-gd php-opcache php-mbstring php-tokenizer php-json php-bcmath php-zip unzip php-yaml
```

Once installed you need to edit the php.ini config file

```
cd /etc/php/7.4/
nano apache2/php.ini
```


Uncomment the cgi.fix_path_info and change the value to 0

```
cgi.fix_pathinfo=0 
```

Restart Apache

```
systemctl restart apache2
```

## Install Composer

```
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```

Check the composer version is version 2 and the command works correctly
```
composer --version
```

## Cloning The Repo

If you have not already, clone the repo into the correct location on the server. This will likely be `/var/www/public`

Update the apache enabled websites to make sure it is pointing at the public directory within the repo

## Set the correct permissions

sudo chgrp -R www-data /var/www/
sudo chmod -R 775 /var/www/storage

## Setting up Laravel

You need to create an env file. The easiest way to do this is to copy and paste the example env file

```
cp .env.example .env
```

Edit the .env file to include the correct application name. The other settings may stay as they are.


Install the composer dependencies with the correct flags for production.

```
composer install --no-interaction --prefer-dist --optimize-autoloader
```

This system does not use any jobs or any other queues, so no other actions should be required here.

Generate an application key

```
php artisan key:generate
```

Create a symlink for the storage

```
php artisan storage:link
```

## Apache Configuration

If running Apache, the document root will need to point to the public folder, not the root directory.

If not already enabled, you will need to setup MOD_REWRITE for apache as this is used for the URL generation

https://www.digitalocean.com/community/tutorials/how-to-rewrite-urls-with-mod_rewrite-for-apache-on-ubuntu-20-04

# Auto Deployment Script

**When deploying to a server, please update the URL in the YAML .gitlab-ci.yml file to point to the correct server**

This script contains a GitHub workflow which will trigger an endpoint to deploy any changes to the application. 

This script will need to have the URL updated, so it hits the endpoint on the correct server. If a GET request is made
to this endpoint it will trigger the deploy.sh script in the root of this directory.

This process may take a few minutes to complete and will require a hard refresh of the website.

# Content Deployment Script

**When deploying to a server, please update the URL in the YAML .gitlab-ci.yml file to point to the correct server** 

To automate the deployment of new content there is an endpoint that will trigger the pulling of new content.

This is contingent on the content being within the rhino_content namespace in the storage directory.

This can be triggered by making a GET request to the /content-deploy endpoint. The current rhino_content repo has a 
GitHub workflow which triggers this endpoint on commit to the master branch.

# Building Assets

Thus far, assets are built using node and webpack. To do this you will need to have node installed on your system
you can then run `npm run dev` or `npm run production` depending upon your environment. The assets have been
prebuilt, so this is not a requirement, but often a good practise to follow.

# Manually Generating a Sitemap

A sitemap is regenerated every time a new content deployment is run. You can manually generate a sitemap using the
`php artisan sitemap:generate` command from within your bash console.
