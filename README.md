#The Academy PHP Framework
This framework has become obsolete and is no longer being maintained.

The Academy is a PHP MVC framework designed for @ConnectedGreek + @WilliGant
applications. It was built from a sloppy pile of spaghetti code that became
unmaintainable. It was glorious for awhile, but as with all code -- it turned
pretty cringe worthy once I realized how it's really done. 

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


List of defined constants
----------------------
- __V_PATH -> the root path
* __BASE_DOMAIN -> eg "willigant.com" or "wdev.willigant.com"
* __DOMAIN_PREFIX -> eg "wdev"
- __SITE
- __CND_DOMAIN
- __STATIC_DOMAIN
- __IMAGE_DOMAIN
- __JS_DOMAIN
- __CSS_DOMAIN
- __VIDEO_DOMAIN
- __(each subdomain)_DOMAIN
* __ENVIRONMENT -> dev or production

