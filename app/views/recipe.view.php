<?php
require_once "shared/mainLayout.php";
require_once "shared/main.php";


class RecipeView
{
    private $recipe;
    private $ingredients;
    private $steps;
    public function __construct($data)
    {

        $this->recipe = $data['recipe'];
        $this->ingredients = $data['ingredients'];

        $this->steps = $data['steps'];
    }
    public function display()
    {

        $main = new MainLayout();
        function content(
            $recipe,
            $ingList,
            $intList
        ) {

?>


            <div class="recipe-body">
                <div class="recipe-header">

                    <img src="<?php echo $recipe->image ?>" alt="">

                    <div class="recipe-title">
                        <div class="title-actions">

                            <h1><?php echo $recipe->titre ?></h1>
                            <div class="actions">
                                <div class="like-action">
                                    <i class="fas fa-heart"></i>
                                </div>
                            </div>

                        </div>
                        <div class="notation">
                            <div class="stars display-only">

                                <?php
                                $i = 0;
                                for ($i; $i < $recipe->notation; $i++) {
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
                        <div class="recipe-description">
                            <p><?php echo $recipe->description ?></p>
                        </div>
                    </div>
                </div>
                <div class="recipe-content">
                    <div class="up-details">
                        <div class="detail-container">
                            <div class="d-h">
                                <i class="fa-regular fa-clock"></i>
                                <p>T. PREPARATION</p>
                            </div>
                            <p><?php echo $recipe->temps_preparation ?> MIN</p>
                        </div>
                        <div class="separator"></div>
                        <div class="detail-container">
                            <div class="d-h">
                                <i class="fa-regular fa-clock"></i>
                                <p>T. CUISSANT</p>
                            </div>
                            <p><?php echo $recipe->temps_cuisson ?> MIN</p>
                        </div>
                        <div class="separator"></div>

                        <div class="detail-container">
                            <div class="d-h">
                                <i class="fa-regular fa-clock"></i>
                                <p>T. REPOS</p>
                            </div>
                            <p><?php echo $recipe->temps_repos ?> MIN</p>
                        </div>
                        <div class="separator"></div>

                        <div class="detail-container">
                            <div class="d-h">
                                <i class="fa-regular fa-clock"></i>
                                <p>T. TOTAL</p>
                            </div>
                            <p><?php echo $recipe->temps_repos + $recipe->temps_cuisson + $recipe->temps_preparation ?> MIN</p>
                        </div>
                        <div class="separator"></div>

                        <div class="detail-container">
                            <div class="d-h">
                                <i class="fa-brands fa-gripfire"></i>
                                <p>NB. CALORIES</p>
                            </div>
                            <p><?php echo $recipe->calories ?> </p>
                        </div>
                        <div class="separator"></div>




                        <div class="detail-container">
                            <div class="d-h">
                                <i class="fa-regular fa-circle-up"></i>
                                <p>DIFFICULTÉ</p>
                            </div>
                            <p><?php echo $recipe->difficulte ?> / 5 </p>
                        </div>

                    </div>
                    <?php
                    if (!$recipe->video == "") {
                    ?>
                        <video src="<?php echo $recipe->video ?>" poster="<?php echo $recipe->image ?>" controls></video>
                    <?php
                    }

                    ?>
                    <div class="recipe-cont">
                        <div class="recipe-part">
                            <h2>Ingredients</h2>
                            <ul>
                                <?php
                                foreach ($ingList as $ing) {
                                ?>
                                    <li>
                                        <?php echo $ing->quantite ?> <?php echo $ing->unite ?> <?php echo $ing->nom ?>.
                                    </li>
                                <?php
                                }
                                ?>

                            </ul>
                        </div>
                        <div class="recipe-part">
                            <h2>Instructions</h2>
                            <ol>
                                <?php
                                foreach ($intList as $inst) {
                                ?>
                                    <li>
                                        <?php echo $inst->description ?>
                                    </li>
                                <?php
                                }
                                ?>

                            </ol>

                        </div>
                        <div class="" id="result"></div>
                    </div>
                    <div class="action-notation">
                        <span>
                            <h2>
                                Déja fait ça?
                            </h2>
                            <p>Donner votre note!</p>
                        </span>
                        <div class="notation">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>

                        </div>
                        <div class="secondary-button rate-btn">
                            Noter
                        </div>
                    </div>


                </div>
            </div>

            <script>
                //send request to check if recipe is liked by user in session
                let note = 0;
                fetch("http://localhost/Projet_Final/public/userEdit/isLoggedIn", {
                        method: "GET",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
                        },

                    })
                    .then((response) => response.text())
                    .then((res) => {
                        if (JSON.parse(res)) {
                            fetch("http://localhost/Projet_Final/public/userEdit/isLikedByUser", {
                                    method: "POST",
                                    headers: {
                                        "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
                                    },
                                    body: "recetteId=" + <?php echo $recipe->id ?>


                                })
                                .then((response) => response.text())
                                .then((res) => {
                                    if (JSON.parse(res) == true) {
                                        likeButton.classList.add("liked");
                                    }
                                });

                        }

                    })






                const likeButton = document.querySelector(".like-action")
                likeButton.addEventListener("click", () => {

                    fetch("http://localhost/Projet_Final/public/userEdit/isLoggedIn", {
                            method: "GET",
                            headers: {
                                "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
                            },

                        })
                        .then((response) => response.text())
                        .then((res) => {
                            if (JSON.parse(res)) {

                                if (!likeButton.classList.contains("liked")) {
                                    fetch("http://localhost/Projet_Final/public/userEdit/addToPreferences", {
                                            method: "POST",
                                            headers: {
                                                "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
                                            },
                                            body: "recetteId=" + <?php echo $recipe->id ?>


                                        })
                                        .then((response) => response.text())
                                        .then((res) => {
                                            likeButton.classList.add("liked");

                                        });


                                } else {

                                    fetch("http://localhost/Projet_Final/public/userEdit/removeFromPreferences", {
                                            method: "POST",
                                            headers: {
                                                "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
                                            },
                                            //add recetteId to body
                                            body: "recetteId=" + <?php echo $recipe->id ?>

                                        })
                                        .then((response) => response.text())
                                        .then((res) => {
                                            likeButton.classList.remove("liked");

                                        });

                                }
                            } else {

                                alert("Vous devez être connecté pour ajouter une recette à vos préférences");

                            }


                        });








                })
                const starsContainer = document.querySelectorAll(".stars");
                starsContainer.forEach((stars) => {
                    const starIcons = stars.querySelectorAll("i");
                    starIcons.forEach((e, i) => {
                        if (!stars.classList.contains("display-only")) {
                            e.addEventListener("click", () => {
                                starIcons.forEach((e, j) => {
                                    if (j <= i) {
                                        e.classList.add("checked");
                                    } else {
                                        e.classList.remove("checked");
                                    }
                                });
                                note = i + 1;

                            });
                            e.addEventListener("mouseover", () => {
                                starIcons.forEach((e, j) => {
                                    if (j <= i) {
                                        e.classList.add("hover");
                                    } else {
                                        e.classList.remove("hover");
                                    }
                                });
                            });
                            e.addEventListener("mouseout", () => {
                                starIcons.forEach((e, j) => {
                                    if (j <= i) {
                                        e.classList.remove("hover");
                                    } else {
                                        e.classList.remove("hover");
                                    }
                                });
                            });
                        }
                    });
                });
                const rateButton = document.querySelector(".rate-btn");
                rateButton.addEventListener("click", () => {
                    fetch("http://localhost/Projet_Final/public/userEdit/isLoggedIn", {
                            method: "GET",
                            headers: {
                                "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
                            },

                        })
                        .then((response) => response.text())
                        .then((res) => {
                            if (JSON.parse(res)) {
                                if (note == 0) {
                                    alert("Vous devez donner une note pour noter cette recette");
                                } else {
                                    fetch("http://localhost/Projet_Final/public/userEdit/rateRecipe", {
                                            method: "POST",
                                            headers: {
                                                "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
                                            },
                                            body: "recetteId=" + <?php echo $recipe->id ?> + "&note=" + `${note}`
                                        })
                                        .then((response) => response.text())
                                        .then((res) => {
                                            alert("Votre note a été ajoutée");
                                        });
                                }

                            } else {
                                alert("Vous devez être connecté pour noter une recette");
                            }

                        })

                });
            </script>
            <?php


            ?>

<?php
        };
        $recipe = $this->recipe;
        $ingList = $this->ingredients;
        $intList = $this->steps;

        $main->displayLayout($recipe->titre, function () use ($recipe, $ingList, $intList) {
            return
                content($recipe, $ingList, $intList);
        });
    }
}
