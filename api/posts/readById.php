<?php

include_once "../../api/posts/header.php";
include_once '../../config/Database.php';
include_once '../../models/Post.php';

// Instantiate DB connect
$database = new Database();
$db = $database->connect();
// Instantiate Post
$post = new Post($db);
// Get ID
$post->id = isset($_GET['id']) ? $_GET['id'] : die();
$post->readById();
$postArr = [
    'id' => $post->id,
    'name' => $post->name,
    'description' => $post->description
];
// Make Json
print_r(json_encode($postArr));
