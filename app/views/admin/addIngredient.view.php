<?php
require_once "layout/layout.php";
class AddIngredientView
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
                <h2 class="add-recipe-page__title">Ajouter un ingredient</h2>
                <form action="http://localhost/Projet_Final/admin/nutrition/addIngredient" name="addNews" class="add-recipe-form" method="post" enctype="multipart/form-data" style="width: 500px; height:400px">

                    <div class="form-section">
                        <h3 class="form-section__title">Information</h3>

                        <label>
                            Nom
                            <input name="nom" type="text" placeholder="Nom..." required>
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
                            Saison

                            <select name="saison" id="saison" required>
                                <option value="printemps">Printemps</option>
                                <option value="ete">Ete</option>
                                <option value="automne">Automne</option>
                                <option value="hiver">Hiver</option>
                                <option value="anuelle">Anuelle</option>
                            </select>
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
