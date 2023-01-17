<?php


/**
 * User class
 */
class NotationUtilisateurModel
{

    use Model;

    protected $table = 'NotationUtilisateur';

    protected $allowedColumns = [

        'id_utilisateur',
        'id_recette',
        'note'

    ];
}
