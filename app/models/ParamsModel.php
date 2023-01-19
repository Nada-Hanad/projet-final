<?php


/**
 * User class
 */
class ParamsModel
{

    use Model;

    protected $table = 'AdminParams';

    protected $allowedColumns = [

        'nom',
        'valeur',


    ];
}
