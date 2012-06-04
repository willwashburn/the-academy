<?php
	/*
	 * Index Controller
	 * @use home page
	 * @oa  Will
	 *
	 * Created on: 4/17/12 @ 9:01 PM
	 *
	 */

	namespace mobileSite;

	class indexController extends \baseController
	{
		/*
		 * Landing Page
		 * @oa  Will
		 * //TD create mobile template and frame
		 */
		public function index()
		{

			$this->template->main_content = $this->template->fetch('/info/home');
			$this->template->show('public');

		}
	}

?>