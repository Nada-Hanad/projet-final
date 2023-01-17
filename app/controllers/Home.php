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

		$this->view('home', $recipes);
	}
}
