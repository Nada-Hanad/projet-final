<?php

/**
 * home class
 */
class Category
{
    use Controller;

    public function index()
    {

        $model = new RecipeModel();
        $URL = $_GET['url'];
        $URL = explode("/", trim($URL, "/"));
        $arr['categorie'] = strtolower($URL[1]);
        $data  = $model->getRecipesByCategory(strtolower($URL[1]));
        if (is_array($data)) {
            if (count($data) > 0) {
                $this->view('category', array_merge($data, $data, $data, $data, $data, $data, $data, $data, $data, $data));
            }
        } else {

            $this->view('category', array());
        }
    }
}
