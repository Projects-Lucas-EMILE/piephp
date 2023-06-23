<?php

namespace Model;

use Core\Entity;

class MovieModel extends Entity
{
    protected $table = 'movie';

    public function __construct($field = array())
    {
        parent::__construct($field);
        static::addRelation(array('many to many' => 'genre'));
    }
}
