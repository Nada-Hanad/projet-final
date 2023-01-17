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

    public function login()
    {
        $data_array = array(
            "r-errors" => array(),
            "l-errors" => array(),
        );
        if (isset($_POST["login-btn"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];

            if (empty($email) || empty($password)) {
                array_push($data_array["l-errors"], "Veuillez remplir tous les champs");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($data_array["l-errors"], "Veuillez introduire un email valide");
            }

            if (count($data_array["l-errors"]) > 0) {
                $this->view('authentication', $data_array);
                return;
            }
            $model = new UserModel;
            $arr['email'] = $email;
            $result = $model->where($arr);
            if (count($result) > 0) {
                $user = $result[0];
                if ($password === $user->mot_de_passe) {
                    $_SESSION['user'] = $user;
                    header('location: ' . ROOT . '/home');
                } else {
                    array_push($data_array["l-errors"], "Mot de passe incorrect\n");


                    $this->view('authentication', $data_array);
                }
            } else {
                array_push($errors, "Email incorrect");
                $this->view('authentication', $data_array);
            }
        }
    }
    public function signUp()

    {

        $data_array = array(
            "r-errors" => array(),
            "l-errors" => array(),
        );
        if (isset($_POST["register-btn"])) {
            $email = $_POST["email"];
            $nom = $_POST["nom"];
            $password = $_POST["password"];
            if (isset($_POST['sexe']) && $_POST['sexe'] == 'male') {
                $sexe = 'Male';
            } elseif (isset($_POST['sexe']) && $_POST['sexe'] == 'female') {
                $sexe = 'Female';
            }

            $date_de_naissance = $_POST["date_de_naissance"];





            if (empty($email) || empty($password) || empty($sexe) || empty($nom) || empty($date_de_naissance)) {
                array_push($data_array["r-errors"], "Veuillez remplir tous les champs");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($data_array["r-errors"], "Veuillez introduire un email valide");
            }

            if (strtotime($date_de_naissance) < strtotime("-18 years")) {
                array_push($data_array["r-errors"], "Vous devez avoir plus de 18 ans");
            }
            if (count($data_array["r-errors"]) > 0) {
                $this->view('authentication', $data_array);
                return;
            }
            $model = new UserModel;
            //insert new user
            $arr['email'] = $email;
            $arr["mot_de_passe"] = $password;
            $arr["nom"] = $nom;
            $arr["sexe"] = $sexe;
            $arr["date_naissance"] = $date_de_naissance;
            //search for previous email before inserting
            $search_arr['email'] = $email;

            $result = $model->where($search_arr);





            if ((gettype($result) === "boolean")) {
                $result = $model->insert($arr);

                if ($result) {
                    array_push($data_array["r-errors"], "Oops une erreur s'est produite");
                    $this->view('authentication', $data_array);
                } else {
                    $arr['email'] = $email;
                    $result = $model->where($arr);
                    if (count($result) > 0) {
                        $user = $result[0];
                        $_SESSION['user'] = $user;
                        header('location: ' . ROOT . '/home');
                    }
                }
            } else {
                array_push($data_array["r-errors"], "Email existant");
                $this->view('authentication', $data_array);
                return;
            }
        }
    }
    public function logout()
    {
        session_destroy();
        header('location: ' . ROOT . '/home');
    }
}
