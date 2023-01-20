<?php
require_once "layout/layout.php";
class EditNewsView
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
                <form action="<?php echo ADMINROOT ?>/news/editNews" name="addNews" class="add-recipe-form" method="post" enctype="multipart/form-data" style="width: 500px; height:400px">
                    <input type="hidden" name="id" value="<?php echo $data->id; ?>">

                    <div class="form-section">
                        <h3 class="form-section__title">Information</h3>

                        <label>
                            Titre
                            <input name="titre" type="text" placeholder="Titre..." required value=" <?php echo $data->titre; ?>">
                        </label>
                        <label>
                            Description
                            <textarea name="description" placeholder="Description..." required>
                            <?php echo $data->description; ?>
                            </textarea>

                        </label>


                        <label>
                            Image
                            <input class="media" name="image" type="file" placeholder="Image..." id="image">
                        </label>
                        <label>
                            Video
                            <input class="media" name="video" type="file" placeholder="Video...">
                        </label>







                    </div>


                    <button class="submit-button" type="submit">
                        Sauvegarder
                    </button>
                </form>
            </div>

<?php






        };
        $pass = $this->data;


        $main->displayLayout("Modifier news", function () use ($pass) {
            return
                content($pass);
        });
    }
}
