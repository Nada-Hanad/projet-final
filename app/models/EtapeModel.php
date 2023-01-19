




<?php


/**
 * User class
 */
class EtapeModel
{

    use Model;

    protected $table = 'Etape';

    protected $allowedColumns = [

        'description',
        'ordre',
        'id_recette',
    ];
}
