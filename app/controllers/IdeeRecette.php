<?php

/**
 * home class
 */
class IdeeRecette
{
    use Controller;

    public function index()
    {

        $model = new RecipeModel();

        $data  = $model->findAll();
        $ingModel = new IngredientModel;
        $ing = $ingModel->findAll();
        $result["ingredients"] = $ing;
        $result['recipes'] = $data;

        if (is_array($data)) {
            if (count($data) > 0) {
                $this->view('ideeRecette',  $result);
            }
        } else {

            $this->view('ideeRecette', array());
        }
    }
    public function findRecipes()
    {
        $requestedIngredients = array();
        $nbIngredients = $_POST["nbIngredients"];
        for ($i = 0; $i < $nbIngredients; $i++) {
            $requestedIngredients[] = $_POST["ingredient" . $i];
        }

        $recetteIngredientModel = new RecetteIngredientModel();
        $result = array();
        $recipeIds = array();
        foreach ($requestedIngredients as $r) {
            $data['id_ingredient'] = $r;
            $result = $recetteIngredientModel->where($data);

            if (is_array($result) && count($result)) {

                foreach ($result as $r) {
                    array_push($recipeIds, $r->id_recette);
                }
            }
        }

        //get frequency of each recipe id
        $recipeIds = array_count_values($recipeIds);
        //get recipes with the highest frequency
        $max = max($recipeIds);
        $recipes = array();
        foreach ($recipeIds as $key => $value) {
            if ($value == $max) {
                $recipes[] = $key;
            }
        }
        $model = new RecipeModel();
        $data = array();
        foreach ($recipes as $r) {
            array_push($data, $model->getRecipeById($r));
        }
        $recipesArra = array();
        if (is_array($data) && count($data) > 0) {
            foreach ($data as $d) {
                $recipesArra[] = $d['recipe'];
            }
        }

        $result['recipes'] = $recipesArra;
        $ingModel = new IngredientModel;
        $ing = $ingModel->findAll();
        $result["ingredients"] = $ing;

        $this->view('ideeRecette',  $result);
    }
}
