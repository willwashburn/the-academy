<?php
	/*
	 * Includes all the config files
	 * @oa	Will
	 *
	 */

	$config_path = __V_PATH . 'app/etc/config/';

	if ($handle = opendir($config_path)) {
		while (FALSE !== ($file = readdir($handle))) {
			if ($file != "." && $file != "..") {
				include $config_path.$file;
			}
		}
	}
	closedir($handle);
