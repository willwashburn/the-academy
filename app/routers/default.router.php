<?php
	/*
	 * Router
	 * @use tells us which controller to load
	 * @oa  Will
	 *
	 * //WBN add namespace to routers
	 *
	 */
	class router extends baseRouter
	{

		function __construct($registry,$router_config)
		{
			parent::__construct($registry,$router_config);
		}
	}