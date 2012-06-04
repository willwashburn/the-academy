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
			$this->template = new \commonlib\template($registry, __APP_PATH . '/views/html/templates/', __THIS_VIEW_PATH);

			$this->template->page_title   = '';
			$this->template->html_class   = '';
			$this->template->main_content = 'There is nothing to show!';

			if ($this->registry->controller == $this->registry->action) {
				$this->template->controller_action = $this->registry->controller;
			} else {
				$this->template->controller_action = $this->registry->controller . ' ' . $this->registry->action;
			}


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
			echo '404: Page Not Found';

		}

		/*
		 * 403 Forbidden Page
		 * @use denied access to this page, dey snoopin
		 * @oa  Will
		 *
		 */
		public function error403($log_error = FALSE)
		{

			header("HTTP/1.0 403 Forbidden");
			echo 'you are not allowed to see this page. 403 error';

		}


		/*
		 * Index function
		 * @use all controllers MUST have an index funciton
		 *
		 */
		abstract function index();

	}