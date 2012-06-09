<?php

	/*
	 * Subdomain options
	 * @use include specific parts based on subdomain
	 * @oa	Will
	 *
	 */

	switch (__SITE) {
		case 'member':
		case 'mobile':
			include __APP_PATH . '/includes/start_session.cross_domain.php';
			break;
		default:
			//no session
			break;
	}
