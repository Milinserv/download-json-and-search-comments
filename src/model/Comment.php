<?php

namespace model;
include_once "../model/DB.php";
class Comment
{
    public function make($comment): array
    {
        $pdo = new DB();
        $sql = "INSERT INTO comments (postId, id, name, email, body) VALUES (:postId, :id, :name, :email, :body)";
        return $pdo->query($sql, $comment);
    }
    public function getComments($search): array
    {
        $pdo = new DB();
        $sql = "SELECT * FROM comments WHERE body LIKE :body";
        return $pdo->getRow($sql, 'body', $search);
    }
}