<?php
// db connection
require_once __DIR__.'\config.php';
// create api
class API
{
    // fetching data
    public function Select()
    {
        $db = new Connect;
        $tasks = [];
        $data = $db->prepare("select * from tasks order by id");
        $data->execute();
        while ($output = $data->fetch(PDO::FETCH_ASSOC)) {
            $tasks[$output["id"]] = [
                "id" => $output["id"],
                "name" => $output["name"],
                "description" => $output["description"]
            ];
        }
        return json_encode($tasks);
    }
}
$API = new API;
header('Content-Type: application/json');
echo $API->Select();
