<?php
    /*
      * Domain Config
      * @use setup the names for all the domains that'll be accessed
      * @author Will
      *
      * subdomains will route the controllers and views according to the key value pair
      * (ie m.DOMAIN.com will route /controllers/m/index.controller.php)
      *
      * @param dev_prefixes - these will cause dev environments if they prepend the base domain
      * @param subdomains - these will route controllers and views to respective folders
      *
      */

    $base_domain = 'partypact.com';

    $dev_prefixes  = array('wdev', 'kdev');
    $static_prefix = 'static';

    $cdn_domain = 'cdn.willigant.com';

    $subdomains = array(
        'www'   => array('', 'www'),
        'mobile'=> array('m', 'touch', 'mobile')
    );

    $password_protected_subdomains = array(
        'mobile'
    );

