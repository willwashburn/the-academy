<?php

	/*
	 * Error Reporting Settings
	 * @oa  WIll
	 *
	 */

	switch (__ENVIRONMENT) {
		case 'production':
			error_reporting(0);
			break;
		case 'dev':
			error_reporting(E_ALL);
			break;
	}