<?php

namespace Model;

use Core\Entity;

class GenreModel extends Entity
{
    protected $table = 'genre';

    public function __construct($field = array())
    {
        parent::__construct($field);
        static::addRelation(array('one to many' => 'movie'));
    }
}
