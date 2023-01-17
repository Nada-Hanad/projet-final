<?php

/**
 * home class
 */
class Ingredient
{
    use Controller;

    public function index()
    {
        //get ingredient id from url
        $URL = $_GET['url'];
        $URL = explode("/", trim($URL, "/"));
        $id = $URL[1];
        $model = new IngredientModel;
        $data = $model->getById($id);
        //check if data exists
        if ($data == null) {
            $this->view("_404", array());
            return;
        }

        $this->view("ingredient", $data);
    }
}
