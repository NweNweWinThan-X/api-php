<?php
class Post
{
    // DB staff
    private $connection;
    private $table = "tasks";

    // Tasks properties
    public $id;
    public $name;
    public $description;

    // Constructor with DB
    public function __construct($db)
    {
        $this->connection = $db;
    }

    // Get Tasks
    public function read()
    {
        $query = "select * from " . $this->table . " order by id";
        $dbStatement = $this->connection->prepare($query);
        $dbStatement->execute();
        return $dbStatement;
    }

    // Get Single Task
    public function readById()
    {
        $query = "select * from " . $this->table . " t where t.id = ? limit 0,1";
        $dbStatement = $this->connection->prepare($query);
        $dbStatement->bindParam(1, $this->id); // Bind ID
        $dbStatement->execute();
        $row = $dbStatement->fetch(PDO::FETCH_ASSOC);
        // Set properties
        $this->name = $row["name"];
        $this->description = $row["description"];
    }

    // Create Task
    public function create()
    {
        $query = "insert into " . $this->table .
                " set name = :name, 
                description = :description ";
        // $query = "INSERT INTO " . $this->table . " (name, description) VALUES (:name, :description)";
        $dbStatement = $this->connection->prepare($query);
        // Clean data
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->description = htmlspecialchars(strip_tags($this->description));
        // Bind ID
        $dbStatement->bindParam(":name", $this->name);
        $dbStatement->bindParam(":description", $this->description);
        if ($dbStatement->execute()) {
            return true;
        }
        // Print error if something is wrong
        printf("Error: %s. \n", $dbStatement->error);
        return false;
    }

    // Update Task
    public function update()
    {
        $query = "update " . $this->table .
                    " set name = :name, 
                    description = :description 
                    where id = :id";
        $dbStatement = $this->connection->prepare($query);
        // Clean data
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->id = htmlspecialchars(strip_tags($this->id));
        // Bind ID
        $dbStatement->bindParam(":name", $this->name);
        $dbStatement->bindParam(":description", $this->description);
        $dbStatement->bindParam(":id", $this->id);
        if ($dbStatement->execute()) {
            return true;
        }
        // Print error if something is wrong
        printf("Error: %s. \n", $dbStatement->error);
        return false;
    }

    // Delete Task
    public function delete()
    {
        $query = "delete from " . $this->table . " where id = :id";
        $dbStatement = $this->connection->prepare($query);
        // Clean data
        $this->id = htmlspecialchars(strip_tags($this->id));
        // Bind ID
        $dbStatement->bindParam(":id", $this->id);
        if ($dbStatement->execute()) {
            return true;
        }
        // Print error if something is wrong
        printf("Error: %s. \n", $dbStatement->error);
        return false;
    }
}
