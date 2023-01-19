<?php
require_once "layout/layout.php";
class ParamsView
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
                        <h2 class="recipes-page__title">Gestion des paramètres</h2>

                    </div>
                    <div class="recipes-page__content">
                        <h3>Gestion des paramètres globals</h3>
                        <table class="params-table">
                            <tr>
                                <th>Attribut</th>
                                <th>Valeur</th>
                                <th>Modifier</th>
                            </tr>
                            <?php

                            foreach ($data["params"] as  $r) {
                            ?>
                                <tr>
                                    <form action="http://localhost/Projet_Final/admin/params/edit" method="post">
                                        <input type='hidden' name='id' value='<?php echo $r->id ?>'>

                                        <td>
                                            <input type="text" name="nom" value="<?php echo $r->nom ?>">

                                        </td>
                                        <td>
                                            <input type="text" name="valeur" value="<?php echo $r->valeur ?>">

                                        </td>


                                        <td><button class='recipe-card__action' type='submit'><i class='fa-solid fa-edit'></i></button></td>
                                    </form>



                                </tr>
                            <?php
                            }

                            ?>


                        </table>
                        <h3>Gestion du diaporama</h3>

                        <table class="diapo-table">
                            <tr>
                                <th>Lien de l'article</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                            <?php


                            foreach ($data["diaporama"] as  $r) {
                            ?>
                                <tr>
                                    <form action="http://localhost/Projet_Final/admin/params/editDiapo" method="post">
                                        <input type='hidden' name='id' value='<?php echo $r->id ?>'>


                                        <td>
                                            <input type="text" name="url" value="<?php echo $r->url ?>">

                                        </td>


                                        <td><button class='recipe-card__action' type='submit'><i class='fa-solid fa-edit'></i></button></td>
                                    </form>
                                    <form action="http://localhost/Projet_Final/admin/params/deleteDiapo" method="post">
                                        <input type='hidden' name='id' value='<?php echo $r->id ?>'>

                                        <td><button class='recipe-card__action' type='submit'><i class='fa-solid fa-trash'></i></button></td>
                                    </form>



                                </tr>
                            <?php
                            }

                            ?>


                        </table>
                        <a href="http://localhost/Projet_Final/admin/params/addDiapo">
                            <button class="primary-button">Ajouter un diapo</button>
                        </a>




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


        $main->displayLayout("Gestion des paramètres", function () use ($pass) {
            return
                content($pass);
        });
    }
}
