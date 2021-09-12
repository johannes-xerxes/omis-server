## CSG APP

CSG APP description.

## Getting Started

This document will walk you through the essential apps and technologies that you must have to run the server in the development and testing. It will also be discussed the common way of installing the server repository to get you up and running with the development.

## Requirements

The following are the apps needed to run the server:

- **[PHP](http://php.net/) 7.4.xx** - The server is built on [PHP](http://php.net/)'s 7.4.xx version. Any sub-iteration of it will work.
- **HTTP Server** - The most common and most reliable HTTP Server available is [Apache](https://httpd.apache.org/).
- **DBMS** - Currently, I only use [MySQL](https://www.mysql.com/) as my database.
- **[Composer](https://getcomposer.org/) 2.1.6** - Server code relies heavily on [Laravel 8.x](https://laravel.com/) and other external open-source libraries which are bundled using [Composer](https://getcomposer.org)'s 2.1.6 version.
- **[NPM](https://www.npmjs.com/)** - For compiling assets included in the [Laravel 8.x](https://laravel.com/) bundle.

On local development you may opt to install an all-in-one LAMP stack for easy installation. I recommend to use [Laragon](https://laragon.org/) for local development.

## How to Install

The following are the steps needed to install the server:

- Clone this project by opening your terminal and enter this line `git clone https://github.com/johannes-xerxes/omis-server`.
- Change directory by entering `cd omis-server`
- Install the modules needed for the server by entering `php composer.phar install`, if you are using [composer.phar](https://getcomposer.org/), or `composer install`, if you installed [Composer](https://getcomposer.org/).
- Set up your **.env** file. **[.env.example](https://github.com/Rappo-Ghad/tdlc-server/blob/master/.env.example)** file is provided for reference on setting up your .env file.
- Create your schema named `omis` on your DBMS.
- Run this line `php artisan migrate` on your terminal
<!-- - Lastly, make a symlink in the project by entering this line `php artisan storage:link` on your terminal. -->

**More details will follow as the document will be updated soon**
