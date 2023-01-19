<?php
require_once "layout/layout.php";
class EditIngredientView
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
                <h2 class="add-recipe-page__title">Modifier Ingredient</h2>
                <form action="http://localhost/Projet_Final/admin/nutrition/editingredient" name="addNews" class="add-recipe-form" method="post" enctype="multipart/form-data" style="width: 500px; height:500px">
                    <input type="hidden" name="id" value="<?php echo $data->id; ?>">

                    <div class="form-section">
                        <h3 class="form-section__title">Information</h3>

                        <label>
                            Nom
                            <input name="nom" type="text" placeholder="Titre..." required value=" <?php echo $data->nom; ?>">
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
                        <label>
                            Saison

                            <select name="saison" id="saison" required>

                                <option value="printemps" <?php if ($data->saison == "printemps") {
                                                                echo "selected";
                                                            } ?>>Printemps</option>
                                <option value="ete" <?php if ($data->saison == "ete") {
                                                        echo "selected";
                                                    } ?>>Été</option>
                                <option value="automne" <?php if ($data->saison == "automne") {
                                                            echo "selected";
                                                        } ?>>Automne</option>
                                <option value="hiver" <?php if ($data->saison == "hiver") {
                                                            echo "selected";
                                                        } ?>>Hiver</option>
                                <option value="anuelle" <?php if ($data->saison == "anuelle") {
                                                            echo "selected";
                                                        } ?>>Anuelle</option>




                            </select>
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


        $main->displayLayout("Modifier ingredient", function () use ($pass) {
            return
                content($pass);
        });
    }
}
