<?php
require_once "layout/layout.php";
class AddNewsView
{
    private $data;
    public function __construct($data)
    {

        $this->data = $data;
    }

    public function display()
    {

        $main = new AdminLayout();
        function content($data)
        {

?>

            <div class="add-recipe-page">
                <h2 class="add-recipe-page__title">Ajouter une actualité</h2>
                <form action="http://localhost/Projet_Final/admin/news/addNews" name="addNews" class="add-recipe-form" method="post" enctype="multipart/form-data" style="width: 500px; height:400px">

                    <div class="form-section">
                        <h3 class="form-section__title">Information</h3>

                        <label>
                            Titre
                            <input name="titre" type="text" placeholder="Titre..." required>
                        </label>
                        <label>
                            Description
                            <textarea name="description" placeholder="Description..." required></textarea>

                        </label>


                        <label>
                            Image
                            <input class="media" name="image" type="file" placeholder="Image..." required id="image">
                        </label>
                        <label>
                            Video
                            <input class="media" name="video" type="file" placeholder="Video...">
                        </label>







                    </div>


                    <button class="submit-button" type="submit">
                        Ajouter
                    </button>
                </form>
            </div>

<?php






        };
        $pass = $this->data;


        $main->displayLayout("Ajouter recette", function () use ($pass) {
            return
                content($pass);
        });
    }
}
