<?php
    /*
      * Router
      * @use tells us which controller to load
      * @oa  Will
      *
      */
    class baseRouter
    {
        protected $registry, $path, $use_namespace;
        public $file, $controller, $action;

        /*
           * Constructor
           * @use gets URI instance adds to registrty
           * @oa	Will
           *
           */
        function __construct($registry, $config)
        {
            $this->registry      = $registry;
            $this->registry->uri = \commonlib\uri::get_instance();
            $this->use_namespace = TRUE;


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

            if (!is_readable($this->file)) {
                $this->file = $this->path . '/error.controller.php';

                if (!is_readable($this->file)) {
                    $this->file          = __APP_PATH . 'controllers/error.controller.php';
                    $this->use_namespace = FALSE;
                }

                $this->controller = 'error';
            }

            include $this->file;

            $this->registry->controller = $this->controller;
            $this->registry->action     = $this->action;

            if ($this->use_namespace) {
                $namespace = __SITE . 'SITE';
            } else {
                $namespace = 'academy';
            }

            $class      = $namespace . '\\' . $this->controller . 'Controller';
            $controller = new $class($this->registry);

            /*** check if the action is callable ***/
            if (is_callable(array($controller, $this->action)) == FALSE) {
                $action = 'index';
            } else {
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
        protected function get_controller()
        {

            if ($this->registry->uri->fragment(1) === __DYNAMIC_EXTERNAL_URL) {

                $this->controller    = 'dynamic_sheets';
                $this->file          = __APP_PATH . 'controllers/external_sheet.controller.php';
                $this->use_namespace = FALSE;

            } else {
                if (__ENABLE_PASSWORD_PROTECT && !\academy\auth::logged_in()) {
                    //login controller
                    $this->controller = \academy\auth::auth_controller();
                } else {
                    if ($this->registry->uri->fragment(1)) {
                        $this->controller = $this->registry->uri->fragment(1);
                    }

                    if (empty($this->controller)) {
                        $this->controller = 'index';
                    }


                }

                $this->file = $this->path . '/' . $this->controller . '.controller.php';
            }

            if ($this->registry->uri->fragment(2) ) {
                $this->action = $this->registry->uri->fragment(2);
            }

            if (empty($this->action)) {
                $this->action = 'index';
            }
        }
    }
