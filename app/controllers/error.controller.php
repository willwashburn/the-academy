<?php
	/*
	 * Error Controller
	 * @use	if the site has no error controller, this is used instead
	 * @oa	Will
	 *
	 * Frankly, there is no reason this shouldn't NOT be used. But allowing the capability regardless
	 *
	 */

	namespace academy;

	class errorController extends \baseController
	{
		/*
	   * Index
	   * @oa	Will
	   *
	   */
		public function index()
		{
			$this->error404();
		}
	}