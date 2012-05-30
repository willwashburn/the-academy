<?
	/*
		 * Default base controller
		 * @use if there is no base controller created in a subdomain, we use this one
		 * @oa  Will
		 *
		 */

	Abstract Class baseController extends allBaseController
	{

		protected $registry;

		/*
		 * Base constructor
		 * @use what will be in all default defaults
		 * @oa  Will
		 *
		 */
		function __construct($registry)
		{
			parent::__construct($registry);
			$this->registry = $registry;
		}

	}
