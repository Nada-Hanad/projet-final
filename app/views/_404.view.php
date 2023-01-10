<?php
require_once  "shared/mainLayout.php";
require_once  "shared/main.php";
class _404View
{
    public function display()
    {
        $main = new MainLayout();
        function content()
        {
?>
            <div class="_404">
                <h1>Oops cette information n'existe pas</h1>
                <p>La page que vous recherchez n'existe pas</p>

            </div>
<?php
        };
        $main->displayLayout("Not Found", function () {
            return
                content();
        });
    }
}
