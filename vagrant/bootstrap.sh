#!/usr/bin/env bash

APP_PATH='/vagrant/'
CFG_DIR='/vagrant/vagrant'

echo "|-------------|"
echo "| Updating... |"
echo "|-------------|"

sudo apt-get install python-software-properties
sudo add-apt-repository ppa:ondrej/php

apt-get update

echo "|----------------|"
echo "| Nginx setup... |"
echo "|----------------|"

apt-get -y install nginx


ln -s "$CFG_DIR/todo.conf" "/etc/nginx/sites-enabled/todo.conf"
rm /etc/nginx/sites-enabled/default
service nginx start

echo "|-------------|"
echo "| db setup... |"
echo "|-------------|"

debconf-set-selections <<< 'mysql-server mysql-server/root_password password secret'
debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password secret'

apt-get -y install mysql-server

mysql -uroot -psecret -e 'create database todo_list'

echo "|-----------------|"
echo "| php7.1 setup... |"
echo "|-----------------|"

apt-get -y install php7.1 php7.1-fpm php7.1-curl php7.1-mysql php7.1-mbstring

echo "|------------------------|"
echo "| installing composer... |"
echo "|------------------------|"

service php7.1-fpm restart

curl -s http://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

chmod g+w /usr/local/bin/composer
chgrp vagrant /usr/local/bin/composer

apt-get -y install mc

echo "|---------------------------------|"
echo "| Install project dependencies... |"
echo "|---------------------------------|"

su - vagrant -c 'composer global require "fxp/composer-asset-plugin:^1.3.1" --no-progress --no-interaction --optimize-autoloader'
su - vagrant -c 'cd /vagrant && composer install --verbose --prefer-dist --no-progress --no-interaction --optimize-autoloader'

service nginx restart

echo "|-----------------------|"
echo "| Provision finished... |"
echo "|-----------------------|"
