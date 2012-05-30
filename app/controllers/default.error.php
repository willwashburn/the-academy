<?php
	/*
	 * Default Error Controller
	 * @use if there is no error controller, this pops up
	 * @oa  Will
	 *
	 *
	 */

	class defaultErrorController extends \baseController
	{
		/*
		 * Error Page
		 * @oa  Will
		 *
		 */
		public function index()
		{
			$this->error404();
		}
	}

?>