<?
	/*
		 * Default base controller
		 * @use if there is no base controller created in a subdomain, we use this one
		 * @oa  Will
		 *
		 */

	Abstract Class baseController extends allBaseController
	{

		protected $registry;

		/*
		 * Base constructor
		 * @use what will be in all default defaults
		 * @oa  Will
		 *
		 */
		function __construct($registry)
		{
			parent::__construct($registry);
			$this->registry = $registry;
		}

		/*
		 * 404 Page
		 * @use show 404 headers and a nice page
		 * @oa  Will
		 *
		 */

		public function error404($log_error = FALSE)
		{
			header("HTTP/1.0 404 Not Found");

		}

		/*
		 * 403 Forbidden Page
		 * @use denied access to this page, dey snoopin
		 * @oa  Will
		 *
		 */
		public function error403($log_error = FALSE) {

			header("HTTP/1.0 403 Forbidden");

		}

	}
