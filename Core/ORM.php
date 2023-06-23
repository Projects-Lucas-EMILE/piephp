<?php

namespace Core;

use PDO;

class ORM
{
    private $db;

    function __construct()
    {
        $this->db = new Database;
        $this->db->connect_to_db();
    }

    public function create($table, $fields)
    {
        $keys = array_keys($fields);
        $values = array_values($fields);
        $columns = implode(',', $keys);
        $placeholders = implode(',', array_fill(0, count($keys), '?'));
        $stmt = $this->db->prepare("INSERT INTO $table ($columns) VALUES ($placeholders)");
        $stmt->execute($values);
    }

    public function read($table, $id)
    {
        $stmt = $this->db->prepare("SELECT * FROM $table WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function login($table, $field)
    {
        $stmt = $this->db->prepare("SELECT * FROM $table WHERE email = :email AND password = :password");
        $stmt->execute($field);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['id'] ?? null;
    }


    public function update($table, $field)
    {
        $stmt = $this->db->prepare("UPDATE $table SET email = :email, password = :password WHERE id = :id");
        return $stmt->execute($field);
    }

    public function delete($table, $id)
    {
        $stmt = $this->db->prepare("DELETE FROM $table WHERE id = ?");
        return $stmt->execute([$id]);
    }

    private function findById($field, $id)
    {
        $i = 0;
        foreach ($field as $element) {
            if ($element["id"] == $id) {
                return $i;
            }
            $i++;

        }
        return -1;
    }

    public function findAll($relation, $table, $params = [])
    {
        $where = isset($params['WHERE']) ? "WHERE " . $table . "." . $params['WHERE'] : '';
        $order_by = isset($params['ORDER BY']) ? "ORDER BY " . $table . "." . $params['ORDER BY'] : '';
        $limit = isset($params['LIMIT']) ? $params['LIMIT'] : '';

        $stmt = $this->db->prepare("SELECT * FROM $table $where $order_by $limit");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($relation as $array) {
            foreach ($array as $key => $value) {
                if ($key === 'many to one') {
                    $stmt = $this->db->prepare("SELECT * FROM $value");
                    $stmt->execute();
                    $resultRelation = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($resultRelation as $item) {
                        $tableId = $item["id_{$table}"];
                        $indexToInsert = $this->findById($result, $tableId);

                        if ($indexToInsert >= 0) {
                            $result[$indexToInsert][$value][] = $item;
                        }
                    }
                } else if ($key === 'one to many') {
                    $stmt = $this->db->prepare("SELECT * FROM $value");
                    $stmt->execute();
                    $resultRelation = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($result as &$item) {
                        $valueId = $item["id_{$value}"];
                        $valueIndex = $this->findById($resultRelation, $valueId);

                        if ($valueIndex >= 0) {
                            $item[$value] = $resultRelation[$valueIndex];
                        }
                    }
                } else if ($key === 'many to many') {
                    $table_join = ($table > $value) ? "{$table}_{$value}" : "{$value}_{$table}";
                    $stmt = $this->db->prepare("SELECT id_{$table}, $value.* FROM {$table_join} LEFT JOIN $value ON {$table_join}.id_{$value} = $value.id");
                    $stmt->execute();
                    $resultJoin = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($resultJoin as $item) {
                        $tableId = $item["id_{$table}"];
                        $indexToInsert = $this->findById($result, $tableId);

                        if ($indexToInsert >= 0) {
                            unset($item["id_{$table}"]);
                            $result[$indexToInsert][$value][] = $item;
                        }
                    }
                }
            }
        }
        return $result;
    }

    public function find($table, $params = '')
    {
        $where = isset($params['WHERE']) ? "WHERE " . $params['WHERE'] : '';
        $order_by = isset($params['ORDER BY']) ? "ORDER BY " . $table . "." . $params['ORDER BY'] : '';
        $limit = isset($params['ORDER BY']) ? $params['LIMIT'] : '';
        $stmt = $this->db->prepare("SELECT * FROM $table $where $order_by $limit");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
