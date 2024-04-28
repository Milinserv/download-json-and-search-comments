<?php

namespace model;
include_once "../model/DB.php";
class Post
{
    public function make($post): array
    {
        $pdo = new DB();
        $sql = "INSERT INTO posts (userId, id, title, body) VALUES (:userId, :id, :title, :body)";
        return $pdo->query($sql, $post);
    }
}