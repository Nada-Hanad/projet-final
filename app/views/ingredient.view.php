<?php
require_once "shared/mainLayout.php";
require_once "shared/main.php";
class IngredientView
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

?>
            <div class="ingredient-page">
                <h1>
                    <?php echo $data->nom; ?>
                </h1>
                <div class="ing-head">

                    <img src="<?php echo $data->image; ?>" alt="">
                    <p>
                        <?php echo $data->description; ?>
                    </p>
                </div>
                <p class="season"><span>
                        Saison naturelle :

                    </span> <?php if ($data->saison == "") {
                                echo "Disponible tout le temps";
                            } else {
                                echo $data->saison;
                            }

                            ?></p>
                <!-- <?php if ($data->healthy) {
                            echo '
                    <i class="fa-solid fa-heart-circle-check"></i>
                    <p class="healthy">Ingrédient sain</p>';
                        } ?> -->




            </div>

<?php
        };
        $pass = $this->data;

        $main->displayLayout($this->data->nom, function () use ($pass) {
            return
                content($pass);
        });
    }
}
