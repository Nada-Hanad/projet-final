<?php

/**
 * home class
 */
class Contact
{
    use Controller;

    public function index()
    {
        $this->view("contact", array());
    }
}
