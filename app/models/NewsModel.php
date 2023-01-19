<?php


/**
 * User class
 */
class NewsModel
{

    use Model;

    protected $table = 'News';

    protected $allowedColumns = [

        'titre',
        'description',
        'image',
        'video',

    ];
}
