
<?php


class UserEdit
{
    use Controller;

    public function index()
    {

        $this->view('userEdit',  array());
    }
    public function editUser()
    {
        $data_array = array(
            "errors" => array(),
        );
        if (isset($_POST["modify-btn"])) {
            $nom = $_POST["nom"];
            $email = $_POST["email"];
            $date_naissance = $_POST["date_de_naissance"];
            $mot_de_passe = $_POST["password"];
            if (empty($nom) || empty($email) || empty($date_naissance) || empty($mot_de_passe)) {
                array_push($data_array["errors"], "Veuillez remplir tous les champs");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($data_array["errors"], "Veuillez introduire un email valide");
            }

            if (count($data_array["errors"]) > 0) {
                $this->view('userEdit', $data_array);
                return;
            }

            $model = new UserModel;
            $user['nom'] = $nom;
            $user['email'] = $email;
            $user['date_naissance'] = $date_naissance;
            $user['mot_de_passe'] = $mot_de_passe;
            $model->update($_SESSION['user']->id, $user);
            //update session
            $arr['email'] = $email;
            $result = $model->where($arr);
            if (count($result) > 0) {
                $user = $result[0];
                $_SESSION['user'] = $user;
                header('location: ' . ROOT . '/userDashboard');
            }
        }
    }
    public function addToPreferences()
    {

        $user = $_SESSION['user'];
        $model = new UserModel;


        $model->addToPreferences($user->id, $_POST['recetteId']);
    }
    public function removeFromPreferences()
    {

        $user = $_SESSION['user'];
        $model = new UserModel;
        $model->removeFromPreferences($user->id, $_POST['recetteId']);
    }
    public function isLikedByUser()
    {


        $model = new UserModel();
        $result = $model->isLikedByUser($_POST['recetteId'], $_SESSION['user']->id);

        if ($result) {

            $result = json_encode($result);
        } else {
            $result = json_encode($result);
        }
        echo $result;
    }
    public function rateRecipe()

    {
        $model = new UserModel();
        $model->rateRecipe($_POST['recetteId'], $_SESSION['user']->id, $_POST['note']);
    }
    public function isLoggedIn()
    {
        if (isset($_SESSION['user'])) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }
}
