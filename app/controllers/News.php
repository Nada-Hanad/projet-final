<?php

/**
 * home class
 */
class News
{
    use Controller;

    public function index()
    {

        $this->view('news');
    }
}
