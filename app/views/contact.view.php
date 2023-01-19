<?php
require_once "shared/mainLayout.php";
require_once "shared/main.php";
class ContactView
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

            <div class="contact-page">
                <div class="contact-details">
                    <div class="contact-details-header">
                        <h1>Contactez-nous</h1>
                    </div>
                    <div class="contact-items">
                        <a href="">
                            <div class="contact-item">
                                <i class="fa-brands fa-facebook"></i>
                            </div>
                        </a>
                        <a href="">
                            <div class="contact-item">
                                <i class="fa-brands fa-instagram"></i>

                            </div>
                        </a>
                        <a href="">
                            <div class="contact-item">

                                <i class="fa-brands fa-twitter"></i>

                            </div>
                        </a>
                        <a href="">
                            <div class="contact-item">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                        </a>
                    </div>

                </div>
            </div>


<?php
        };
        $pass = $this->data;
        $main->displayLayout("Contact", function () use ($pass) {
            return
                content($pass);
        });
    }
}
