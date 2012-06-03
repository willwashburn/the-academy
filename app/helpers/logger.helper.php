<?php

	/*
	 * Primitive Logging for AR SQL statements
	 * @use to debug
	 * @oa	Will
	 *
	 */

	namespace academy;

    class logger
	{

		public function log($sql)
		{
			if (isset($_GET['sql_logger'])) {
				echo $sql . "<br />";
			}
		}
	}