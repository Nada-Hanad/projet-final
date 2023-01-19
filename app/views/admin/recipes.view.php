<?php
require_once "layout/layout.php";
class RecipesView
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
            function recipeCard($recipe)
            {

?>
                <div class="recipe-card">
                    <div class="recipe-card__image">
                        <img src="<?php echo $recipe->image ?>" alt="">
                    </div>
                    <div class="recipe-card__content">
                        <h3 class="recipe-card__title"><?php echo $recipe->titre ?></h3>
                        <p class="recipe-card__description"><?php echo $recipe->description ?></p>
                        <div class="recipe-card__actions">
                            <form action="http://localhost/Projet_Final/admin/recipes/delete" method="post">
                                <a href="/admin/recipes/edit/<?php echo $recipe->id ?>" class="recipe-card__action"><i class="fa-solid fa-pen-to-square"></i></a>
                                <input type="hidden" name="id" value="<?php echo $recipe->id ?>">
                                <button type="submit" class="recipe-card__action"><i class="fa-solid fa-trash"></i></button>

                            </form>
                            <a href="http://localhost/Projet_Final/admin/recipes/delete<?php echo $recipe->id ?>" class="recipe-card__action"><i class="fa-solid fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            <?php



            }
            if (isset($_SESSION['admin'])) {
            ?>
                <div class="recipes-page">
                    <div class="recipes-page__header">
                        <h2 class="recipes-page__title">Gestion des recettes</h2>
                        <a href="http://localhost/Projet_Final/admin/recipes/add" class="recipes-page__add">

                            <i class="fa-solid fa-plus"></i>
                        </a>
                    </div>
                    <div class="recipes-page__content">
                        <table>
                            <tr>
                                <th>Image</th>
                                <th>Titre</th>
                                <th>Etat</th>
                                <th>Visualiser</th>
                                <th>Valider</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                            <?php
                            foreach ($data as $r) {
                                echo "<tr>";

                                echo "<td><img class='table-image' src='" . $r->image . "' alt=''></td>";
                                echo "<td>" . $r->titre . "</td>";
                                echo "<td>" . $r->etat . "</td>";

                                echo "<td><a class='recipe-card__action' href='http://localhost/Projet_Final/admin/recipes/visualize/" . $r->id . "'><i class='fa-solid fa-eye'></i></a></td>";
                                echo "<td>

                                <form action='http://localhost/Projet_Final/admin/recipes/validate' method='post'>
                                <input type='hidden' name='id' value='" . $r->id . "'>
                                <button class='recipe-card__action' type='submit'><i class='fa-solid fa-check-double'></i></button>
                                </form>
                                </td>";
                                echo "<td><a class='recipe-card__action' href='http://localhost/Projet_Final/admin/recipes/edit/" . $r->id . "'><i class='fa-solid fa-edit'></i></a></td>";
                                echo "<td>

                                <form action='http://localhost/Projet_Final/admin/recipes/delete' method='post'>
                                <input type='hidden' name='id' value='" . $r->id . "'>
                                <button class='recipe-card__action' type='submit'><i class='fa-solid fa-trash'></i></button>
                                </form>
                                </td>";
                                echo "</tr>";
                            }

                            ?>


                        </table>
                    </div>


                </div>
            <?php

            } else {

                header("Location: /Projet_Final/admin");
            }

            ?>




<?php
        };
        $pass = $this->data;


        $main->displayLayout("Gestion des recettes", function () use ($pass) {
            return
                content($pass);
        });
    }
}
