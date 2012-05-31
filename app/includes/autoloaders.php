<?php

	/*
	 * Register Autoloaders for classes
	 * @use makes class loading easier
	 * @oa	Will
	 *
	 * PHPActive Record is called manually and includes it's own spl_autoload registration
	 *
	 */
	spl_autoload_register('helper_autoload');
	spl_autoload_register('lib_autoload');

	/*
	 * Helpers Class AutoLoad
	 * @use looks for classes in app/helpers/
	 * @oa	Will
	 *
	 * breaks off the namespace using explode function, kind of weaksauce
	 *
	 */
	function helper_autoload($class_name)
	{
		// there has to be a better way but I don't care
		//Blowing things up to provide archaic support for namespaces
		$class_name_array = explode("\\", $class_name);

		if (isset($class_name_array[1])) {
			$class_name = $class_name_array[1];
		} else {
			$class_name = $class_name_array[0];
		}

		$filename = strtolower($class_name) . '.helper.php';
		$file     =__V_PATH.'/app/helpers/' . $filename;

		if (file_exists($file) == false) {
			return false;
		}
		include ($file);

		return TRUE;

	}

	/*
	 * CommonLib AutoLoad
	 * @use makes class loading easier
	 * @oa	Will
	 *
	 */
	function lib_autoload($class_name)
	{
		// there has to be a better way but I don't care
		//Blowing things up to provide arachaic support for namespaces
		$class_name_array = explode("\\", $class_name);

		if (isset($class_name_array[1])) {
			$folder = $class_name_array[0];

			if (!is_dir(__V_PATH.'app/lib/php/'.$folder.'/')) {
				$folder = 'common-library';
			}

			$class_name = $class_name_array[1];

		} else {
			$folder = 'common-library';
			$class_name = $class_name_array[0];
		}

		$filename = strtolower($class_name) . '.class.php';
		$file     = __V_PATH.'app/lib/php/'.$folder.'/' . $filename;

		if (file_exists($file) == false) {
			return false;
		}
		include ($file);

		return TRUE;

	}


