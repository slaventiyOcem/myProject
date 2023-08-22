<?php

namespace app\core;

class TemporaryStorage
{
    /**
     * @return void
     * adds new user to session
     */
	static public function add($user): void
	{
		session_start();
		$_SESSION['user'] = $user;
	}

    /**
     * @return void
     * deletes session
     */

	static public function dell(): void
	{
		session_start();
		session_destroy();
	}

    /**
     * @return array|bool
     * checks for a user in session
     */

	static public function check()
	{
		session_start();
		if (isset($_SESSION['user'])){
			return $_SESSION['user'];
		}

		return false;
	}
}