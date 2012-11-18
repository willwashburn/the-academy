<?php

	/*
	 * Dynamic Sheets Controller
	 * @use compiles JS and CSS into one sheet for domain
	 * @oa	Will
	 *
	 */

	namespace academy;

	class dynamic_sheetsController extends \allBaseController
	{

		/*
		 * Default
		 * @use defaults to CSS
		 * @oa	Will
		 */
		public function index()
		{
			$this->error404();
		}

		/*
		   * CSS
		   * @use shows this domains CSS in one sheet
		   * @oa	Will
		   *
		   */
		public function css()
		{
			header("Content-Type: text/css");

			$less = fetch(__APP_PATH . 'views/css/globals.php');
			$less .= fetch_files_in_directory(__APP_PATH . '/views/css/' . __SITE . '/', array('exclude_dirs'=> FALSE));

			$lc     = new \lessphp\lessc();
			$output = $lc->parse($less);

			echo $output;

			exit;
		}

		/*
		 * JS
		 * @use compiles the JS into one shee
		 * @oa	Will
		 */
		public function js()
		{

			Header("content-type: application/x-javascript");
			$this_javascript_path = __APP_PATH . 'javascripts/' . __SITE . '/';
			$unpacked_onload_path = $this_javascript_path . 'unpacked.onLoad.js';
			$packed_onload_path   = $this_javascript_path . 'packed.onLoad.js';

			if (file_exists($this_javascript_path)) {

				include_all_files_in_dir(__V_PATH . 'app/javascripts/'.__SITE.'/', array('packed.onLoad.js', 'unpacked.onLoad.js'));

				if (file_exists($packed_onload_path)) {
					$onLoadScript = file_get_contents($packed_onload_path);
					$p            = new \commonlib\packer($onLoadScript);
					$onLoadScript = $p->pack($onLoadScript);
				} else {
					$onLoadScript = '';
				}

				echo '$(document).ready(function () {';
				if (file_exists($unpacked_onload_path)) {
					include $unpacked_onload_path;
				}
				echo $onLoadScript;

				echo '});';
			}
		}

	}