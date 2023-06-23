<?php

namespace Core;

abstract class Entity
{
    protected static $relations = [];
    protected $field;
    private $orm;

    function __construct($field = array())
    {
        $this->field = $field;
        $this->orm = new ORM();
    }

    protected static function addRelation($relation)
    {
        static::$relations[] = $relation;
    }

    function create()
    {
        $this->orm->create($this->table, $this->field);
    }


    function read($id)
    {
        return $this->orm->read($this->table, $id);
    }

    function update()
    {
        $this->orm->update($this->table, $this->field);
    }

    function delete($id)
    {
        $this->orm->delete($this->table, $id);
    }

    function findAll($params)
    {
        return $this->orm->findAll(self::$relations, $this->table, $params);
    }

    function find($params)
    {
        return $this->orm->find($this->table, $params);
    }
}