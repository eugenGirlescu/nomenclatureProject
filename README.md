In this guide, we look at how to install Laravel framework on Ubuntu 18.04 server.


Before we install Laravel framework, let’s first install the prerequisite packages that will be required.

We will need:
Apache Web server
PHP >= 7.1.3 with OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype and JSON PHP Extensions.
Composer – an application-level package manager for the PHP

1.Install Apache Web server and PHP 7.2

execute the command : $ sudo add-apt-repository ppa:ondrej/php

Next, update your system’s repositories.

2.Install Apache and PHP 7.2 alongside other prerequisites.

execute the command: $ sudo apt-get install apache2 libapache2-mod-php7.2 php7.2 php7.2-xml php7.2-gd php7.2-opcache php7.2-mbstring 

3.Install Composer
Before we embark on the installation, we will first install a few useful tools. These are git version control, curl and unzip packages.

execute command: $ sudo apt install curl git unzip

Next, we need to install composer.

execute command:
$ cd /opt
$ curl -sS https://getcomposer.org/installer | php


The curl command downloads Composer to the /opt directory. Since we need composer running globally, we must move it to the /usr/local/bin directory under 'composer' name.

$ mv composer.phar /usr/local/bin/composer


Install Laravel Framework
Now, let’s navigate to the public_html directory of our Ubuntu System. To install Laravel, we will navigate to the /var/www/html directory.

execute command : cd /var/www/html


Next, we will create a directory “your-project” with Laravel installation. The composer will proceed to use Git to download and install all packages and modules that Laravel requires for functioning.

$ sudo composer create-project laravel/laravel your-project --prefer-dist


Configure Apache Web Server for Laravel
The next step is to configure our Apache Web server

# sudo chgrp -R www-data /var/www/html/your-project
# sudo chmod -R 775 /var/www/html/your-project/storage


Now let’s navigate to /etc/apache2/sites-available directory and run the command below to create a configuration file for our Laravel install.
$ vim /etc/apache2/sites-available/laravel.conf

Add the following content:


ServerName localhost

ServerAdmin webmaster@localhost
DocumentRoot /var/www/html/your-project/public

AllowOverride All

ErrorLog ${APACHE_LOG_DIR}/error.log
CustomLog ${APACHE_LOG_DIR}/access.log combined

Save the file and Exit.

Finally, we are going to enable the newly created laravel.conf file. But before that, let’s disable the default config file.
$ sudo a2dissite 000-default.conf

Next, enable the Laravel config file.
$ sudo a2ensite laravel.conf

Then enable rewrite mode:
$ sudo a2enmod rewrite

Lastly, restart the Apache service.
$ sudo systemctl restart apache2

To verify that Apache is running execute the command:
systemctl status apache2

Test Laravel Website
At this point, You have successfully installed Laravel on your Ubuntu 18.04 LTS System. To confirm that the installation went as expected visit your server’s IP address.
https://server-IP-address














