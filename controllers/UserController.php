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
		$result = '<select id="cities" required><br/><option>Город</option><br/>';
		foreach($cities as $city){
			$result .= '<option>'.$city.'</option><br/>';
		}
		$result .= '</select><br/>';
		echo $result;
	}
	public function actionArea(){
		$city = $_POST['city'];
		$areas = User::getAreas($city);
		$result = '<select id="areas" required><br/><option>район города</option><br/>';
		foreach($areas as $area){
			$result .= '<option>'.$area.'</option><br/>';
		}
		$result .= '</select><br/>';
		echo $result;
	}

	public function register(){
		$name = false;
		$email = false;
		$territory = false;
		// Если форма отправлена
		if (isset($_POST['submit'])) {
			// Получаем данные из формы
			$name = $_POST['name'];
			$email = $_POST['email'];
			$terrytory = $_POST['$terrytory'];
			// errors
			$errors = false;

			// Валидация полей
			if (!User::checkName($name)) {
				$errors[] = 'Имя не должно быть короче 2-х символов';
			}
			if (!User::checkEmail($email)) {
				$errors[] = 'Неправильный email';
			}
			if (!User::checkPassword($territory)) {
				$errors[] = 'Пароль не должен быть короче 6-ти символов';
			}
			if (User::checkEmailExists($email)) {
				$errors[] = 'Такой email уже используется';
			}

			if ($errors == false) {
				// Если ошибок нет
				// Регистрируем пользователя
				$result = User::register($name, $email, $territory);
				require_once(ROOT . '/views/user/register.php');
				return true;
			}

		}
	}
}
