<?php


class Nutrition
{
    use Controller;

    public function index()
    {


        $model = new IngredientModel();
        $ing = $model->findAll();
        $this->adminView('nutrition', $ing);
    }
    public function add()
    {

        $this->adminView('addIngredient', array());
    }
    public function edit()
    {
        $URL = $_GET['url'];
        $URL = explode("/", trim($URL, "/"));
        $id = $URL[2];
        $model = new IngredientModel();
        $result = $model->getById($id);

        if ($result == null) {
            $this->view('_404', array());
        } else {


            $this->adminView('editIngredient', $result);
        }
    }
    public function delete()
    {
        $id = $_POST["id"];
        $model = new IngredientModel();
        //delete from RecetteINgredeint
        $model2 = new RecetteIngredientModel();
        $data["id_ingredient"] = $id;
        $result = $model2->where($data);
        foreach ($result as  $value) {
            $model2->delete($value->id);
        }

        $model->delete($id);

        header("Location: /Projet_Final/admin/nutrition");
    }
    public function visualize()
    {

        $URL = $_GET['url'];
        $URL = explode("/", trim($URL, "/"));
        $id = $URL[2];



        $model = new IngredientModel();
        $result = $model->getById($id);

        if ($result == null) {
            $this->view('_404', array());
        } else {
            $this->adminView('visualizeIngredient', $result);
        }
    }
    public function addIngredient()
    {
        $isError = 0;

        $model = new IngredientModel();


        $target_dir = dirname(__FILE__, 4) . '/storage/uploads/';
        $fileName = uniqid() . basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $fileName;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }



        // Check file size


        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "webp"
            && $imageFileType != "gif"
        ) {
            echo "Seulement JPG, JPEG, PNG & GIF sont autorisés.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Un probleme s'est produit.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $_POST["image"] =  PROJECT_ROOT . "/storage/uploads/" . $fileName;
            } else {
                $isError = 1;
                echo "Un problème s'est produit lors du téléchargement de l'image.";
            }
        }


        if ($isError == 0) {

            $model->insert($_POST);

            header("Location: /Projet_Final/admin/nutrition");
        }
    }
    public function editIngredient()
    {
        $isError = 0;

        $model = new IngredientModel();





        $target_dir = dirname(__FILE__, 4) . '/storage/uploads/';
        $fileName = uniqid() . basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $fileName;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }





        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "webp"
            && $imageFileType != "gif"
        ) {
            echo "Seulement JPG, JPEG, PNG & GIF sont autorisés.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Un probleme s'est produit.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $_POST["image"] =  PROJECT_ROOT . "/storage/uploads/" . $fileName;
            } else {
                $isError = 1;
                echo "Un problème s'est produit lors du téléchargement de l'image.";
            }
        }




        if ($isError == 0) {
            print_r($_POST);


            $model->update($_POST["id"], $_POST);

            header("Location: /Projet_Final/admin/nutrition");
        }
    }
}
