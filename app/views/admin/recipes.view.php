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
                            <form action="<?php echo ADMINROOT ?>/recipes/delete" method="post">
                                <a href="/admin/recipes/edit/<?php echo $recipe->id ?>" class="recipe-card__action"><i class="fa-solid fa-pen-to-square"></i></a>
                                <input type="hidden" name="id" value="<?php echo $recipe->id ?>">
                                <button type="submit" class="recipe-card__action"><i class="fa-solid fa-trash"></i></button>

                            </form>
                            <a href="<?php echo ADMINROOT ?>/recipes/delete<?php echo $recipe->id ?>" class="recipe-card__action"><i class="fa-solid fa-trash"></i></a>
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
                        <a href="<?php echo ADMINROOT ?>/recipes/add" class="recipes-page__add">

                            <i class="fa-solid fa-plus"></i>
                        </a>
                    </div>
                    <div class="recipes-page__content">
                        <table id="myTable">
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

                                echo "<td><a class='recipe-card__action' href='<?php echo ADMINROOT ?>/recipes/visualize/" . $r->id . "'><i class='fa-solid fa-eye'></i></a></td>";
                                echo "<td>

                                <form action='" . ADMINROOT . "/recipes/validate' method='post'>
                                <input type='hidden' name='id' value='" . $r->id . "'>
                                <button class='recipe-card__action' type='submit'><i class='fa-solid fa-check-double'></i></button>
                                </form>
                                </td>";
                                echo "<td><a class='recipe-card__action' href='" . ADMINROOT . "/recipes/edit/" . $r->id . "'><i class='fa-solid fa-edit'></i></a></td>";
                                echo "<td>

                                <form action='" . ADMINROOT . "/recipes/delete' method='post'>
                                <input type='hidden' name='id' value='" . $r->id . "'>
                                <button class='recipe-card__action' type='submit'><i class='fa-solid fa-trash'></i></button>
                                </form>
                                </td>";
                                echo "</tr>";
                            }

                            ?>


                        </table>
                        <button id="filter">
                            Filtrer par ordre alphabertique
                        </button>
                        <script>
                            //filter table alphabetically by name
                            function sortTable() {
                                var table, rows, switching, i, x, y, shouldSwitch;
                                table = document.getElementById("myTable");
                                switching = true;
                                /*Make a loop that will continue until
                                no switching has been done:*/
                                while (switching) {
                                    //start by saying: no switching is done:
                                    switching = false;
                                    rows = table.rows;
                                    /*Loop through all table rows (except the
                                    first, which contains table headers):*/
                                    for (i = 1; i < (rows.length - 1); i++) {
                                        //start by saying there should be no switching:
                                        shouldSwitch = false;
                                        /*Get the two elements you want to compare,
                                        one from current row and one from the next:*/
                                        x = rows[i].getElementsByTagName("TD")[0];
                                        y = rows[i + 1].getElementsByTagName("TD")[0];
                                        //check if the two rows should switch place:
                                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                            //if so, mark as a switch and break the loop:
                                            shouldSwitch = true;
                                            break;
                                        }
                                    }
                                    if (shouldSwitch) {
                                        /*If a switch has been marked, make the switch
                                        and mark that a switch has been done:*/
                                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                                        switching = true;
                                    }
                                }
                            }
                            document.getElementById("filter").addEventListener("click", sortTable);
                        </script>
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
