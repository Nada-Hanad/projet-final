<?php
require_once "shared/mainLayout.php";
require_once "shared/main.php";
class AuthenticationView
{

    public function display()
    {
        function content()
        {


?>

            <div id="container" class="container">
                <!-- FORM SECTION -->
                <div class="row">
                    <!-- SIGN UP -->
                    <div class="col align-items-center flex-col sign-up">
                        <div class="form-wrapper align-items-center">
                            <div class="form sign-up">
                                <div class="input-group">
                                    <i class='bx bxs-user'></i>
                                    <input type="text" placeholder="Nom complet">
                                </div>
                                <div class="input-group">
                                    <i class='bx bx-mail-send'></i>
                                    <input type="email" placeholder="Email">
                                </div>
                                <div class="input-group">
                                    <i class='bx bx-mail-send'></i>
                                    <input type="date" class="form-control" id="date-naissance" placeholder="Date de naissance">
                                </div>


                                <div class="well">
                                </div>
                                <div class="input-group">
                                    <i class='bx bxs-lock-alt'></i>
                                    <input type="password" placeholder="Mot de passe">
                                </div>
                                <div class="input-group">
                                    <i class='bx bxs-lock-alt'></i>
                                    <input type="password" placeholder="Confirmer le mot de passe">
                                </div>
                                <button>
                                    Créer
                                </button>
                                <p>
                                    <span>
                                        Vous avez déja un compte?
                                    </span>
                                    <b onclick="toggle()" class="pointer">
                                        se connecter
                                    </b>
                                </p>
                            </div>
                        </div>

                    </div>
                    <!-- END SIGN UP -->
                    <!-- SIGN IN -->
                    <div class="col align-items-center flex-col sign-in">
                        <div class="form-wrapper align-items-center">
                            <div class="form sign-in">
                                <div class="input-group">
                                    <input type="text" placeholder="Email">
                                </div>
                                <div class="input-group">
                                    <input type="password" placeholder="Mot de passe">
                                </div>
                                <button>
                                    Se connecter
                                </button>
                                <p>
                                    <b>
                                        Mot de passe oublié?
                                    </b>
                                </p>
                                <p>
                                    <span>
                                        Vous n'avez pas un compte?
                                    </span>
                                    <b onclick="toggle()" class="pointer">
                                        Créer votre compte!
                                    </b>
                                </p>
                            </div>
                        </div>
                        <div class="form-wrapper">

                        </div>
                    </div>
                    <!-- END SIGN IN -->
                </div>
                <!-- END FORM SECTION -->
                <!-- CONTENT SECTION -->
                <div class="row content-row">
                    <!-- SIGN IN CONTENT -->
                    <div class="col align-items-center flex-col">
                        <div class="text sign-in">
                            <h2>
                                Welcome User!
                            </h2>

                        </div>
                        <div class="img sign-in">

                        </div>
                    </div>
                    <!-- END SIGN IN CONTENT -->
                    <!-- SIGN UP CONTENT -->
                    <div class="col align-items-center flex-col">
                        <div class="img sign-up">

                        </div>
                        <div class="text sign-up">
                            <h2>
                                Créer votre compte!
                            </h2>

                        </div>
                    </div>
                    <!-- END SIGN UP CONTENT -->
                </div>

                <!-- END CONTENT SECTION -->
            </div>

            <script>
                let container = document.getElementById("container");

                toggle = () => {
                    container.classList.toggle("sign-in");
                    container.classList.toggle("sign-up");
                };

                setTimeout(() => {
                    container.classList.add("sign-in");
                }, 200);
            </script>



<?php
        };


        $main = new MainLayout();
        $main->displayLayout("Acceuil", function () {
            return
                content();
        });
    }
}
