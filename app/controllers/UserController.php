<?php

namespace app\controllers;

use app\core\TemporaryStorage;
use app\models\UserModel;
use app\core\Route;

class UserController extends AbstractController
{
    /**
     * @var UserModel
     */
	private UserModel $model;

    /**
     * @return void
     * Set object UserModel into $model;
     */
	public function __construct()
	{
		parent::__construct();

		$this->model = new UserModel();
	}

    /**
     * @return void
     * Call render with user_sign-in page, user;
     */
	public function index(): void
	{
		$user = TemporaryStorage::check();
		$this->view->render('user_sign-in', ['user' => $user]);
	}

    /**
     * @return void
     * Call render with user_sign-up page, user;
     */
	public function registration(): void
	{
		$user = TemporaryStorage::check();
		$this->view->render('user_sign-up', ['user' => $user]);
	}

    /**
     * @return void
     * Check input data, redirect
     */
    public function auth(): void
    {
		$email = filter_input(INPUT_POST, 'email');
		$password = filter_input(INPUT_POST, 'password');

        $user = $this->model->find($email);

		if($user && password_verify($password,$user['password'])){
			TemporaryStorage::add($user);

			Route::redirect('/index/index');
		}
	    Route::redirect('/user/index');
    }

    /**
     * @return void
     * According to e-mail, check user exists in database, if not create new user
     */
    public function create(): void
    {
        $email = filter_input(INPUT_POST, 'email');
        $user = $this->model->find($email);
        if (!$user) {
        $login = filter_input(INPUT_POST,'login');
            $pass = filter_input(INPUT_POST, 'password');
            $passConf = filter_input(INPUT_POST, 'password_conf');
            if ($pass == $passConf){
                $user['login'] = $login;
                $user['email'] = $email;
                $user['password'] = password_hash($pass,PASSWORD_DEFAULT);
                $this->model->add($user);
            }
        }
        Route::redirect('/index/index');
    }

    /**
     * @return void
     * delete data from session, redirect
     */
	public function exit(): void
	{
		TemporaryStorage::dell();
		Route::redirect('/index/index');
	}
}