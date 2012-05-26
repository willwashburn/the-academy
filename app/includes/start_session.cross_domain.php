<?php
	/*
	 * Cross Browser Cookie set and session start
	 * @use starts a cross browser session
	 * @oa Will
	 *
	 */

	//cross domain session
	session_set_cookie_params(0, '/', '.' . __BASE_DOMAIN);

	/// start a session
	session_start();