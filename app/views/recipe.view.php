<?php
require_once "shared/mainLayout.php";
require_once "shared/main.php";
$recipe = (object) [
    'id' => 1,
    'video' => '',
    'title' => 'Recipe Title1',
    'description' => 'Recipe description : Lorem ipsum dolor sit amet, consectetur adipisicing elit. A nihil doloremque pariatur. Aperiam sit facilis quisquam deleniti fugiat nemo explicabo?',
    'image' => 'https://images.unsplash.com/photo-1466637574441-749b8f19452f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8cmVjaXBlfGVufDB8MnwwfHw%3D&auto=format&fit=crop&w=800&q=60',
    'category' => 1
];
$ingList = array(
    (object) [
        'id' => 1,
        'title' => 'e1',
        'quantity' => 200,
        'unit' => 'g',

    ],
    (object) [
        'id' => 1,
        'title' => 'e2',
        'quantity' => 200,
        'unit' => 'g',

    ],
    (object) [
        'id' => 1,
        'title' => 'e3',
        'quantity' => 200,
        'unit' => 'g',

    ],


);
$intList = array(
    (object) [
        'id' => 1,
        'description' => 'wwww',
    ],
    (object) [
        'id' => 1,
        'description' => 'wwww',
    ],
    (object) [
        'id' => 1,
        'description' => 'wwww',
    ],


);
class RecipeView
{
    private $recipe;
    private $ingredients;
    private $steps;
    public function __construct($r, $i, $s)
    {

        $this->recipe = $r;
        $this->ingredients = $i;
        $this->steps = $s;
    }
    public function displayRecipePage()
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

                            <h1><?php echo $recipe->title ?></h1>
                            <div class="actions">
                                <div class="like-action">
                                    <i class="fas fa-heart"></i>
                                </div>
                            </div>

                        </div>
                        <div class="notation">
                            <div class="stars display-only">
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
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
                            <p>30 MIN</p>
                        </div>
                        <div class="separator"></div>
                        <div class="detail-container">
                            <div class="d-h">
                                <i class="fa-regular fa-clock"></i>
                                <p>T. CUISSANT</p>
                            </div>
                            <p>30 MIN</p>
                        </div>
                        <div class="separator"></div>

                        <div class="detail-container">
                            <div class="d-h">
                                <i class="fa-regular fa-clock"></i>
                                <p>T. REPOS</p>
                            </div>
                            <p>30 MIN</p>
                        </div>
                        <div class="separator"></div>

                        <div class="detail-container">
                            <div class="d-h">
                                <i class="fa-regular fa-clock"></i>
                                <p>T. TOTAL</p>
                            </div>
                            <p>30 MIN</p>
                        </div>
                        <div class="separator"></div>

                        <div class="detail-container">
                            <div class="d-h">
                                <i class="fa-brands fa-gripfire"></i>
                                <p>NB. CALORIES</p>
                            </div>
                            <p>30 </p>
                        </div>
                        <div class="separator"></div>

                        <div class="detail-container">
                            <div class="d-h">
                                <i class="fa-solid fa-users"></i>
                                <p>NB. PERSONNES</p>
                            </div>
                            <p>30 </p>
                        </div>
                        <div class="separator"></div>

                        <div class="detail-container">
                            <div class="d-h">
                                <i class="fa-regular fa-circle-up"></i>
                                <p>DIFFICULTÉ</p>
                            </div>
                            <p>30 </p>
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

        $main->displayLayout($this->recipe->title, function () use ($recipe, $ingList, $intList) {
            return
                content($recipe, $ingList, $intList);
        });
    }
}





$view = new RecipeView($recipe, $ingList, $intList);
$view->displayRecipePage();
