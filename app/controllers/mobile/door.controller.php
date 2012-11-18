<?php
    /*
	 * door Controller
	 * @oa  Will
	 *
	 *
	 */

    namespace mobileSite;

    class doorController extends \baseController
    {
        /*
		 * Landing Page
		 * @author Will
		 */
        public function index()
        {

            $this->template->main_content = 'You need to login first';
            $this->template->show('iphone');

        }

        /*
        * Login
        * @author Will
        *
        */
        public function login()
        {
            $this->template->main_content = 'You are attempting to login';
            $this->template->show('iphone');

        }

        /*
         * Logout
         * @author Will
         *
         */
        public function logout()
        {
            $this->template->main_content = 'you are attemtping to logout';
            $this->template->show('iphone');
        }
    }

    ?>