<?php
require_once "Ingredient.php";


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
            $ingredientModel = new Ingredient();
            $ingredientName = $ingredientModel->getById($ingredient->id_ingredient);
            $ingredients[$key]->nom = $ingredientName->nom;
        }
        //get recipe steps
        $steps = $this->get_rows("select * from Etape where id_recette = :id", $data);

        return array("recipe" => $recipe, "ingredients" => $ingredients, "steps" => $steps);
    }
}
