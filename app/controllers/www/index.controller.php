<?php
	/*
	 * Index Controller
	 * @use home page
	 * @oa  Will
	 *
	 * Created on: 4/17/12 @ 9:01 PM
	 *
	 */

	namespace wwwSite;

	class indexController extends \baseController
	{
		/*
		 * Landing Page
		 * @oa  Will
		 *
		 */
		public function index()
		{
			$t             = $this->registry->template;

			$t->main_content = $t->fetch('/info/home');

			$this->registry->template->show('public');

		}
	}

?>