<?php


class News
{
    use Controller;

    public function index()
    {


        $model = new NewsModel();
        $news = $model->findAll();
        $this->adminView('news', $news);
    }
    public function add()
    {

        $this->adminView('addNews', array());
    }
    public function edit()
    {
        $URL = $_GET['url'];
        $URL = explode("/", trim($URL, "/"));
        $id = $URL[2];
        $model = new NewsModel();
        $result = $model->getById($id);

        if ($result == null) {
            $this->view('_404', array());
        } else {


            $this->adminView('editNews', $result);
        }
    }
    public function delete()
    {
        $id = $_POST["id"];
        $model = new NewsModel();



        $model->delete($id);

        header("Location: /Projet_Final/admin/news");
    }
    public function visualize()
    {

        $URL = $_GET['url'];
        $URL = explode("/", trim($URL, "/"));
        $id = $URL[2];


        $model = new NewsModel();
        $result = $model->getById($id);

        if ($result == null) {
            $this->view('_404', array());
        } else {
            $this->adminView('VisualizeNews', $result);
        }
    }
    public function addNews()
    {
        $isError = 0;

        $model = new NewsModel();


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




            header("Location: /Projet_Final/admin/news");
        }
    }
    public function editNews()
    {
        $isError = 0;

        $model = new NewsModel();


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
        }

        if ($isError == 0) {



            $model->update($_POST["id"], $_POST);

            header("Location: /Projet_Final/admin/news");
        }
    }
}
