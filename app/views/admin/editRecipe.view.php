<?php
require_once "layout/layout.php";
class EditRecipeView
{
    private $recipe;
    private $ingredients;
    private $steps;
    private $ingredientsList;
    public function __construct($data)
    {
        $this->recipe = $data["recipe"];
        $this->ingredients = $data["ingredients"];
        $this->steps = $data["steps"];
        $this->ingredientsList = $data["ingredientsList"];
    }

    public function display()
    {

        $main = new AdminLayout();
        function content($data)
        {

?>

            <div class="add-recipe-page">
                <h2 class="add-recipe-page__title">Modifier une recette</h2>
                <form action="<?php echo ADMINROOT ?>/recipes/editRecipe" name="addRecipe" class="add-recipe-form" method="post" enctype="multipart/form-data">

                    <div class="form-section">
                        <h3 class="form-section__title">Information recette</h3>
                        <input name="id" type="number" style="visibility:hidden; height:0" value="<?php echo $data['recipe']->id ?>">

                        <label>
                            Titre
                            <input name="titre" type="text" placeholder="Titre..." required value=<?php echo $data["recipe"]->titre ?>>
                        </label>
                        <label>
                            Description
                            <textarea name="description" placeholder="Description..." required>
                                <?php echo $data["recipe"]->description ?>
                            </textarea>

                        </label>


                        <label>
                            Image
                            <input class="media" name="image" type="file" placeholder="Image..." id="image" value=<?php echo $data["recipe"]->image ?>>
                        </label>
                        <label>
                            Video
                            <input class="media" name="video" type="file" placeholder="Video..." value=<?php echo $data["recipe"]->video ?>>

                        </label>

                        <label>
                            Temps de préparation
                            <input name="temps_preparation" type="number" placeholder="Temps de préparation..." required value=<?php echo $data["recipe"]->temps_preparation ?>>


                        </label>
                        <label>
                            Temps de cuisson
                            <input name="temps_cuisson" type="number" placeholder="Temps de cuisson..." required value=<?php echo $data["recipe"]->temps_cuisson ?>>

                        </label>
                        <label>
                            Temps de repos
                            <input name="temps_repos" type="number" placeholder="Temps de repos..." required value=<?php echo $data["recipe"]->temps_repos ?>>

                        </label>
                        <label>
                            Difficulté

                            <input name="difficulte" type="number" placeholder="Difficulté..." max="5" required value=<?php echo $data["recipe"]->difficulte ?>>

                        </label>
                        <label>
                            Healthy
                            <input name="healthy" type="checkbox" placeholder="Healthy..." value=<?php echo $data["recipe"]->healthy ?>>


                        </label>
                        <label>
                            Calories
                            <input name="calories" type="number" placeholder="Calories..." required value=<?php echo $data["recipe"]->calories ?>>

                        </label>




                        <label>
                            Catégorie
                            <select name="categorie" required>
                                <option value="Plats" <?php if ($data["recipe"]->categorie == "Plats") {
                                                            echo "selected";
                                                        } ?>>Plats</option>
                                <option value="Boissons" <?php if ($data["recipe"]->categorie == "Boissons") {
                                                                echo "selected";
                                                            } ?>>Boissons</option>
                                <option value="Desserts" <?php if ($data["recipe"]->categorie == "Desserts") {
                                                                echo "selected";
                                                            } ?>>Desserts</option>
                                <option value="Entrees" <?php if ($data["recipe"]->categorie == "Entrees") {
                                                            echo "selected";
                                                        } ?>>Entrées</option>
                            </select>
                        </label>
                    </div>
                    <div class="form-section">
                        <h3 class="form-section__title">Ingrédients</h3>
                        <div class="form-section__content">

                            <div class="card" id="ingredients">







                                <?php
                                foreach ($data["ingredients"] as $key => $ingredient) {
                                    echo '<div class="ingredient flex-horoz">';
                                    echo "<select name='ingredientname" . $key . "' required>";
                                    foreach ($data["ingredientsList"] as $ingredientList) {
                                        echo "<option value='" . $ingredientList->id . "' " . ($ingredientList->nom == $ingredient->nom ? "selected" : "") . ">" . $ingredientList->nom . "</option>";
                                    }




                                    echo  "</select>
                                        <input type='number' name='ingredientquantite" . $key . "' placeholder='Quantité' required value='" . $ingredient->quantite . "' />
                                        <input type='text' name='ingredientunite" . $key . "' placeholder='Unité' value='" . $ingredient->unite . "' ><i class='fa-solid fa-xmark' onclick='removeItem(this)'></i>";
                                    echo '</div>';
                                }
                                ?>



                                <input value="<?php echo
                                                count($data["ingredients"]);
                                                ?>" type=" number" name="ingredientsCount" style="visibility: hidden; height:0">
                                <div class="add-ingredients flex-horoz" onclick="addItem()">Ajouter

                                </div>
                            </div>
                            <script>
                                function removeItem(el) {
                                    el.parentElement.remove();
                                }

                                function addItem() {
                                    var child = document.createElement("div");
                                    child.className = "ingredient flex-horoz";
                                    document.addRecipe.ingredientsCount.value++;
                                    console.log(document.addRecipe.ingredientsCount.value);



                                    var ingredient = document.createElement("select");
                                    ingredient.required = true;
                                    ingredient.name = "ingredientname" + (document.getElementById("ingredients").childElementCount - 2);
                                    <?php

                                    echo "var option = document.createElement('option');";
                                    echo "option.disabled = true;";
                                    echo "option.selected = true;";
                                    echo "option.value = '';";
                                    echo "option.innerHTML = 'Selectionner';";

                                    echo "ingredient.appendChild(option);";

                                    foreach ($data["ingredientsList"] as $ingredient) {

                                        echo "var option = document.createElement('option');";
                                        echo "option.value = '" . $ingredient->id . "';";
                                        echo "option.innerHTML = '" . $ingredient->nom . "';";
                                        echo "ingredient.appendChild(option);";
                                    }
                                    ?>






                                    child.appendChild(ingredient);

                                    var amount = document.createElement("input");
                                    amount.required = true;

                                    amount.type = "number";
                                    amount.placeholder = "Quantité";

                                    amount.name = "ingredientquantite" + (document.getElementById("ingredients").childElementCount - 2);

                                    child.appendChild(amount);
                                    var unite = document.createElement("input");
                                    unite.type = "text";
                                    unite.placeholder = "Unité";
                                    unite.name = "ingredientunite" + (document.getElementById("ingredients").childElementCount - 2);
                                    child.appendChild(unite);

                                    var removeButton = document.createElement("i");
                                    removeButton.className = "fa-solid fa-xmark";
                                    removeButton.onclick = function() {
                                        removeItem(removeButton);
                                        document.addRecipe.ingredientsCount.value--;
                                    }
                                    child.appendChild(removeButton);

                                    var i = document.getElementById("ingredients");

                                    i.insertBefore(child, i.lastElementChild);
                                }
                            </script>
                        </div>
                    </div>
                    <div class="form-section">
                        <h3 class="form-section__title">Étapes</h3>
                        <div class="form-section__content">
                            <div class="card" id="etapes">



                                <?php
                                foreach ($data["steps"] as $key => $step) {
                                    echo '<div class="etape flex-horoz">';
                                    echo "<textarea name='step" . $key . "' required cols='30' rows='10'>" . $step->description . "</textarea>";
                                    echo "<i class='fa-solid fa-xmark' onclick='removeItem(this)'></i>";
                                    echo '</div>';
                                }
                                ?>
                                <input value="<?php echo count($data["steps"]);
                                                ?> " type=" number" name="stepsCount" style="visibility: hidden; height:0">


                                <div class="add-etapes
                                    flex-horoz" onclick="addEtapeItem()">Ajouter
                                </div>
                            </div>
                            <script>
                                function removeItem(el) {
                                    el.parentElement.remove();
                                }

                                function addEtapeItem() {
                                    var child = document.createElement("div");
                                    child.className = "etape flex-horoz";
                                    document.addRecipe.stepsCount.value++;


                                    var textarea = document.createElement("textarea");
                                    textarea.name = "step" + (document.getElementById("etapes").childElementCount - 2);
                                    textarea.required = true;
                                    textarea.cols = 30;
                                    textarea.rows = 10;
                                    textarea.placeholder = "Étape...";
                                    child.appendChild(textarea);

                                    var removeButton = document.createElement("i");
                                    removeButton.className = "fa-solid fa-xmark";
                                    removeButton.onclick = function() {
                                        document.addRecipe.stepsCount.value--;
                                        removeItem(removeButton);
                                    }
                                    child.appendChild(removeButton);

                                    var i = document.getElementById("etapes");

                                    i.insertBefore(child, i.lastElementChild);
                                }
                            </script>




                        </div>
                    </div>
                    <button class="submit-button" type="submit">
                        Sauvegarder
                    </button>
                </form>
            </div>

<?php






        };
        $pass = array(
            "ingredients" => $this->ingredients,
            "recipe" => $this->recipe,
            "steps" => $this->steps,
            "ingredientsList" =>  $this->ingredientsList,

        );


        $main->displayLayout("Modifier recette", function () use ($pass) {
            return
                content($pass);
        });
    }
}
