<?php


class CreerRecette
{
    use Controller;


    public function index()
    {
        $model = new IngredientModel();
        $ingredients = $model->findAll();
        $this->view('addRecipe', array("ingredients" => $ingredients));
    }



    public function addRecipe()
    {
        $isError = 0;

        $model = new RecipeModel();
        $_POST["etat"] = "pending";
        $_POST["creator_id"] = $_SESSION["user"]->id;
        //check if healthy checkbox is checked
        if (isset($_POST["healthy"]) && $_POST["healthy"] == "on
        ") {
            $_POST["healthy"] = 1;
        } else {
            $_POST["healthy"] = 0;
        }

        $target_dir = dirname(__FILE__, 3) . '/storage/uploads/';
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
        if ($_FILES["image"]["size"] > 500000) {
            echo "Le ficher est très grand";
            $uploadOk = 0;
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
        //video
        $target_dir = dirname(__FILE__, 4) . '/storage/uploads/';
        $fileName = uniqid() . basename($_FILES["video"]["name"]);
        $target_file = $target_dir . $fileName;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual video or fake video
        if (isset($_POST["video"])) {

            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["video"]["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                }
            }




            // Check file size
            if ($_FILES["video"]["size"] > 500000) {
                echo "Le ficher est très grand";
                $uploadOk = 0;
            }

            // Allow video file formats
            if (
                $imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "mov"
                && $imageFileType != "wmv"
            ) {
                echo "Seulement MP4, AVI, MOV & WMV sont autorisés.";
                $uploadOk = 0;
            }



            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["video"]["tmp_name"], $target_file)) {
                    $_POST["video"] =  PROJECT_ROOT . "/storage/uploads/" . $fileName;
                } else {
                    $isError = 1;
                    echo "Un problème s'est produit lors du téléchargement de l'image.";
                }
            }
        }
        if ($isError == 0) {

            $model->insert($_POST);
            $arr["titre"] = $_POST["titre"];
            $arr["description"] = $_POST["description"];
            $arr["image"] = $_POST["image"];
            $ingredientsCount = $_POST["ingredientsCount"];
            $recetteID = $model->where($arr)[0]->id;

            $modelIngredient = new RecetteIngredientModel();
            for ($i = 0; $i <= $ingredientsCount; $i++) {
                $ingredient['id_recette'] = $recetteID;
                $ingredient['id_ingredient'] = $_POST["ingredientname" . $i];
                $ingredient['quantite'] = $_POST["ingredientquantite" . $i];
                $ingredient['unite'] = $_POST["ingredientunite" . $i];

                $modelIngredient->insert($ingredient);
            }
            $stepsModel = new EtapeModel;
            $stepsCount = $_POST["stepsCount"];
            for ($i = 0; $i <= $stepsCount; $i++) {
                $step['id_recette'] = $recetteID;
                $step['description'] = $_POST["step" . $i];
                $step['ordre'] = $i;
                $stepsModel->insert($step);
            }


            header("Location: /Projet_Final/public/userDashboard");
        }
    }
}
