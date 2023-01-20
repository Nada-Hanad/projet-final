<?php
require_once "layout/layout.php";
class HomeView
{
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }
    public function display()
    {

        $main = new AdminLayout();
        function content($data)
        {

?>
            <div class="home-page">

                <h1>
                    Bienvenue!
                </h1>
                <?php
                if (!isset($_SESSION['admin'])) {
                ?>
                    <form action="<?php echo ADMINROOT ?>/home/authAdmin" name="adminLogin" class="admin-form" method="post">
                        <label>
                            Username
                            <input name="username" type="text" placeholder="Username...">
                        </label>
                        <label>
                            Mot de passe
                            <input name="mot_de_passe" type="text" placeholder="•••••••">
                        </label>
                        <button class="submit-button" type="submit">
                            Se connecter
                        </button>

                        <?php
                        if ($data) {
                            echo "<p class='error-message'>" . $data['error'] . "</p>";
                        }
                        ?>
                    </form>
                <?php

                }

                ?>

            </div>

<?php
        };
        $pass = $this->data;


        $main->displayLayout("Acceuil", function () use ($pass) {
            return
                content($pass);
        });
    }
}
