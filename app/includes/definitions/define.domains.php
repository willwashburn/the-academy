<?php
    /*
      * Site Definition
      * @use Figures out which site this is, defines it
      * @oa  Will
      *
      */

    $static_domain = $static_prefix . '.' . $base_domain;

    $subdomain_position = strpos($_SERVER['HTTP_HOST'], $base_domain);
    if ($subdomain_position != 0) {
        $subdomain_position--;
    }

    if ($subdomain_position) {
        $subdomain = substr($_SERVER['HTTP_HOST'], 0, $subdomain_position);
    } else {
        $subdomain = '';
    }

    $site = 'not_found';

    foreach ($subdomains as $key => $value) {
        foreach ($value as $marker) {
            if ($subdomain == $marker) {
                $site = $key;
            }
        }
    }

    define('__SITE', $site);
    define('__CDN_DOMAIN', $cdn_domain);
    define('__BASE_DOMAIN', $base_domain);

    define('__STATIC_DOMAIN', $static_domain);
    define('__IMAGE_DOMAIN', $static_domain . '/images/');
    define('__JS_DOMAIN', $static_domain . '/js/');
    define('__CSS_DOMAIN', $static_domain . '/css/');
    define('__VIDEO_DOMAIN', $static_domain . '/video/');


    foreach ($subdomains as $title => $subdomain_array) {

        $constant = '__' . strtoupper($title) . '_DOMAIN';
        if ($subdomain_array[0] === '') {
            $use = 1;
        } else {
            $use = 0;
        }
        $domain = $subdomain_array[$use] . '.' . $base_domain;
        #$domain = $base_domain;
        define($constant, $domain);

    }

    if (in_array($site, $password_protected_subdomains)) {
        $password_protect = TRUE;
    } else {
        $password_protect = FALSE;
    }

    define('__ENABLE_PASSWORD_PROTECT', $password_protect);
