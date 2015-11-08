# Reflickr - Flickr Photos Explorer

Reflickr is a simple app that can be used to explore photos from Flickr using tags. An user can simply type in a 'tag' and start exploring Flickr photos.


## Installation

1. Clone/Download to default web directory (XAMPP/htdocs/{project-name} for XAMPP)
2. You might have to setup virtual host as below for local environment:

```
   <VirtualHost *:80>
   ServerAdmin adminName
   DocumentRoot "/Applications/XAMPP/xamppfiles/htdocs/reflickr/app/webroot/"
   ServerName local.reflickr.com
   ServerAlias www.local.reflickr.com
   SetEnv HTTP_ENVIRONMENT "local"
   <Directory "/Applications/XAMPP/xamppfiles/htdocs/reflickr/app/webroot/">
   Options Indexes FollowSymLinks Includes ExecCGI
   AllowOverride All
   Order deny,allow
   Require all granted
   </Directory>
   </VirtualHost>
```