<?php


/**
 * User class
 */
class RecipeModel
{
    use Model;

    protected $table = 'Recette';

    protected $allowedColumns = [
        'titre',
        'description',
        'image',
        'creator_id',
        'video',
        'categorie',
        'temps_preparation',
        'temps_cuisson',
        'temps_repos',
        'difficulte',
        'categorie',
        'notation',
        'etat',
        'healthy',
        "calories",
    ];
    public function getRecipeById($id)
    {
        $query = "select * from $this->table where id = :id";
        $data = array("id" => $id);
        //get its ingredients
        $recipe = $this->get_row($query, $data);
        $query2 = "select * from RecetteIngredient where id_recette = :id";
        $ingredients = $this->get_rows($query2, $data);

        //get ingredients titles from ingredients
        foreach ($ingredients as $key => $ingredient) {
            $ingredientModel = new IngredientModel();
            $ingredientName = $ingredientModel->getById($ingredient->id_ingredient);
            $ingredients[$key]->nom = $ingredientName->nom;
        }
        //get recipe steps
        $steps = $this->get_rows("select * from Etape where id_recette = :id", $data);

        return array("recipe" => $recipe, "ingredients" => $ingredients, "steps" => $steps);
    }
    public function getRecipeByCreatorId($id)
    {
        $query = "select * from $this->table where creator_id = :id";
        $data = array("id" => $id);
        //get its ingredients
        $recipe = $this->get_rows($query, $data);
        return $recipe;
    }
    public function getRecipesByCategory($categorie)
    {
        $query = "select * from $this->table where categorie = :categorie";
        $data = array("categorie" => $categorie);
        $recipes = $this->get_rows($query, $data);
        return $recipes;
    }
    // $query = "select * from $this->table where ";
    // $data = array();
    // $i = 0;
    // if (isset($_POST['hiver'])) {
    //     $query .= "hiver = :hiver";
    //     $data['hiver'] = 1;
    //     $i++;
    // }
    // if (isset($_POST['printemps'])) {
    //     if ($i > 0) {
    //         $query .= " and ";
    //     }
    //     $query .= "printemps = :printemps";
    //     $data['printemps'] = 1;
    //     $i++;
    // }
    // if (isset($_POST['ete'])) {
    //     if ($i > 0) {
    //         $query .= " and ";
    //     }
    //     $query .= "ete = :ete";
    //     $data['ete'] = 1;
    //     $i++;
    // }
    // if (isset($_POST['automne'])) {
    //     if ($i > 0) {
    //         $query .= " and ";
    //     }
    //     $query .= "automne = :automne";
    //     $data['automne'] = 1;
    //     $i++;
    // }
    // if (isset($_POST['calorie-min']) && isset($_POST['calorie-max'])) {
    //     if ($i > 0) {
    //         $query .= " and ";
    //     }
    //     $query .= "calorie between :calorie-min and :calorie-max";
    //     $data['calorie-min'] = $_POST['calorie-min'];
    //     $data['calorie-max'] = $_POST['calorie-max'];
    //     $i++;
    // }
    // if (isset($_POST['temps-preparation-min']) && isset($_POST['temps-preparation-max'])) {
    //     if ($i > 0) {
    //         $query .= " and ";
    //     }
    //     $query .= "temps_preparation between :temps-preparation-min and :temps-preparation-max";
    //     $data['temps-preparation-min'] = $_POST['temps-preparation-min'];
    //     $data['temps-preparation-max'] = $_POST['temps-preparation-max'];
    //     $i++;
    // }
    // if (isset($_POST['temps-cuisson-min']) && isset($_POST['temps-cuisson-max'])) {
    //     if ($i > 0) {
    //         $query .= " and ";
    //     }
    //     $query .= "temps_cuisson between :temps-cuisson-min
    //     and :temps-cuisson-max";
    //     $data['temps-cuisson-min'] = $_POST['temps-cuisson-min'];
    //     $data['temps-cuisson-max'] = $_POST['temps-cuisson-max'];
    //     $i++;
    // }
    // if (isset($_POST['temps-repos-min']) && isset($_POST['temps-repos-max'])) {
    //     if ($i > 0) {
    //         $query .= " and ";
    //     }
    //     $query .= "temps_repos between :temps-repos-min and :temps-repos-max";
    //     $data['temps-repos-min'] = $_POST['temps-repos-min'];
    //     $data['temps-repos-max'] = $_POST['temps-repos-max'];
    //     $i++;
    // }
    // if (isset($_POST['difficulte'])) {
    //     if ($i > 0) {
    //         $query .= " and ";
    //     }
    //     $query .= "difficulte = :difficulte";
    //     $data['difficulte'] = $_POST['difficulte'];
    //     $i++;
    // }
    // if (isset($_POST['healthy'])) {
    //     if ($i > 0) {
    //         $query .= " and ";
    //     }
    //     $query .= "healthy = :healthy";
    //     $data['healthy'] = $_POST['healthy'];
    //     $i++;
    // }
    // if (isset($_POST['categorie'])) {
    //     if ($i > 0) {
    //         $query .= " and ";
    //     }
    //     $query .= "categorie = :categorie";
    //     $data['categorie'] = $_POST['categorie'];
    //     $i++;
    // }


    public function filter()
    {
        echo "hh";
    }
}
