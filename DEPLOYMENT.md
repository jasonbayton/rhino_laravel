# Deployment Guide

Firstly, make sure composer is installed on the system, as this is used for package management. Version 2 is now the standard
version and a lower version cannot be used. [https://getcomposer.org/download/][Composer Download]

[Composer Download]: https://getcomposer.org/download/

If you have no already, clone the repo into the correct location on the server

Once completed, you will need to create an env file. The easiest way to do this is to copy and paste the example env file

```
cp .env.example .env
```

Once completed, edit the .env file to include the correct application name. The other settings may stay as they are.


Install the composer dependencies with the correct flags for production.

```
composer install --no-interaction --prefer-dist --optimize-autoloader
```

This system does not use any jobs or any other queues, so no other actions should be required here.

Finally, generate an application key

```
php artisan key:generate
```

# Auto Deployment Script

This script contains a GitHub workflow which will trigger an endpoint to deploy any changes to the application. 

This script will need to have the URL updated, so it hits the endpoint on the correct server. If a GET request is made
to this endpoint it will trigger the deploy.sh script in the root of this directory.

This process may take a few minutes to complete and will require a hard refresh of the website.

# Content Deployment Script

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


