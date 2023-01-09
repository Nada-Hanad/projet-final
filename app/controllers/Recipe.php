<?php

/**
 * home class
 */
class Recipe
{
    use Controller;

    public function index()
    {

        $this->view('Recipe');
    }
}
