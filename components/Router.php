<?php

class Router
{
	public function run()
	{
		include_once(ROOT.'/controllers/UserController.php');
		$form = new UserController;

		$result = trim($_SERVER['REQUEST_URI'], '/');
		if(!empty($result)){
			$actionName = 'action'.ucfirst($result);
			$form-> $actionName();
			return true;
		}
		$form-> actionIndex();
		return true;
	}
}
