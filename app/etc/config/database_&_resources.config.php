<?php

	/*
	 * Config for DB & resources
	 * @author Will
	 *
	 * Setting up staging and production (and even dev!) environments
	 * If you don't have your dev setup locally, this is a backassward way to do it!
	 * //WBN not make this so blatantly noobish
	 *
	 */

	$db_username = 'user';
	$db_password = 'pw';

	$databases = array(
		'production'=> 'x_production',
		'dev'       => 'x_dev'
	);

