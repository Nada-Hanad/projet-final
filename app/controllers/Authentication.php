<?php

/**
 * home class
 */
class Authentication
{
    use Controller;

    public function index()
    {
        $this->view('authentication', array());
    }
}
