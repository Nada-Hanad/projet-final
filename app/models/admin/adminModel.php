<?php


/**
 * User class
 */
class AdminModel
{

    use Model;

    protected $table = 'Admin';

    protected $allowedColumns = [

        'username',
        'mot_de_passe',

    ];
}
