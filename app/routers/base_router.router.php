<?php
	/*
	 * Router
	 * @use tells us which controller to load
	 * @oa  Will
	 *
	 */
	class baseRouter
	{
		protected $registry, $path;
		public $file, $controller, $action;

		/*
		 * Constructor
		 * @use gets URI instance adds to registrty
		 * @oa	Will
		 *
		 */
		function __construct($registry,$config)
		{
			$this->registry      = $registry;
			$this->registry->uri = \commonlib\uri::get_instance();



		}

		/*
		 * Set Controller Path
		 * @use controller directory path
		 * @oa      SevinKevins
		 * @edited  Will
		 *
		 */
		function set_path($path)
		{
			if (is_dir($path) == FALSE) {
				throw new Exception ('Invalid controller path: `' . $path . '`');
			}
			$this->path = $path;
		}

		/*
		 * Load the Controller
		 * @use loads whatever controller we are supposed to load
		 * @oa  Will
		 *
		 */
		public function loader()
		{
			$this->get_controller();

			if (is_readable($this->file) == FALSE) {
				$this->file       = $this->path . '/error.controller.php';
				$this->controller = 'error';
			}

			include $this->file;

			$this->registry->controller = $this->controller;
			$this->registry->action     = $this->action;

			$class      = $this->controller . 'Controller';
			$controller = new $class($this->registry);

			/*** check if the action is callable ***/
			if (is_callable(array($controller, $this->action)) == FALSE) {
				$action = 'index';
			}
			else {
				$action = $this->action;
			}

			/*** run the action ***/
			$controller->$action();
		}

		/*
		 * Get Controller
		 * @use figure out the controller/action via the URI
		 * @oa      SevinKevins
		 * @edited  Will
		 *
		 */
		private function get_controller()
		{

			if ($this->registry->uri->fragment(1)) {
				$this->controller = $this->registry->uri->fragment(1);

			}
			if ($this->registry->uri->fragment(2)) {
				$this->action = $this->registry->uri->fragment(2);
			}

			if (empty($this->controller)) {
				$this->controller = 'index';
			}

			if (empty($this->action)) {
				$this->action = 'index';
			}

			$this->file = $this->path . '/' . $this->controller . '.controller.php';

		}
	}