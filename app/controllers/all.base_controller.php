<?
	/*
		 * Default base controller
		 * @use the base controller for all the subdomain base controllers
		 * @oa  Will
		 *
		 */

	Abstract Class allBaseController
	{

		protected $registry, $template;

		/*
		 * Base constructor
		 * @use what will be in all controllers
		 * @oa  Will
		 *
		 */
		function __construct($registry)
		{
			$this->registry = $registry;
			$this->template = new template($registry,__THIS_VIEW_PATH.'/html/templates/',__THIS_VIEW_PATH.'/html/');
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


		/*
		 * Index function
		 * @use all controllers MUST have an index funciton
		 *
		 */
		abstract function index();

	}