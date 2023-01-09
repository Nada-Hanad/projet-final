<?php

/**
 * home class
 */
class Category
{
    use Controller;

    public function index()
    {
        $this->view('category');
    }
}
