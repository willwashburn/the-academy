<?php
	/*
		 * Version definitions
		 * @oa  Will
		 *
		 */


	$application_version = $version['major'] . '.' . $version['minor'] . '.' . $version['database'] . '.' . $version['wdev'] . '.' . $version['kdev'];

	define ('__APPLICATION_VERSION', $application_version);
	define('__REQUIRED_RESOURCES_LEVEL', $resources_version);