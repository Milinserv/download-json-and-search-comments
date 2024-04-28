<?php

namespace model;

use PDO;

class DB
{
    private $db;

    public function __construct()
    {
        $config = require '../../configDB/config.php';
        $this->db = new PDO('mysql:host=' . $config['db_host'] . ';dbname=' . $config['db_name'], $config['db_user'], $config['db_pass']);
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);

        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
        }

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAll($table, $sql = '', $params = [])
    {
        return $this->query("SELECT * FROM $table" . $sql, $params);
    }

    public function getRow($sql, $field, $param)
    {
        $stmt = $this->db->prepare($sql);

        $stmt->execute(array(":$field" => '%'.$param.'%'));

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}