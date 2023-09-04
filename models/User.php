<?php

namespace models;

use Core\Database;

class User
{
    protected Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getById($id)
    {
        return $this->db->query('select * from users where id = :id', ['id' => $id])->find();
    }
}
