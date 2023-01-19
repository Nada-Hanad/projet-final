<?php
require_once __DIR__ . '/../models/RecipeModel.php';

/**
 * home class
 */
class Home
{
	use Controller;

	public function index()
	{
		$recipeModel = new RecipeModel();
		$recipes = $recipeModel->findAll();
		$diaporamaModel =
			new DiaporamaModel();
		$diaporama = $diaporamaModel->findAll();
		if (!is_array($recipes)) {
			$recipes = array();
		}
		if (!is_array($diaporama)) {
			$diaporama = array();
		} else {

			foreach ($diaporama as $key => $value) {
				$url =  $value->url;


				if (preg_match('/recipe/', $url)) {
					$recipeModel = new RecipeModel();
				} else {
					$recipeModel = new NewsModel();
				}
				$URL = explode("/", trim($url, "/"));
				$id = $URL[count($URL) - 1];

				$recipe = $recipeModel->getById($id);
				$value->article = $recipe;
				$diaporama[$key] = $value;
			}
		}
		$this->view('home', array("recipes" => $recipes, "diaporama" => $diaporama));
	}
}
