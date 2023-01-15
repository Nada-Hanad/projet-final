<?php
require_once  "shared/mainLayout.php";
require_once  "shared/main.php";
class HomeView
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

            $m = new Main();
            $m->Diaporama($data);
            $platsRecipes = [];
            $entreesRecipes = [];
            $dessertsRecipes = [];
            $boissonsRecipes = [];
            foreach ($data as $recipe) {
                switch ($recipe->categorie) {
                    case 'Plats':
                        $platsRecipes[] = $recipe;
                        break;
                    case 'Entrées':
                        $entreesRecipes[] = $recipe;
                        break;
                    case 'Desserts':
                        $dessertsRecipes[] = $recipe;
                        break;
                    case 'Boissons':
                        $boissonsRecipes[] = $recipe;
                        break;
                }
            }


            $m->CategoryDisplay("Entrées", "", $entreesRecipes);
            $m->CategoryDisplay("Plats", "", $platsRecipes);
            $m->CategoryDisplay("Desserts", "", $dessertsRecipes);
            $m->CategoryDisplay("Boissons", "", $boissonsRecipes);
        };
        $main->displayLayout("Acceuil", function () {
            return
                content($this->data);
        });
    }
}
