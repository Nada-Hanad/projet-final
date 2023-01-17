<?php


/**
 * User class
 */
class IngredientModel
{

    use Model;

    protected $table = 'Ingredient';

    protected $allowedColumns = [

        'nom',
        'description',
        'image',
    ];
}
