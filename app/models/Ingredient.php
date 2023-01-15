<?php


/**
 * User class
 */
class Ingredient
{

    use Model;

    protected $table = 'Ingredient';

    protected $allowedColumns = [

        'nom',
        'description',
        'image',
    ];
}
