<?php
require_once "shared/mainLayout.php";
require_once "shared/main.php";
class NutritionView
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function display()
    {
        $main = new MainLayout();

        function content($data)
        {
            function ingredientDisplayCard($ingredient)
            {
?>
                <div class="ingredient-card">
                    <div class="ingredient-card-image">
                        <img src="<?php echo $ingredient->image; ?>" alt="">
                    </div>
                    <div class="ingredient-card-content">
                        <h3><?php echo $ingredient->nom; ?></h3>
                        <p><?php echo $ingredient->description; ?></p>
                        <?php if ($ingredient->saison !== "") {
                            echo "<p> Saison:" . $ingredient->saison . "</p>";
                        } ?>
                        <a href="<?php echo ROOT . "/ingredient/" . $ingredient->id  ?>">

                            <input type="button" value="Lire plus">
                        </a>




                    </div>

                </div>
            <?php

            }
            ?>
            <h1 class="news-title">Liste des ingrédients</h1>
            <div class="news-container">

                <?php
                foreach ($data as $ingredient) {

                ?>

                    <?php
                    ingredientDisplayCard($ingredient);
                    ?>

                <?php
                }
                ?>

            </div>
<?php
        };
        $pass = $this->data;
        $main->displayLayout("Nutrition", function () use ($pass) {
            return
                content($pass);
        });
    }
}
