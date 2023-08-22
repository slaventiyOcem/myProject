<?php

namespace app\controllers;

use app\core\Route;
use app\models\BookingModel;
use app\core\TemporaryStorage;

class BookingController extends AbstractController
{
    private BookingModel $model;

    /**
     * @return void
     * Set object BookingModel into $model;
     */
    public function __construct()
    {
        parent::__construct();

        $this->model = new BookingModel();
    }

    /**
     * @return void
     * Accept the date and display the data in the view
     */
    public function index(): void
    {

        $date = filter_input(INPUT_GET,'date');
        if(empty($date)){
            $date = date("Y-m-d");
        }
        $dates = $this->model->find($date);
		$hours = [];
        foreach ($dates as $value){
			$hour = substr($value[0], 11, 2);
			$hours[] = (int)$hour;
        }
	    $user = TemporaryStorage::check();
        $this->view->render('booking_index', [
			'user' => $user,
	        'date' => $date,
	        'hours' => $hours,
            ]);
    }

    /**
     * @return void
     * Get post data, set to model
     */
    public function reserve (): void
    {
		$hours = [];
		$keys = array_keys($_POST);
		foreach ($keys as $key){
			if(is_int($key)){
				$hours[] = $key;
			}
		}

        $reserveDate = filter_input(INPUT_POST, 'date');

        $user = TemporaryStorage::check();

	    foreach ($hours as $reserveTime) {
		    $this->model->add($reserveTime, $reserveDate, $user['id']);
	    }

        $this->view->render('booking_success', [
            'user' => $user,
            'time' => $reserveTime,
            'date' => $reserveDate
        ]);
    }
}