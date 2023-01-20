<?php
require_once "layout/layout.php";
class NutritionView
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

            if (isset($_SESSION['admin'])) {
?>
                <div class="recipes-page">
                    <div class="recipes-page__header">
                        <h2 class="recipes-page__title">Gestion des ingredients</h2>
                        <a href="<?php echo ADMINROOT ?>/nutrition/add" class="recipes-page__add">

                            <i class="fa-solid fa-plus"></i>
                        </a>
                    </div>
                    <div class="recipes-page__content">
                        <table id="myTable">
                            <tr>
                                <th>Image</th>
                                <th>Nom</th>

                                <th>Visualiser</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                            <?php
                            foreach ($data as $r) {
                                echo "<tr>";

                                echo "<td><img class='table-image' src='" . $r->image . "' alt=''></td>";
                                echo "<td>" . $r->nom . "</td>";

                                echo "<td><a class='recipe-card__action' href='" . ADMINROOT . "/nutrition/visualize/" . $r->id . "'><i class='fa-solid fa-eye'></i></a></td>";

                                echo "<td><a class='recipe-card__action' href='" . ADMINROOT . "/nutrition/edit/" . $r->id . "'><i class='fa-solid fa-edit'></i></a></td>";
                                echo "<td>

                                <form action='" . ADMINROOT . "/nutrition/delete' method='post'>
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


        $main->displayLayout("Gestion des ingredients", function () use ($pass) {
            return
                content($pass);
        });
    }
}
