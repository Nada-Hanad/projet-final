
<?php


class UserDashboard
{
    use Controller;

    public function index()
    {
        //get id from url
        $URL = $_GET['url'];
        $URL = explode("/", trim($URL, "/"));
        $id = $URL[1];
        //get user
        $userModel = new UserModel;
        $arr = array();
        $arr["id"] = $id;
        $user = $userModel->where($arr);
        $user = $user[0];


        $preferenceModel = new PreferenceUtilisateurModel;
        $arr = array();
        $arr["id_utilisateur"] = $id;

        $preference = $preferenceModel->where($arr);
        $recetteModel = new RecipeModel;
        $recettesPreferes = array();

        if (is_array($preference)) {

            foreach ($preference as  $value) {
                $arr = array();
                $arr["id"] = $value->id_recette;
                $recette = $recetteModel->where($arr);
                array_push($recettesPreferes, $recette[0]);
            }
        }


        $arr = array();
        $arr["creator_id"] = $id;
        $recetteCree = $recetteModel->where($arr);
        $notationModel =  new NotationUtilisateurModel;
        $arr = array();
        $arr["id_utilisateur"] = $id;
        $notation = $notationModel->where($arr);
        //get notations recipes
        if (is_array($notation)) {
            foreach ($notation as $value) {
                $arr = array();
                $arr["id"] = $value->id_recette;
                $recette = $recetteModel->where($arr);
                $value->recette = $recette[0];
            }
        }
        if (!is_array($recettesPreferes)) {
            $recettesPreferes = array();
        }
        if (!is_array($recetteCree)) {
            $recetteCree = array();
        }
        if (!is_array($notation)) {
            $notation = array();
        }


        $this->adminView('userDashboard',  array("recettesPrefere" => $recettesPreferes, "notation" => $notation, "recetteCree" => $recetteCree, "user" => $user));
    }
}
