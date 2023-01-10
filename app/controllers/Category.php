<?php
require_once __DIR__ . '/../models/Recipe.php';

/**
 * home class
 */
class Category
{
    use Controller;

    public function index()
    {
        $this->view('category', array());
    }
}
