<?php
	/*
	 * Site Definition
	 * @use Figures out which site this is, defines it
	 * @oa  Will
	 *
	 */


	$public_domain = __DOMAIN_PREFIX . '.' . $base_domain;
	$static_domain = $static_domain . '.' . $public_domain;

	$subdomain_position = strpos($_SERVER['HTTP_HOST'], $public_domain);
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
	define('__JS_DOMAIN', $static_domain . '/javascripts/');
	define('__CSS_DOMAIN', $static_domain . '/css/');
	define('__VIDEO_DOMAIN', $static_domain . '/video/');


	foreach ($subdomains as $title => $subdomain_array) {

		$constant = '__' . strtoupper($title) . '_DOMAIN';
		if ($title != 'public') {
			$domain = $subdomain_array[0] . '.' . $public_domain;
		} else {
			$domain = $public_domain;
		}
		define($constant, $domain);

	}