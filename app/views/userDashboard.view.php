<?php
require_once "shared/mainLayout.php";
require_once "shared/main.php";
class UserDashboardView
{
    public function display()
    {
        $main = new MainLayout();
        function content()
        {

?>
     
<?php
        };

        $main->displayLayout("Tableau de bord", function () {
            return
                content();
        });
    }
}
