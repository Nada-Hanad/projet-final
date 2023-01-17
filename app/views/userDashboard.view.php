<?php
require_once "shared/mainLayout.php";
require_once "shared/main.php";
class UserDashboardView
{
    public function display()
    {
        $main = new MainLayout();
        function content()
        {

?>
            <?php

            if (isset($_SESSION["user"])) {
            ?>
                <div class="user-profile-page">

                    <h1>
                        <?php echo "Bonjour " . $_SESSION["user"]->nom . " !"; ?>



                    </h1>
                    <div class="general-user-info">
                        <div class="info-section">
                            <h2>Informations générales</h2>
                            <div class="info">
                                <p> <span> Nom :</span> <?php echo $_SESSION["user"]->nom; ?></p>
                                <p> <span> Email :</span> <?php echo $_SESSION["user"]->email; ?></p>
                                <p> <span> Date de naissance :</span> <?php echo $_SESSION["user"]->date_naissance; ?></p>
                                <p> <span> Sexe :</span> <?php echo $_SESSION["user"]->sexe; ?> </p>
                            </div>

                            <a class="modify" href="<?php echo ROOT . "/userEdit" ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                        </div>

                    </div>
                    <div class="section-profile">
                        <div class="category-container">
                            <div class="category-header">
                                <h2>Mes recettes preferées</h2>

                            </div>

                            <div class="slider slider-container">
                                //add preferd

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
                                //add content

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
                                //add content

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
            } else {
                header("Location: " . ROOT . "/authentication");
            }
            ?>




<?php
        };

        $main->displayLayout("Tableau de bord", function () {
            return
                content();
        });
    }
}
