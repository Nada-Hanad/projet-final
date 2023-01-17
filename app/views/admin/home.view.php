<?php
require_once "layout/layout.php";
class HomeView
{
    public function display()
    {
        $main = new AdminLayout();
        function content()
        {

?>
            <div class="home-page">

                <h1>
                    Bienvenue!
                </h1>
                <form name="adminLogin" class="admin-form" method="post">
                    <label>
                        Username
                        <input type="text" placeholder="Username...">
                    </label>
                    <label>
                        Mot de passe

                        <input type="text" placeholder="•••••••">
                    </label>
                    <input class="submit-button" type="button" value="Se connecter" type="submit">

                </form>
            </div>

<?php
        };

        $main->displayLayout("Acceuil", function () {
            return
                content();
        });
    }
}
