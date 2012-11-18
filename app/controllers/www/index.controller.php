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

			$this->template->main_content = $this->template->fetch('/info/home.php');
			$this->template->show('public.php');

		}
	}

?>