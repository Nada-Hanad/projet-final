<?php
require_once "shared/mainLayout.php";
require_once "shared/main.php";
class NewsView
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
            <h1 class="news-title">News</h1>
            <div class="news-container">

                <?php
                foreach ($data as $news) {
                    $m = new MainLayout();
                ?>

                    <?php
                    $m->NewsCard($news->titre, $news->description, $news->image, $news->id);
                    ?>

                <?php
                }
                ?>

            </div>
<?php
        };
        $pass = $this->data;
        $main->displayLayout("News", function () use ($pass) {
            return
                content($pass);
        });
    }
}
