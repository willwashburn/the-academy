<?php

	/*
	 * PHPActiveRecord Init
	 * @use sets up the models path and inits AR
	 * @oa	Will
	 *
	 */

	$logger = new \academy\logger();

	ActiveRecord\Config::initialize(function($cfg) use ($logger)
	{
		$cfg->set_model_directory(__MODELS_PATH);
		$cfg->set_connections(array(
			'development' => 'mysql://' . __DB_USER . ':' . __DB_PW . '@localhost/' . __DB_NAME));

		if (__ENVIRONMENT == 'dev') {
			$cfg->set_logging(true);
			$cfg->set_logger($logger);
		}


	});