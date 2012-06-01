<?php

	/*
	 * Dynamic Sheets Controller
	 * @use compiles JS and CSS into one sheet for domain
	 * @oa	Will
	 *
	 */

	namespace academy;

	class dynamic_sheetsController
	{

		/*
		 * Default
		 * @use defaults to CSS
		 * @oa	Will
		 */
		public function index()
		{
			$this->css();
		}

		/*
		   * CSS
		   * @shows this domains CSS in one sheet
		   * @oa	Will
		   *
		   */
		public function css()
		{
			header("Content-Type: text/css");

			$less = fetch(__APP_PATH.'views/css/globals.php');
			$less .= fetch_files_in_directory(__APP_PATH.'/views/css/'.__SITE.'/',array('exclude_dirs'=>FALSE));

			$lc = new \lessphp\lessc();
			$output = $lc->parse($less);

			echo $output;

			exit;
		}

	}