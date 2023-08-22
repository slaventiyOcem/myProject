<?php

namespace app\core;

class Route
{
    /**
     * @return void
     * builds the correct path in the url
     */
	static public function init(): void
	{
		$controllerName = 'index';
		$actionName = 'index';

		$urlPart = substr($_SERVER['REQUEST_URI'], 1);
		$urlComponents = explode('/',$urlPart);

		if (count($urlComponents) > 3) {
			$urlComponents = array_slice($urlComponents, 0, 2);
			$redirectUrl = '/' . implode('/', $urlComponents);
			self::redirect($redirectUrl);
		}

		if(!empty($urlComponents[0])){
			$controllerName = strtolower($urlComponents[0]);
		}

		if(!empty($urlComponents[1])){
			$actionName = strtolower($urlComponents[1]);
		}

		$controllerClass = '\app\controllers\\' . ucfirst($controllerName) . 'Controller';

		if(!class_exists($controllerClass)){
			self::notFound();
		}

		$controller = new $controllerClass();

		if(!method_exists($controller, $actionName)){
			self::notFound();
		}

		self::call($controller, $actionName);
	}

    /**
     * @param $url
     * @return void
     * forwarding to the specified address
     */
	static public function redirect($url): void
	{
		header('Location: ' . $url);
		exit();
	}

    /**
     * @return void
     * page status
     */
	static public function notFound(): void
	{
		http_response_code(404);
		exit();
	}

    /**
     * @param controllerable $controller
     * @param $action
     * @return void
     * call method $action in $controller;
     */
	static private function call(controllerable $controller, $action): void
	{
		$controller->$action();
	}

}