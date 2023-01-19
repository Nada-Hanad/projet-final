<?php
require_once  __DIR__ . "/../../models/admin/adminModel.php";

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
        $arr["username"] = $username;
        $arr["mot_de_passe"] = $mot_de_passe;
        $result =  $admin->where($arr);
        if ($result) {
            $_SESSION['admin'] = $result[0];
            header('Location: http://localhost/Projet_Final/admin/recipes');
        } else {
            $this->adminView('home', array("error" => "Invalide"));
        }
    }
    public function logout()
    {

        session_destroy();
        header('Location: http://localhost/Projet_Final/admin/home');
    }
}
