<?php
require_once "layout/layout.php";
class UsersView
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
                        <h2 class="recipes-page__title">Gestion des utilisateurs</h2>

                    </div>
                    <div class="recipes-page__content">
                        <table>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Date de naissance</th>
                                <th>Sexe</th>
                                <th>Etat</th>
                                <th>Profile</th>
                                <th>Valider</th>
                                <th>Supprimer</th>
                            </tr>
                            <?php
                            foreach ($data as $r) {
                                echo "<tr>";

                                echo "<td>" . $r->nom . "</td>";
                                echo "<td>" . $r->email . "</td>";
                                echo "<td>" . $r->date_naissance . "</td>";
                                echo "<td>" . $r->sexe . "</td>";
                                if ($r->approved == 1) {
                                    echo "<td>Validé</td>";
                                } else {
                                    echo "<td>En attente</td>";
                                }

                                echo "<td><a class='recipe-card__action' href='http://localhost/Projet_Final/admin/userDashboard/" . $r->id . "'><i class='fa-solid fa-user'></i></a></td>";
                                echo "<td>
                                <form action='http://localhost/Projet_Final/admin/users/validate' method='post'>
                                <input type='hidden' name='id' value='" . $r->id . "'>
                                <button class='recipe-card__action' type='submit'><i class='fa-solid fa-check-double'></i></button>
                                </form>
                                </td>";


                                echo "<td>

                                <form action='http://localhost/Projet_Final/admin/users/delete' method='post'>
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


        $main->displayLayout("Gestion des utilisateurs", function () use ($pass) {
            return
                content($pass);
        });
    }
}
