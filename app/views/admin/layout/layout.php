<?php

class AdminLayout
{
    public function Head($title)
    {
?>

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="pragma" content="no cache" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="<?php echo "http://localhost/Projet_Final/admin" ?>/assets/css/style.css">
            <link rel="stylesheet" href="<?php echo ROOT ?>/assets/css/style.css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <style>

            </style>
            <title> <?php echo $title ?> </title>
        </head>

    <?php

    }
    public function NavBar()
    {
    ?>
        <nav>
            <ul>
                <li>
                    <a href="http://localhost/Projet_Final/admin/recipes">
                        Recettes
                    </a>
                </li>
                <li>
                    <a href="http://localhost/Projet_Final/admin/news">
                        News
                    </a>
                </li>
                <li>
                    <a href="http://localhost/Projet_Final/admin/users">
                        Utilisateurs
                    </a>
                </li>
                <li>
                    <a href="http://localhost/Projet_Final/admin/nutrition">
                        Nutrition
                    </a>
                </li>
                <li>
                    <a href="http://localhost/Projet_Final/admin/params">
                        Paramètres
                    </a>
                </li>
                <li>
                    <?php
                    if (isset($_SESSION['admin'])) {
                        echo '<a href="http://localhost/Projet_Final/admin/home/logout">
                <i class="fa-solid fa-arrow-right-from-bracket logout-icon"></i>
                </a>';
                    }
                    ?>
                </li>
            </ul>






        </nav>


    <?php
    }
    public function displayLayout($title, $content)
    {
    ?>
        <?php $this->Head($title); ?>

        <body>
            <?php

            $this->NavBar();
            $content();

            ?>

        </body>
<?php
    }
}
