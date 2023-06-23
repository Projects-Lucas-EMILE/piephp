<?php

namespace Model;

use Core\Entity;

class ArticleModel extends Entity
{
    protected $table = 'article';

    public function __construct($field = array())
    {
        parent::__construct($field);
        static::addRelation(array('one to many' => 'comment', 'many to many' => 'tag'));
    }
}
