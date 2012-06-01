<?php

	/*
	 * Init
	 * @use after all config/definitions/site specific files are brought in, run this
	 * @oa Will
	 *
	 */


	$registry = new registry;

	if (!isset($router_config)) {
		$router_config = array();
	}
	$registry->router = new router($registry, $router_config);
	$registry->router->set_path(__THIS_CONTROLLER_PATH);

	try {

		$registry->router->loader();

	} catch (Exception $e) {
		if (__ENVIRONMENT === 'dev') {
			ppx($e);
		} else {
			//Log error in logs
		}
	}