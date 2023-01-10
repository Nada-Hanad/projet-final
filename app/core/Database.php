<?php

trait Database
{

	private function connect()
	{
		try {
			$string = "mysql:hostname=" . DBHOST . ";dbname=" . DBNAME;
			$con = new PDO($string, DBUSER, DBPASS);
		} catch (PDOException $e) {
			echo 'Échec de la connexion : ' . $e->getMessage();
			$con = null;
		}

		return $con;
	}

	public function query($query, $data = [])
	{

		$con = $this->connect();
		$stm = $con->prepare($query);

		$check = $stm->execute($data);
		if ($check) {
			$result = $stm->fetchAll(PDO::FETCH_OBJ);
			if (is_array($result) && count($result)) {
				return $result;
			}
		}

		return false;
	}

	public function get_row($query, $data = [])
	{

		$con = $this->connect();
		$stm = $con->prepare($query);

		$check = $stm->execute($data);
		if ($check) {
			$result = $stm->fetchAll(PDO::FETCH_OBJ);
			if (is_array($result) && count($result)) {
				return $result[0];
			}
		}

		return false;
	}
}
