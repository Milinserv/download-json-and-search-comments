<?php

namespace controllers;

use model\Comment;
include_once "../model/Comment.php";

class SearchController
{
    function search($search): array
    {
        $model = new Comment();
        return array('found' => $model->getComments($search));
    }
}

header('Content-Type: application/json');
$found = new SearchController();
echo json_encode($found->search($_POST['search']));