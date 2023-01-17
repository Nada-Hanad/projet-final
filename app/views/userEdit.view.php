<?php
require_once "shared/mainLayout.php";
require_once "shared/main.php";
class UserEditView
{
    private $data;
    public function __construct($data)
    {
        if (count($data) == 0) {
            $data = array(
                "errors" => array(),
            );
        }
        $this->data = $data;
    }
    public function display()
    {
        $main = new MainLayout();

        function content($data)
        {

?>
            <?php

            if (isset($_SESSION["user"])) {
            ?>
                <div class="edit-user">

                    <form action="<?php echo ROOT . "/userEdit/editUser" ?>" class="modify-info" method="post">


                        <div class="input-group">
                            <i class='bx bxs-user'></i>
                            <input name="nom" type="text" placeholder="Nom complet" value=" <?php echo $_SESSION["user"]->nom ?>">
                        </div>
                        <div class="input-group">
                            <i class='bx bx-mail-send'></i>
                            <input name="email" type="email" placeholder="Email" value=" <?php echo $_SESSION["user"]->email ?>">
                        </div>
                        <div class=" input-group">
                            <i class='bx bx-mail-send make-grey'></i>
                            <input type="date" class="form-control" id="date-naissance" name="date_de_naissance" placeholder="Date de naissance" value="<?php echo $_SESSION["user"]->date_naissance ?>">
                        </div>




                        <div class=" well">
                        </div>
                        <div class="input-group">
                            <i class='bx bxs-lock-alt'></i>
                            <input name="password" type="password" placeholder="Mot de passe" value="">
                        </div>


                        <p>
                            <span class="error-text">

                                <?php

                                if (count($data["errors"]) > 0) {
                                    echo '<i class="fa-solid fa-triangle-exclamation error-icon"></i>';
                                    echo $data["errors"][0];
                                    echo "</br>";
                                }
                                ?>
                            </span>
                        </p>
                        <input name="modify-btn" class="modify-btn" type="submit" value="Sauvegarder">


                    </form>
                </div>

            <?php
            } else {
                header("Location: " . ROOT . "/authentication");
            }
            ?>




<?php
        };
        $pass = $this->data;

        $main->displayLayout("Modifier profile", function () use ($pass) {
            return
                content($pass);
        });
    }
}
