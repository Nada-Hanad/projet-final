<?php


trait Controller
{

	public function view($name, $data)
	{
		$filename = "../app/views/" . $name . ".view.php";
		if (file_exists($filename)) {
			require $filename;
			$className = ucfirst($name) . 'View';
			$view = new $className($data);
			$view->display();
		} else {

			$filename = "../app/views/_404.view.php";
			require $filename;
		}
	}
}
