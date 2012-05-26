<?php
	/*
	 * The Academy index file
	 * @author Will Washburn <will@willigant.com>
	 *
	 * Apache should redirect all requests to this file
	 *
	 */

	include '../path_finder.php';

	include __V_PATH . '/app/includes/config.php';
	include __V_PATH .'/app/includes/definitions.php';

	include __APP_PATH.'includes/subdomain_check.php';

	//Settings for each site
	switch (__SITE) {
		case 'member':
		case 'mobile':
			include __APP_PATH . '/includes/start_session.cross_domain.php';
			break;
		default:
			//no session
			break;
	}

	include __APP_PATH . '/includes/init.php';
