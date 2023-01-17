<?php

/**
 * home class
 */
class Nutrition
{
    use Controller;

    public function index()
    {
        $model = new IngredientModel;
        $data = $model->findAll();

        $this->view('Nutrition',  $data);
    }
}
