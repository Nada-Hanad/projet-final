<?php
require_once "shared/mainLayout.php";
require_once "shared/main.php";


class NewsDisplayView
{
    private $data;

    public function __construct($data)
    {


        $this->data = $data;
    }
    public function display()
    {

        $main = new MainLayout();
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
                <div class="recipe-content">

                    <?php
                    if (!$data->video == "") {
                    ?>
                        <video src="<?php echo $data->video ?>" poster="<?php echo $data->image ?>" controls></video>
                    <?php
                    }

                    ?>



                </div>
            </div>



<?php
        };
        $data = $this->data;


        $main->displayLayout($data->titre, function () use ($data) {
            return
                content($data);
        });
    }
}
