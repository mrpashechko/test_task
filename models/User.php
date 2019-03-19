<?php


class User
{

	public static function getRegions(){
		$db = Db::getConnection();
		$result = $db->query(
			'SELECT ter_name FROM t_koatuu_tree WHERE ter_type_id = "0" AND ter_name NOT like "м.%"'
		);
		$i = 0;
		$regions = array();
		while ($row = $result->fetch()){
			$regions[$i] = $row['ter_name'];
			$i++;
		}
		// echo '<pre>';
		// print_r($regions);
		// echo '</pre>';die;
		return $regions;
	}
	public static function getCities($region){
		$db = Db::getConnection();
		$result = $db->query(
			'SELECT ter_name FROM t_koatuu_tree WHERE ter_address like "%'.$region.'" AND ter_name like "м.%"'
		);
		$i = 0;
		$cities = array();
		while ($row = $result->fetch()){
			$cities[$i] = $row['ter_name'];
			$i++;
		}
		// echo '<pre>';
		// print_r($cities);
		// echo '</pre>';die;
		 return $cities;
	}

	public static function getAreas($city){
		$db = Db::getConnection();
		$result = $db->query(
			'SELECT ter_name FROM t_koatuu_tree WHERE ter_address like "%'.$city.'%" AND ter_name NOT like "%'.$city.'%"'
		);
		$i = 0;
		$areas = array();
		while ($row = $result->fetch()){
			$areas[$i] = $row['ter_name'];
			$i++;
		}
		return $areas;

	}
	public static function checkEmailExists($email)
	    {
	        // Соединение с БД
	        $db = Db::getConnection();

	        // Текст запроса к БД
	        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

	        // Получение результатов. Используется подготовленный запрос
	        $result = $db->prepare($sql);
	        $result->bindParam(':email', $email, PDO::PARAM_STR);
	        $result->execute();

	        if ($result->fetchColumn())
	            return true;
	        return false;
	    }
	public static function register($name, $email)
	{
		$id = intval($id);

		if ($id) {

			$db = Db::getConnection();
			$db->query('SELECT * FROM users WHERE email ='.$email);
			$stmt = $db->query('SELECT * FROM table');
			

			var_dump($result->fetch());die;

			return true;
		}

	}

}
