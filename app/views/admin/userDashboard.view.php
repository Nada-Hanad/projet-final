<?php
require_once "layout/layout.php";
require_once __DIR__ . "/../shared/main.php";

class UserDashboardView
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
            function userNotationCard($recipe, $note)
            {
?>
                <div class="notation-card">

                    <img src=<?php echo $recipe->image ?> alt="recipe image">
                    <div class="recipe-card-content">
                        <h3>
                            <?php
                            echo $recipe->titre
                            ?>
                        </h3>

                    </div>
                    <div class="notation">
                        <div class="stars display-only">

                            <?php
                            $i = 0;
                            for ($i; $i < $note->note; $i++) {
                                echo '<i class="fas fa-star checked"></i>';
                            }
                            if ($i < 5) {
                                for ($i; $i < 5; $i++) {
                                    echo '<i class="fas fa-star"></i>';
                                }
                            }
                            ?>

                        </div>
                    </div>

                    <a href=<?php echo ROOT . '/recipe/' . $recipe->id ?> target="_blank" rel="noopener noreferrer">
                        <input class="primary-button" type="button" value="Lire la suite">
                    </a>
                </div>



            <?php

            }

            ?>

            <div class="user-profile-page">
                <div class="create-recipe-button">


                </div>

                <h1>
                    <?php echo "Bonjour " . $data["user"]->nom . " !"; ?>



                </h1>
                <div class="general-user-info">
                    <div class="info-section">
                        <h2>Informations générales</h2>
                        <div class="info">
                            <p> <span> Nom :</span> <?php echo $data["user"]->nom; ?></p>
                            <p> <span> Email :</span> <?php echo $data["user"]->email; ?></p>
                            <p> <span> Date de naissance :</span> <?php echo $data["user"]->date_naissance; ?></p>
                            <p> <span> Sexe :</span> <?php echo $data["user"]->sexe; ?> </p>
                        </div>

                    </div>

                </div>
                <div class="section-profile">
                    <div class="category-container">
                        <div class="category-header">
                            <h2>Mes recettes preferées</h2>

                        </div>

                        <div class="slider slider-container">
                            <?php
                            $m = new Main;
                            foreach ($data["recettesPrefere"] as $recipe) {

                                $m->RecipeCard($recipe->titre, $recipe->description, $recipe->image, $recipe->id);
                            }
                            ?>




                            <div class="control-prev-btn">
                                <i class="fas fa-arrow-left"></i>
                            </div>
                            <div class="control-next-btn">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>


                        <div class="overlay"></div>
                    </div>
                </div>
                <div class="section-profile">
                    <div class="category-container">
                        <div class="category-header">
                            <h2>Mes recettes crées</h2>

                        </div>

                        <div class="slider slider-container">


                            <?php
                            $m = new Main;
                            foreach ($data["recetteCree"] as $recipe) {

                                $m->RecipeCard($recipe->titre, $recipe->description, $recipe->image, $recipe->id);
                            }
                            ?>

                            <div class="control-prev-btn">
                                <i class="fas fa-arrow-left"></i>
                            </div>
                            <div class="control-next-btn">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>


                        <div class="overlay"></div>
                    </div>
                </div>
                <div class="section-profile">
                    <div class="category-container">
                        <div class="category-header">
                            <h2>Mes notation</h2>

                        </div>

                        <div class="slider slider-container">

                            <?php
                            foreach ($data["notation"] as $note) {
                                $recipe = $note->recette;
                                userNotationCard($recipe, $note);
                            }
                            ?>

                            <div class="control-prev-btn">
                                <i class="fas fa-arrow-left"></i>
                            </div>
                            <div class="control-next-btn">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>


                        <div class="overlay"></div>
                    </div>
                </div>
            </div>
            <?php

            ?>




<?php
        };
        $pass = $this->data;


        $main->displayLayout("Tableau de bord", function () use ($pass) {
            return
                content($pass);
        });
    }
}
