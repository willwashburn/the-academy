<?php
	/*
	 * Router
	 * @use tells us which controller to load
	 * @oa  Will
	 *
	 */
	class router extends baseRouter
	{

		function __construct($registry,$router_config)
		{
			parent::__construct($registry,$router_config);
		}
	}