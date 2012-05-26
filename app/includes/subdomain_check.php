<?php
	/*
		 * Checks if we are in a set domain
		 * @use make sure invalid subdomains don't fail
		 * @oa  Will
		 *
		 */

	if (!defined('__THIS_CONTROLLER_PATH')) {
		header('location:http://' . __WWW_DOMAIN . '/info/subdomain_not_found/');
		exit;
	}