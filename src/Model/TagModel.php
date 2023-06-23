<?php

namespace Model;

use Core\Entity;

class TagModel extends Entity
{
    protected $table = 'tag';

    public function __construct($field = array())
    {
        parent::__construct($field);
        static::addRelation(array('many to many' => 'article'));
    }
}