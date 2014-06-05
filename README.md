Symfony Sonata Distribution
===========================

Welcome to the Symfony Sonata Distribution - a fully-functional Symfony2
Sonata application that you can use as the skeleton for your new application.

This distribution exists to save you from repeating all the steps needed to create
a basic Sonata app.

This document contains information on how to download, install, and start
using Symfony with Sonata. For a more detailed explanation, see the [Installation][1]
chapter of the Symfony Documentation.

NOTE: For older Symfony versions use the corresponding branch.

1) Installing the Sonata Distribution
-------------------------------------

When it comes to installing the Symfony Sonata Distribution, you have the
following options.

### Use Composer (*recommended*)

As Symfony uses [Composer][2] to manage its dependencies, the recommended way
to create a new project is to use it.

If you don't have Composer yet, download it following the instructions on
http://getcomposer.org/ or just run the following command:

    curl -s http://getcomposer.org/installer | php

Then, use the `create-project` command to generate a new Symfony Sonata application:

    php composer.phar create-project -s dev jmather/symfony-sonata-distribution path/to/install

Composer will install Symfony and all its dependencies under the
`path/to/install` directory.

### Download an Archive File

To quickly test Symfony Sonata, you can also download an [archive][3] of the Sonata
Distribution and unpack it somewhere under your web server root directory.

You also need to install all the necessary dependencies. 
Download composer (see above) and run the following command:

    php composer.phar install

2) Checking your System Configuration
-------------------------------------

Before starting coding, make sure that your local system is properly
configured for Symfony.

Execute the `check.php` script from the command line:

    php app/check.php

Access the `config.php` script from a browser:

    http://localhost/path/to/symfony/app/web/config.php

If you get any warnings or recommendations, fix them before moving on.

3) Set up, initialize and browse the app
----------------------------------------

### Initializing the DB

Before you can run the server and log in to Sonata you need to create the
tables first.

    ./app/console doctrine:schema:create

### Create the users

You can either create a handful of users like this (one of the usernames is 
'superadmin' with password 'test')

    ./app/console doctrine:fixtures:load

Or you can manually create a user yourself

    ./app/console fos:user:create username emai@example.com password
    ./app/console fos:user:promote username ROLE_SONATA_ADMIN

### Install assets:

    ./app/console assets:install --symlink --relative web

### Start the server:

Congratulations! You're now ready to use Symfony Sonata

    ./app/console server:run

### Login

Now you can login as user 'superadmin' with password 'test' at

    http://localhost:8000/admin

## Warning

Currently .htaccess is configured to use app_dev.php but not app.php (production - no debug). When you launch your application don't forget to use app.php.

## Browsing the Demo Application

From the `config.php` page, click the "Bypass configuration and go to the
Welcome page" link to load up your first Symfony page.

You can also use a web-based configurator by clicking on the "Configure your
Symfony Application online" link of the `config.php` page.

To see a real-live Symfony page in action, access the following page:

    web/app_dev.php/demo/hello/Fabien

4) Getting started with Symfony
-------------------------------

This distribution is meant to be the starting point for your Symfony
applications, but it also contains some sample code that you can learn from
and play with.

A great way to start learning Symfony is via the [Quick Tour][4], which will
take you through all the basic features of Symfony2.

Once you're feeling good, you can move onto reading the official
[Symfony2 book][5].

A default bundle, `AcmeDemoBundle`, shows you Symfony2 in action. After
playing with it, you can remove it by following these steps:

  * delete the `src/Acme` directory;

  * remove the routing entries referencing AcmeBundle in
    `app/config/routing_dev.yml`;

  * remove the AcmeBundle from the registered bundles in `app/AppKernel.php`;

  * remove the `web/bundles/acmedemo` directory;

  * remove the `security.providers`, `security.firewalls.login` and
    `security.firewalls.secured_area` entries in the `security.yml` file or
    tweak the security configuration to fit your needs.

What's inside Symfony Sonata Distribution?
------------------------------------------

The Symfony Sonata Distribution is based on the Symfony Standard Edition.
Additionally the following bundles are used to configure a fully functional
Sonata application:

* [**SonataCoreBundle**][16] - The foundation on which the Sonata bundles rest

* [**SonataAdminBundle**][17] - The main bundle needed to create the admin interface

* [**SonataDoctrineORMAdminBundle**][18] - Integrates Doctrine ORM project with the admin bundle

* [**FOSUserBundle**][19] - Provides user management

* [**SonataUserBundle**][20] - Integrates the FOSUserBundle and adds some features

* [**SonataBlockBundle**][21] - This bundle provides a block management solution

There are some more bundles necessary to run the application so take a look at the composer.json file.

What's inside Symfony Standard Edition
--------------------------------------

The Symfony Standard Edition is configured with the following defaults:

  * Twig is the only configured template engine;

  * Doctrine ORM/DBAL is configured;

  * Swiftmailer is configured;

  * Annotations for everything are enabled.

It comes pre-configured with the following bundles:

  * **FrameworkBundle** - The core Symfony framework bundle

  * [**SensioFrameworkExtraBundle**][6] - Adds several enhancements, including
    template and routing annotation capability

  * [**DoctrineBundle**][7] - Adds support for the Doctrine ORM

  * [**TwigBundle**][8] - Adds support for the Twig templating engine

  * [**SecurityBundle**][9] - Adds security by integrating Symfony's security
    component

  * [**SwiftmailerBundle**][10] - Adds support for Swiftmailer, a library for
    sending emails

  * [**MonologBundle**][11] - Adds support for Monolog, a logging library

  * [**AsseticBundle**][12] - Adds support for Assetic, an asset processing
    library

  * [**JMSSecurityExtraBundle**][13] - Allows security to be added via
    annotations

  * [**JMSDiExtraBundle**][14] - Adds more powerful dependency injection
    features

  * **WebProfilerBundle** (in dev/test env) - Adds profiling functionality and
    the web debug toolbar

  * **SensioDistributionBundle** (in dev/test env) - Adds functionality for
    configuring and working with Symfony distributions

  * [**SensioGeneratorBundle**][15] (in dev/test env) - Adds code generation
    capabilities

  * **AcmeDemoBundle** (in dev/test env) - A demo bundle with some example
    code

Enjoy!

[1]:  http://symfony.com/doc/2.4/book/installation.html
[2]:  http://getcomposer.org/
[3]:  https://github.com/jmather/symfony-sonata-distribution/archive/master.zip
[4]:  http://symfony.com/doc/2.4/quick_tour/the_big_picture.html
[5]:  http://symfony.com/doc/2.4/index.html
[6]:  http://symfony.com/doc/2.4/bundles/SensioFrameworkExtraBundle/index.html
[7]:  http://symfony.com/doc/2.4/book/doctrine.html
[8]:  http://symfony.com/doc/2.4/book/templating.html
[9]:  http://symfony.com/doc/2.4/book/security.html
[10]: http://symfony.com/doc/2.4/cookbook/email.html
[11]: http://symfony.com/doc/2.4/cookbook/logging/monolog.html
[12]: http://symfony.com/doc/2.4/cookbook/assetic/asset_management.html
[13]: http://jmsyst.com/bundles/JMSSecurityExtraBundle/master
[14]: http://jmsyst.com/bundles/JMSDiExtraBundle/master
[15]: http://symfony.com/doc/2.4/bundles/SensioGeneratorBundle/index.html

[16]: http://sonata-project.org/bundles/core/master/doc/index.html
[17]: http://sonata-project.org/bundles/admin/2-2/doc/index.html
[18]: http://sonata-project.org/bundles/doctrine-orm-admin/2-2/doc/index.html
[19]: https://github.com/FriendsOfSymfony/FOSUserBundle
[20]: http://sonata-project.org/bundles/user/master/doc/reference/installation.html
[21]: http://sonata-project.org/bundles/block/master/doc/index.html
