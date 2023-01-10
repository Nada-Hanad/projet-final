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
                                        <?php echo $ing->quantity ?> <?php echo $ing->unit ?> <?php echo $ing->title ?>
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
                        <div class="secondary-button">
                            Noter
                        </div>
                    </div>


                </div>
            </div>
            <script src="views/scripts/rating.js"></script>
            <script>
                const likeButton = document.querySelector(".like-action")
                likeButton.addEventListener("click", () => {
                    likeButton.classList.toggle("liked")
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
                                console.log(i + 1); //rating is i+1
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
