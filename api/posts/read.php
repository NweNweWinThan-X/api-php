<?php

include_once "../../api/posts/header.php";
include_once '../../config/Database.php';
include_once '../../models/Post.php';

// Instantiate DB connect
$database = new Database();
$db = $database->connect();
// Instantiate Post
$post = new Post($db);
$result = $post->read(); // fetch data
$num = $result->rowCount(); // get row count
if ($num > 0) {
    $postArr['data'] = $postArr = [];
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $postItems = [
            'id' => $id,
            'name' => $name,
            'description' => $description
        ];
        // push data
        array_push($postArr['data'], $postItems);
    }
    echo json_encode($postArr);
} else {
    echo json_encode(['message' => "No Tasks Found!"]);
}
