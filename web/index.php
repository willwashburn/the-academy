<?php
    /*
      * The Academy index file
      * @author Will Washburn <will@willigant.com>
      *
      * Apache should redirect all requests to this file
      *
      */

    include '../path_finder.php';

    ///Config and settings
    include __V_PATH . '/app/includes/config.php';
    include __V_PATH . '/app/includes/definitions.php';
    include __V_PATH . 'app/includes/error_reporting.php';

    ///Libraries
    include __APP_PATH . 'lib/php/common-library/functions/all.php';
    include __APP_PATH . 'lib/php/php-activerecord/ActiveRecord.php';

    //Domain Check
    include __APP_PATH . 'includes/subdomain_check.php';

    //Autoloaders
    include __APP_PATH . 'includes/autoloaders.php';

    ///Base Controller
    include __APP_PATH . 'controllers/all.base_controller.php';
    if (file_exists(__THIS_CONTROLLER_PATH . 'base_controller.php')) {
        include __THIS_CONTROLLER_PATH . 'base_controller.php';
    } else {
        include __APP_PATH . 'controllers/default.base_controller.php';
    }

    //Mustache
    include __APP_PATH . 'lib/php/mustache/src/Mustache/Autoloader.php';
    Mustache_Autoloader::register();

    //Router
    include __APP_PATH . 'routers/base_router.router.php';
    $domain_router_path = __APP_PATH . '/routers/' . __SITE . '.router.php';
    if (file_exists($domain_router_path)) {
        include $domain_router_path;
    } else {
        include __APP_PATH . '/routers/default.router.php';
    }

    include __APP_PATH . 'includes/subdomain_options.php';

    include __APP_PATH . 'includes/active_record.php';

    include __APP_PATH . '/includes/init.php';
