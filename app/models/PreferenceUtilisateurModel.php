<?php


/**
 * User class
 */
class PreferenceUtilisateurModel
{

    use Model;

    protected $table = 'PreferenceUtilisateur';

    protected $allowedColumns = [

        'id_utilisateur',
        'id_recette',

    ];
}
