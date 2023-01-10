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
    ];
}
