<?php
require_once __DIR__ . '/../models/Recipe.php';


/**
 * home class
 */
class Recipe
{
    use Controller;

    public function index()
    {
        $URL = $_GET['url'];
        $URL = explode("/", trim($URL, "/"));
        $id = $URL[1];
        $model = new RecipeModel();
        $result = $model->getById($id);

        if ($result == null) {
            $this->view('_404', array());
        } else {
            $model = new RecipeModel();
            $result = $model->getRecipeById($id);
            $this->view('Recipe', array("recipe" => $result["recipe"], "ingredients" => $result["ingredients"], "steps" => $result["steps"]));
        }
    }
}
