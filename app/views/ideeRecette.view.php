<?php
require_once "shared/mainLayout.php";
require_once "shared/main.php";
class IdeeRecetteView
{
    private $catTitle;
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }





    public function display()
    {
        $main = new MainLayout();
        function content($list)
        {


?>
            <div class="category-title">
                <h1> Idée de recette </h1>



            </div>
            <form action="<?php echo ROOT . '/ideeRecette/findRecipes' ?>" class="add-ingredients-form" method="post">
                <h3>
                    Liste des ingredients
                </h3>

                <input type="hidden" name="nbIngredients" value="1">
                <div class="ingredients-list">
                    <label for="">
                        Ingredient 1

                        <select name="ingredient0" id="">
                            <option value="0" disabled selected>Choisir un ingredient</option>
                            <?php
                            foreach ($list['ingredients'] as $ingredient) {
                            ?>
                                <option value="<?php echo $ingredient->id ?>"><?php echo $ingredient->nom ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </label>

                </div>

                <div class="add-ingredient">

                    <i class="fas fa-plus"></i>
                    Ajouter ingredient


                </div>



                <button class="s-button" type="submit">Trouver recettes</button>


            </form>

            <div class="news-container">
                <?php
                if (count($list['recipes']) > 0) {

                    foreach ($list['recipes'] as $recipe) {
                        $m = new MainLayout();
                ?>

                        <?php


                        $m->RecipeCard($recipe->titre, $recipe->description, $recipe->image, $recipe->id);

                        ?>

                <?php
                    }
                } else {
                    echo "<h2>Malheuresement il n y'a pas données à afficher. </h2>";
                }
                ?>

            </div>
            <script>
                const addIngredient = document.querySelector(".add-ingredient");
                const ingredientsList = document.querySelector(".ingredients-list");
                let i = 1;
                addIngredient.addEventListener("click", () => {
                    const nbIngredients = document.querySelector("input[name='nbIngredients']");
                    nbIngredients.setAttribute("value", i + 1);
                    const ingredient = document.createElement("label");
                    ingredient.setAttribute("for", "");
                    ingredient.innerHTML = `Ingredient ${i+1}
                    <select name="ingredient${i}" id="">
                        <option value="0" disabled selected>Choisir un ingredient</option>
                        <?php
                        foreach ($list['ingredients'] as $ingredient) {
                        ?>
                            <option value="<?php echo $ingredient->id ?>"><?php echo $ingredient->nom ?></option>
                        <?php
                        }
                        ?>
                    </select>`;
                    ingredientsList.appendChild(ingredient);
                    i++;
                })
            </script>
<?php
        };
        $pass = $this->data;


        $main->displayLayout("Tableau de bord", function () use ($pass) {
            return
                content($pass);
        });
    }
}
