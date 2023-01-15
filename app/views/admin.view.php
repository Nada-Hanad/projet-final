<?php
require_once  "shared/mainLayout.php";
require_once  "shared/main.php";
class AdminView
{
    public function display()
    {
        $main = new MainLayout();
        function content()
        {
?>
            <div class="">
                hhehe

            </div>
<?php
        };
        $main->displayLayout("Not Found", function () {
            return
                content();
        });
    }
}
