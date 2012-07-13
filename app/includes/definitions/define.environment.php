<?php
    /*
      * What environment are we in?
      * @use are we in dev mode or staging or production
      * @oa    Will
      *
      * basically, is one of the dev prefixes prepended to the base domain?
      *
      */

    $environment   = 'production';
    $domain_prefix = '';

    foreach ($dev_prefixes as $prefix) {

        $dev_domain = $prefix . '.' . $base_domain;

        $dev_domain_position = strpos($_SERVER['HTTP_HOST'], $dev_domain);

        if ($dev_domain_position != 0 || $dev_domain === $_SERVER['HTTP_HOST']) {
            $base_domain   = $dev_domain;
            $domain_prefix = $prefix;
            $environment   = 'dev';

            $dev_domain_position--;
        }
    }

    $host_name = getHostByName(getHostName()); //returns host ip ie 69.164.222.13


    define('__DOMAIN_PREFIX', $domain_prefix);
    define('__ENVIRONMENT', $environment);
    define('__HOST_NAME', $host_name);