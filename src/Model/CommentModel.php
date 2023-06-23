<?php

namespace Model;

use Core\Entity;

class CommentModel extends Entity
{
    protected $table = 'comment';

    public function __construct($field = array())
    {
        parent::__construct($field);
        static::addRelation(array('many to one' => 'article'));
    }
}
