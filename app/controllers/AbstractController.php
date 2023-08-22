<?php

namespace app\controllers;

use app\core\controllerable;
use app\core\View;

abstract class AbstractController implements controllerable
{
    /**
     * @var View
     * create $view;
     */
	protected View $view;

    /**
     * Set object View into $view;
     */
	public function __construct()
	{
		$this->view = new View();
	}
}