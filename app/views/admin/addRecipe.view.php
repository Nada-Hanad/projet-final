<?php
require_once "layout/layout.php";
class AddRecipeView
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
                <h2 class="add-recipe-page__title">Ajouter une recette</h2>
                <form action="<?php echo ADMINROOT ?>/recipes/addRecipe" name="addRecipe" class="add-recipe-form" method="post" enctype="multipart/form-data">

                    <div class="form-section">
                        <h3 class="form-section__title">Information recette</h3>

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

                        <label>
                            Temps de préparation
                            <input name="temps_preparation" type="number" placeholder="Temps de préparation..." required>
                        </label>
                        <label>
                            Temps de cuisson
                            <input name="temps_cuisson" type="number" placeholder="Temps de cuisson..." required>
                        </label>
                        <label>
                            Temps de repos
                            <input name="temps_repos" type="number" placeholder="Temps de repos..." required>
                        </label>
                        <label>
                            Difficulté

                            <input name="difficulte" type="number" placeholder="Difficulté..." max="5" required>
                        </label>
                        <label>
                            Healthy
                            <input name="healthy" type="checkbox" placeholder="Healthy...">

                        </label>
                        <label>
                            Calories
                            <input name="calories" type="number" placeholder="Calories..." required>
                        </label>




                        <label>
                            Catégorie
                            <select name="categorie" required>
                                <option value="Plats">Plats</option>
                                <option value="boissons">Boissons</option>
                                <option value="desserts">Desserts</option>
                                <option value="entrees">Entrées</option>
                            </select>
                        </label>
                    </div>
                    <div class="form-section">
                        <h3 class="form-section__title">Ingrédients</h3>
                        <div class="form-section__content">

                            <div class="card" id="ingredients">
                                <div class="ingredient flex-horoz">
                                    <select name="ingredientname0" required>
                                        <option disabled selected value>Selectionner</option>

                                        <?php
                                        foreach ($data["ingredients"] as $ingredient) {

                                            echo "<option value='" . $ingredient->id . "'>" . $ingredient->nom . "</option>";
                                        }
                                        ?>

                                    </select>

                                    <input type="number" name="ingredientquantite0" placeholder="Quantité" required />
                                    <input type="text" name="ingredientunite0" placeholder="Unité"><i class="fa-solid fa-xmark" onclick="removeItem(this)"></i>
                                </div>

                                <input value="0" type=" number" name="ingredientsCount" style="visibility: hidden; height:0">
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

                                    foreach ($data["ingredients"] as $ingredient) {

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
                                <div class="etape flex-horoz">
                                    <textarea name="step0" id="" cols="30" rows="10" placeholder="Étape..." required></textarea>
                                    <i class="fa-solid fa-xmark" onclick="removeItem(this)"></i>
                                </div>
                                <input value="0" type=" number" name="stepsCount" style="visibility: hidden; height:0">


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
