<?php

include_once "../../api/posts/header.php";
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");

include_once "../../config/Database.php";
include_once "../../models/Post.php";

// Instantiate DB connect
$database = new Database();
$db = $database->connect();
// Instantiate Post
$post = new Post($db);
// Get raw posted data
$data = json_decode(file_get_contents("php://input"));
// Set ID to update
$post->id = $data->id;
$post->name = $data->name;
$post->description = $data->description;
// Update Task
if ($post->update()) {
    echo json_encode(["message" => "Post Updated!"]);
} else {
    echo json_encode(["message" => "Post Not Updated!"]);
}
