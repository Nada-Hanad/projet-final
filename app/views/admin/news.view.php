<?php
require_once "layout/layout.php";
class NewsView
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
                        <h2 class="recipes-page__title">Gestion des news</h2>
                        <a href="http://localhost/Projet_Final/admin/news/add" class="recipes-page__add">

                            <i class="fa-solid fa-plus"></i>
                        </a>
                    </div>
                    <div class="recipes-page__content">
                        <table>
                            <tr>
                                <th>Image</th>
                                <th>Titre</th>
                                <th>Visualiser</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                            <?php
                            foreach ($data as $r) {
                                echo "<tr>";

                                echo "<td><img class='table-image' src='" . $r->image . "' alt=''></td>";
                                echo "<td>" . $r->titre . "</td>";

                                echo "<td><a class='recipe-card__action' href='http://localhost/Projet_Final/admin/news/visualize/" . $r->id . "'><i class='fa-solid fa-eye'></i></a></td>";

                                echo "<td><a class='recipe-card__action' href='http://localhost/Projet_Final/admin/news/edit/" . $r->id . "'><i class='fa-solid fa-edit'></i></a></td>";
                                echo "<td>

                                <form action='http://localhost/Projet_Final/admin/news/delete' method='post'>
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


        $main->displayLayout("Gestion des news", function () use ($pass) {
            return
                content($pass);
        });
    }
}
