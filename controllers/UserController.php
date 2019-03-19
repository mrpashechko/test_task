<?php
include_once ROOT. '/models/User.php';

class UserController {

	public function actionIndex()
	{
		$regions = User::getRegions();
		require_once(ROOT . '/views/user/register.php');
		return true;
	}
	public function actionCity(){
		$region = $_POST['region'];
		$cities = User::getCities($region);
		$result = '<select id="cities" name="city" required><br/><option>Город</option><br/>';
		foreach($cities as $city){
			$result .= '<option>'.$city.'</option><br/>';
		}
		$result .= '</select><br/>';
		echo $result;
	}
	public function actionArea(){
		$city = $_POST['city'];
		$areas = User::getAreas($city);
		$result = '<select id="areas" name="area" required><br/><option>район города</option><br/>';
		foreach($areas as $area){
			$result .= '<option>'.$area.'</option><br/>';
		}
		$result .= '</select><br/>';
		echo $result;
	}

	public function actionRegister(){
		var_dump ($_POST);die;
		$name = false;
		$email = false;
		$territory = false;
		// Если форма отправлена
		if (isset($_POST['submit'])) {
			// Получаем данные из формы
			$name = $_POST['name'];
			$email = $_POST['email'];
			$terrytory = $_POST['region'].' '.$_POST['city'].' '.$_POST['area'];

			$result = User::register($name, $email, $territory);

				require_once(ROOT . '/');
				return true;
			}

		}
	}
