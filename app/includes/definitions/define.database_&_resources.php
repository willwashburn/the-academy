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
			break;
		case 'dev':
			$database = $databases['dev'];
			break;
	}

	//WBN add a sanity isset check

	define('__DB_USER', $db_username);
	define('__DB_PW', $db_password);
	define('__DB_NAME', $database);