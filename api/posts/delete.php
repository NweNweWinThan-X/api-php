<?php

include_once "../../api/posts/header.php";
header("Access-Control-Allow-Methods: DELETE");
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
// Set ID to delete
$post->id = $data->id;
// Delete Task
if ($post->delete()) {
    echo json_encode(["message" => "Post Deleted!"]);
} else {
    echo json_encode(["message" => "Post Not Deleted!"]);
}
