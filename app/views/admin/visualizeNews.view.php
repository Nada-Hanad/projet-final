<?php
require_once "layout/layout.php";



class VisualizeNewsView
{

    private $data;
    public function __construct($data)
    {


        $this->data = $data;
    }
    public function display()
    {

        $main = new AdminLayout();
        function content(
            $data
        ) {

?>


            <div class="recipe-body">
                <div class="recipe-header">



                    <div class="recipe-title">
                        <div class="title-actions">

                            <h1><?php echo $data->titre ?></h1>


                        </div>
                        <img class="news-image" src="<?php echo $data->image ?>" alt="">

                        <div class="recipe-description">
                            <p><?php echo $data->description ?></p>
                        </div>
                    </div>
                </div>

            </div>


            <?php


            ?>

<?php
        };
        $pass = $this->data;


        $main->displayLayout($this->data->titre, function () use ($pass) {
            return
                content($pass);
        });
    }
}
