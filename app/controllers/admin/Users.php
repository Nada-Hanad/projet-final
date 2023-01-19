<?php


class Users
{
    use Controller;

    public function index()
    {


        $model = new UserModel();
        $users = $model->findAll();
        if (!is_array($users)) {
            $users = array();
        }
        $this->adminView('users', $users);
    }

    public function delete()
    {
        $id = $_POST["id"];
        $model = new UserModel();
        //delete user preferences
        $preferenceModel = new PreferenceUtilisateurModel();
        $arr = array();
        $arr["id_utilisateur"] = $id;
        $preference = $preferenceModel->where($arr);
        if (is_array($preference)) {
            foreach ($preference as $value) {
                $preferenceModel->delete($value->id);
            }
        }


        $model->delete($id);

        header("Location: /Projet_Final/admin/users");
    }
    public function validate()
    {
        $id = $_POST["id"];
        $arr['id'] = $id;
        $model = new UserModel();
        $result  = $model->where($arr)[0];
        print_r($result);
        $data["approved"] = 1;
        $model->update($id, $data);



        header("Location: /Projet_Final/admin/users");
    }
}
