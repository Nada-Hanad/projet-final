<?php

/**
 * home class
 */
class Home
{
    use Controller;

    public function index()
    {


        $this->adminView('home', array());
    }
    public function authAdmin()
    {
        $admin = new AdminModel();
        $username = $_POST['username'];
        $mot_de_passe = $_POST['mot_de_passe'];
    }
}
