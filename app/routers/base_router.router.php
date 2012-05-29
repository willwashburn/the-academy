<?php
	/*
		 * Router
		 * @use tells us which controller to load
		 * @oa  Will
		 *
		 */
	class baseRouter
	{
		protected  $registry, $path;
		public $file, $controller, $action;

		function __construct($registry)
		{
			$this->registry      = $registry;
			$this->registry->uri = \commonlib\uri::getInstance();
		}

		/*
				 * Set Controller Path
				 * @use controller directory path
				 * @oa      SevinKevins
				 * @edited  Will
				 *
				 */
		function setPath($path)
		{
			if (is_dir($path) == false) {
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
			$this->getController();

			if (is_readable($this->file) == false) {
				$this->file       = $this->path . '/error.controller.php';
				$this->controller = 'error';
			}

			include $this->file;

			$this->registry->controller = $this->controller;
			$this->registry->action     = $this->action;

			$class                      = $this->controller . 'Controller';
			$controller = new $class($this->registry);

			/*** check if the action is callable ***/
			if (is_callable(array($controller, $this->action)) == false) {
				$action = 'index';
			}
			else
			{
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
		private function getController()
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

			$this->registry->javascript_document_name = $this->controller . '.' . $this->action;

			$this->file = $this->path . '/' . $this->controller . '.controller.php';

		}
	}