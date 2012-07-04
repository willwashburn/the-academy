<?php

    /*
    * Authentication / Sessions
    * @use logins / logouts and all that jazz
    * @oa  Will
    *
    * //WWBN better security / less cross domain stuff / rethink this process
    * //WWBN Add something for CRSF
    *
    */

    namespace academy;


    class auth
    {

        /*
         * Returns which controller the router should direct to when not logged in
         * @author  Will
         *
         */
        public static function auth_controller()
        {
            return 'door';
        }

        /*
        * Login
        * @use create as session
        * @oa  Will
        *
        * //WPTD update cache for member
        *
        */
        public static function login($email, $password = FALSE, $auto_password_hash = FALSE, $pre_validated = FALSE, $redirect_url = __MEMBER_DOMAIN)
        {
            ///Lets log them out first, so we have a clean state
            self::logout();

            //Restart the session
            session_start();

            ///Let's go under the assumption they LIED
            $valid = FALSE;

            //Let's also assume they are logging in in a normal way, not like a boss or anything weird
            $log_in_message = 'Logged into the site';

            if ($pre_validated) {
                //well ok, unless we are saying they're cool
                $validated_member = $pre_validated;
                $valid            = TRUE;
            } else {
                ///But if not, dude let's check if they are in the club yo
                if ($password) {
                    $member = \Member::find_by_email_and_password($email, $password);
                } elseif ($auto_password_hash) {
                    $member         = \Member::find_by_email_and_confirm_code($email, $auto_password_hash);
                    $log_in_message = 'Logged in to the site via email';
                }

                if ($member) {

                    $valid            = TRUE;
                    $validated_member = $member;

                } else {
                    ///It was a wrong login - password/name combo
                    header('location:/login/denied/?email=' . $email);
                    exit;
                }
            }

            if ($valid) {

                ///regenerate the session id to protect against session steals
                session_regenerate_id();

                //Update FB/Twitter Cache
                $validated_member->update_cache();

                ///set the session vars
                ///We only use the id here and look it up in the base controller because it breaks
                $_SESSION['authorized'] = $validated_member->id;
                ///log the activity
                $validated_member->log_activity($log_in_message, 'login');

                //redirect to the url
                header('location:http://' . $redirect_url);

                exit;

            } else {
                echo 'That does not make sense. That link is wrong pal. Try again.';
                report::error('There was an error redirecting people after login. Sorry to ruin your night', TRUE);
                //Log in was invalid
                return FALSE;
            }


        }

        /*
        * Check if logged in
        * @use checks for a auth session
        * @oa  Will
        *
        * @returns true / false
        *
        */
        public static function logged_in()
        {
            if (isset($_SESSION['authorized'])) {
                return TRUE;
            } else {
                return FALSE;
            }

        }

        /*
        * Logout
        * @use kill sessions / cookies
        * @oa  Will
        *
        *
        */
        public static function logout()
        {

            ///Go through the cookies, set them to have expired
            if (isset($_SERVER['HTTP_COOKIE'])) {
                $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
                foreach ($cookies as $cookie) {
                    $parts = explode('=', $cookie);
                    $name  = trim($parts[0]);
                    setcookie($name, '', time() - 1000);
                    setcookie($name, '', time() - 1000, '/');
                }
            }

            /// unset the session
            session_unset();

            ///Kill the session
            session_destroy();

            ///Just to be safe, set it to an empty array
            $_SESSION = array();

            return TRUE;
        }

        /*
        * Twitter Auth Link
        * @use created the twitter
        * @oa  Will
        *
        * returns link
        *
        */
        public static function twitter_link($twitter_object, $process_page = '/login/process/twitter/')
        {
            return $twitter_object->getAuthenticateUrl(NULL, array('oauth_callback' => 'http://' . __PUBLIC_DOMAIN . $process_page)
            );
        }

        /*
        * Facebook Auth Link
        * @use create the Facebook link
        * @oa  will
        *
        * returns link
        *
        */
        public static function facebook_link($facebook_object, $process_page = '/login/process/facebook/', $scope = __FB_SCOPE)
        {
            return $facebook_object->getLoginUrl(
                array('redirect_uri' => 'http://' . __PUBLIC_DOMAIN . $process_page,
                      'scope'        => $scope
                )
            );
        }

        /*
        * Process Twitter
        * @use Do the handshake / dance
        * @oa  Will
        *
        * @returns redirect OR member_object
        *
        */
        public static function twitter_process($twitter_object, $accept_redirect = FALSE, $deny_redirect = '/join/denied/twitter/')
        {

            ///Defaults
            $twitter                  = $twitter_object;
            $log_activity_for_joining = FALSE;

            ///Did they deny us?
            if (isset($_GET['denied'])) {

                header('location:' . $deny_redirect);
                exit;

            } else {

                //Do some handshaking & dancing
                $twitter->setToken($_GET['oauth_token']);
                $token = $twitter->getAccessToken();
                $twitter->setToken($token->oauth_token, $token->oauth_token_secret);

                $user = $twitter->get_accountVerify_credentials();

                $member = \Member::find_by_tw_id($user->id_str);

                if (!$member) {
                    //Make a new member if there isn't one
                    $member        = new \Member;
                    $member->tw_id = $user->id_str;

                    ///We don't have a member yet, so set a flag to enter in a log
                    $log_activity_for_joining = TRUE;

                }

                $member->tw_oauth_token  = $token->oauth_token;
                $member->tw_oauth_secret = $token->oauth_token_secret;
                $member->tw_screen_name  = $user->screen_name;
                $member->status          = 'active';
                $member->save();

                //Are they new or just retarded and rejoining
                if ($log_activity_for_joining) {

                    $member->log_activity('Joined Social Blendr via Twitter', 'join-twitter');

                }

            }

            $member->update_twitter_cache();

            if ($accept_redirect) {
                ///By passing the member id we are basically saying this person has been pre validated and we shouldn't check... just add the hash and redirect
                auth::login('no email provided', FALSE, FALSE, $member);
                exit;
            } else {
                return $member;
            }
        }

        /*
        * Facebook shake
        * @use do the facebook thanngg
        * @oa  Will
        *
        *
        * returns member object or REDIRECT
        *
        */
        public static function facebook_process($facebook_object, $accept_redirect = FALSE, $deny_redirect = '/login/denied/facebook/')
        {
            $f                        = $facebook_object;
            $log_activity_for_joining = FALSE;

            //See if there is a facebook user
            $user_id = $f->getUser();

            /*
            * If this isn't a good way to do it, look into
            * if (array_key_exists('installed', $permissions))
            */
            if ($user_id == 0) {
                header('location:' . $deny_redirect);
                exit;
            } else {

                $member = \Member::find_by_fb_uid($user_id);

                if (!$member) {
                    //Make a new member if there isn't one
                    $member         = new \Member;
                    $member->fb_uid = $user_id;

                    ///We don't have a member yet, so set a flag to enter in a log
                    $log_activity_for_joining = TRUE;

                }

                $member->fb_access_token = $f->getAccessToken();
                $member->status          = 'active';
                $member->save();

                //Are they new or just retarded and rejoining
                if ($log_activity_for_joining) {

                    $member->log_activity('Joined Social Blendr via Facebook', 'facebook-join');

                }

                $member->update_facebook_cache();


                if ($accept_redirect) {
                    ///By passing the member id we are basically saying this person has been pre validated and we shouldn't check... just add the hash and redirect
                    auth::login('no email provided', FALSE, FALSE, $member);
                    exit;
                } else {
                    return $member;
                }
            }
        }

    }