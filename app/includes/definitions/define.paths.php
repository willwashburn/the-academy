<?php

	/*
	 * Define all absolute paths
 	* @oa  Will
 	*
 	*/

	$app_path     = __V_PATH . '/app/';
	$models_path  = $app_path . '/models/';
	$helpers_path = $app_path . '/helpers/';

	$static_path = __V_PATH . '/static/';
	$image_path  = $static_path . 'images/';

	foreach ($subdomains as $title => $subdomain_array) {

		//Controllers
		$controller_constant = '__' . strtoupper($title) . '_CONTROLLER_PATH';
		$controller_path     = __V_PATH . '/app/controllers/' . $title . '/';
		define($controller_constant, $controller_path);

		//CSS
		$css_constant = '__' . strtoupper($title) . '_CSS_PATH';
		$css_path     = __V_PATH . '/app/css/' . $title . '/';
		define($css_constant, $css_path);

		//JS
		$js_constant = '__' . strtoupper($title) . '_JS_PATH';
		$js_path     = __V_PATH . '/app/js/' . $title . '/';
		define($js_constant, $js_path);

		//VIEWS
		$view_constant = '__' . strtoupper($title) . '_VIEW_PATH';
		$view_path     = __V_PATH . '/app/views/html/' . $title . '/';
		define($view_constant, $view_path);

		if ($title === __SITE) {
			define('__THIS_CONTROLLER_PATH', $controller_path);
			define('__THIS_CSS_PATH', $css_path);
			define('__THIS_JS_PATH', $js_path);
			define('__THIS_VIEW_PATH', $view_path);
		}

	}

	define ('__MODELS_PATH', $models_path);
	define ('__HELPERS_PATH', $helpers_path);
	define('__APP_PATH', $app_path);
	define('__IMAGE_PATH', $image_path);
