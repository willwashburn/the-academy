The Academy Framework
=====================

This is the basic framework for most WilliGant applications. It is a derivative of many other MVC frameworks. We probably just should have used Yii or Symfony but we are way to stubborn :)

Requirements
---------------------
- Requires PHP 5.3+
- Requires latest WilliGant Resources
- Requires PHPActiveRecord


Apache VHOSTS Settings
----------------------

	----------------------
    <VirtualHost *:80>

     ServerName static.DOMAIN.com
     ServerAlias static.DOMAIN.com

    DocumentRoot /path/to/static/root
    	<Directory /path/to/static/root/ >
    		RewriteEngine On
    		RewriteBase /

    		RewriteCond %{REQUEST_FILENAME} !-f
    		RewriteCond %{REQUEST_FILENAME} !-d
    		RewriteRule (.*) index.php?$1 [L,QSA]

    	</Directory>

    </VirtualHost>

    <VirtualHost *:80>

     ServerName *DOMAIN.com
     ServerAlias *DOMAIN.com

    DocumentRoot /path/to/root/web/
    	<Directory /path/to/root/web/ >
    		RewriteEngine On
    		RewriteBase /

    		RewriteCond %{THE_REQUEST} favicon.ico [NC]
     		RewriteRule (.*) http://URL_OF_FAVICON.ico [R=301,S=1]

    		RewriteCond %{REQUEST_FILENAME} !-f
    		RewriteCond %{REQUEST_FILENAME} !-d
    		RewriteRule (.*) index.php?$1 [L,QSA]

    	</Directory>

    </VirtualHost>
	----------------------

