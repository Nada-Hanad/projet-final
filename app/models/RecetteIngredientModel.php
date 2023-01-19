




<?php


/**
 * User class
 */
class RecetteIngredientModel
{

    use Model;

    protected $table = 'RecetteIngredient';

    protected $allowedColumns = [

        'id_recette',
        'id_ingredient',
        'quantite',
        'unite',
    ];
}
