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
                $file_name = 'latest.log';
                $fh = fopen(__APP_PATH.'etc/log/'.$file_name,'a');
				$string =  $sql . "\n";
                fwrite($fh,$string);
                fclose($fh);
			}
		}
	}