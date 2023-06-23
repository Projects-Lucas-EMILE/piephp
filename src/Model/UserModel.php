<?php

namespace Model;

use Core\Entity;

class UserModel extends Entity
{
    protected $table = 'user';

    function login()
    {
        $r = $this->find(array(
            'WHERE' => "email = \"{$this->field['email']}\" and password = \"{$this->field['password']}\""
        ));
        return $r['id'] ?? null;
    }
}
