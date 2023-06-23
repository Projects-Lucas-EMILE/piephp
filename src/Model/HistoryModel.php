<?php

namespace Model;

use Core\Entity;

class HistoryModel extends Entity
{
    protected $table = 'membership_log';

    public function __construct($field = array())
    {
        parent::__construct($field);
        static::addRelation(array('one to many' => 'movie'));
    }
}
