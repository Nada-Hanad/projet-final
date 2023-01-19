<?php


class Recipes
{
    use Controller;

    public function index()
    {


        $model = new RecipeModel();
        $recipes = $model->findAll();
        $this->adminView('recipes', $recipes);
    }
    public function add()
    {
        $model = new IngredientModel();
        $ingredients = $model->findAll();
        $this->adminView('addRecipe', array("ingredients" => $ingredients));
    }
    public function edit()
    {
        $URL = $_GET['url'];
        $URL = explode("/", trim($URL, "/"));
        $id = $URL[2];
        $model = new RecipeModel();
        $result = $model->getById($id);

        if ($result == null) {
            $this->view('_404', array());
        } else {
            $model = new RecipeModel();
            $result = $model->getRecipeById($id);
            $model = new IngredientModel();
            $ingredients = $model->findAll();
            $this->adminView('editRecipe', array("recipe" => $result["recipe"], "ingredients" => $result["ingredients"], "steps" => $result["steps"], "ingredientsList" => $ingredients));
        }
    }
    public function delete()
    {
        $id = $_POST["id"];
        $model = new RecipeModel();
        //get all ingredients of recipe
        $modelIngredient = new RecetteIngredientModel();
        $arr["id_recette"] = $id;
        $ingredients = $modelIngredient->where($arr);
        //delete all ingredients of recipe
        foreach ($ingredients as $ingredient) {
            $modelIngredient->delete($ingredient->id);
        }
        //delete all steps of recipe
        $modelEtape = new EtapeModel();
        $arr["id_recette"] = $id;
        $steps = $modelEtape->where($arr);
        foreach ($steps as $step) {
            $modelEtape->delete($step->id);
        }
        //delete notation of users
        $modelNotation = new NotationUtilisateurModel();
        $arr["id_recette"] = $id;
        $notations = $modelNotation->where($arr);
        foreach ($notations as $notation) {
            $modelNotation->delete($notation->id);
        }
        //delete from user preferences
        $modelPreference = new PreferenceUtilisateurModel();
        $arr["id_recette"] = $id;
        $preferences = $modelPreference->where($arr);
        foreach ($preferences as $preference) {
            $modelPreference->delete($preference->id);
        }

        $model->delete($id);

        header("Location: /Projet_Final/admin/recipes");
    }
    public function visualize()
    {

        $URL = $_GET['url'];
        $URL = explode("/", trim($URL, "/"));
        $id = $URL[2];


        $model = new RecipeModel();
        $result = $model->getById($id);

        if ($result == null) {
            $this->view('_404', array());
        } else {
            $model = new RecipeModel();
            $result = $model->getRecipeById($id);
            $this->adminView('VisualizeRecipe', array("recipe" => $result["recipe"], "ingredients" => $result["ingredients"], "steps" => $result["steps"]));
        }
    }
    public function addRecipe()
    {
        $isError = 0;

        $model = new RecipeModel();
        $_POST["etat"] = "published";
        $_POST["creator_id"] = null;
        //check if healthy checkbox is checked
        if (isset($_POST["healthy"]) && $_POST["healthy"] == "on
        ") {
            $_POST["healthy"] = 1;
        } else {
            $_POST["healthy"] = 0;
        }

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
        if ($_FILES["image"]["size"] > 500000) {
            echo "Le ficher est très grand";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType !=
            "jpeg" && $imageFileType != "webp"
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


            header("Location: /Projet_Final/admin/recipes");
        }
    }
    public function editRecipe()
    {
        $isError = 0;

        $model = new RecipeModel();

        if (isset($_POST["healthy"]) && $_POST["healthy"] == "on
        ") {
            $_POST["healthy"] = 1;
        } else {
            $_POST["healthy"] = 0;
        }
        if (isset($_POST["image"])) {


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
        }

        if (isset($_POST["video"])) {
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
        }

        if ($isError == 0) {

            $model->update($_POST["id"], $_POST);

            $ingredientsCount = $_POST["ingredientsCount"];

            $modelIngredient = new RecetteIngredientModel();
            //delete all RecetteIngredient with id_recette equal to $_POST['id']
            $arr["id_recette"] = $_POST['id'];
            $result =  $modelIngredient->where($arr);
            foreach ($result as $value) {
                $modelIngredient->delete($value->id);
            }


            for ($i = 0; $i < $ingredientsCount; $i++) {
                $ingredient['id_recette'] = $_POST['id'];
                $ingredient['id_ingredient'] = $_POST["ingredientname" . $i];
                $ingredient['quantite'] = $_POST["ingredientquantite" . $i];
                $ingredient['unite'] = $_POST["ingredientunite" . $i];

                $modelIngredient->insert($ingredient);
            }


            $stepsModel = new EtapeModel;
            //delete all Etape with id_recette equal to $_POST['id']
            $arr["id_recette"] = $_POST['id'];
            $result =  $stepsModel->where($arr);
            foreach ($result as $value) {
                $stepsModel->delete($value->id);
            }

            $stepsCount = $_POST["stepsCount"];
            for ($i = 0; $i < $stepsCount; $i++) {
                $step['id_recette'] = $_POST['id'];
                $step['description'] = $_POST["step" . $i];
                $step['ordre'] = $i;
                $stepsModel->insert($step);
            }



            header("Location: /Projet_Final/admin/recipes");
        }
    }


    public function validate()
    {
        $model = new RecipeModel();
        $data = array();
        $data["etat"] = "published";
        $model->update($_POST["id"], $data);
        header("Location: /Projet_Final/admin/recipes");
    }
}
