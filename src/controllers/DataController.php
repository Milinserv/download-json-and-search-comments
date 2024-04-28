<?php

namespace controllers;

use model\Comment;
use model\Post;

include_once "../model/Post.php";
include_once "../model/Comment.php";

class DataController
{
    private $postsUrl = 'https://jsonplaceholder.typicode.com/posts';
    private $commentsUrl = 'https://jsonplaceholder.typicode.com/comments';
    public function downloadData(): array
    {
        $posts = json_decode(file_get_contents($this->postsUrl), true);
        $comments = json_decode(file_get_contents($this->commentsUrl), true);

        $postsCount = count($posts);
        $commentsCount = count($comments);

        $modelPost = new Post();
        $modelComment = new Comment();

        foreach ($posts as $post) {
            $modelPost->make($post);
        }

        foreach ($comments as $comment) {
            $modelComment->make($comment);
        }

        return array('postsCount' => $postsCount, 'commentsCount' => $commentsCount);
    }
}

header('Content-Type: application/json');
$loader = new DataController();
echo json_encode($loader->downloadData());