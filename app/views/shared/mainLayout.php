<?php
require_once __DIR__ . "/main.php";

class MainLayout extends Main
{
    public function displayLayout($title, $content)
    {
?>
        <?php
        $model = new ParamsModel();
        $params = $model->findAll();

        $mainColor =  $params[1]->valeur;


        $this->Head($title, $mainColor);
        ?>

        <body>
            <?php







            $this->NavBar();
            $content();
            $this->Footer();
            ?>
            <script>
                const sliders = document.querySelectorAll(".slider-container");
                sliders.forEach((s) => {
                    const next = s.querySelector(".control-next-btn");
                    const prev = s.querySelector(".control-prev-btn");
                    prev.addEventListener("click", () => {
                        s.scrollLeft -= 270;
                    });
                    next.addEventListener("click", () => {
                        s.scrollLeft += 270;
                    });
                });
            </script>
        </body>
<?php
    }
}
