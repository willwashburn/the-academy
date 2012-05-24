<?php
	/*
	 * Define database, resource paths
	 * @use depending on environment, define em
	 * @oa  Will
	 *
	 */

	switch (__ENVIRONMENT) {
		case 'production':

			$database = $databases['production'];
			$resources_path = $resources_paths['production'];
			break;
		case 'dev':
			$database = $databases['dev'];
			$resources_path = $resources_paths[__DOMAIN_PREFIX];
			break;
	}

	//WBN add a sanity isset check

	define('__RESOURCES_PATH', $resources_path);

	define('__DB_USER', $db_username);
	define('__DB_PW', $db_password);
	define('__DB_NAME', $database);