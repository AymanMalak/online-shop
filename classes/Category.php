<?php


require_once 'Mysql.php';

class Category extends Mysql
{

    // get all
    public function getAll()
    {
        $query = "select * from categories";
        // $result =  $this->connect()->query($query);
        $result =  $this->connection()->query($query);
        $categories = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($categories, $row);
            }
        }
        return $categories;
    }

    // get once
    public function getOne($id)
    {
        $query = "select * from categories where category_id = '$id'";
        $result = $this->connection()->query($query);
        $category =  null;
        if ($result->num_rows == 1) {
            $category = $result->fetch_assoc();
        }
        return $category;
    }

    // create
    public function store(array $data)
    {
        $data['type'] = mysqli_real_escape_string($this->connection(), $data['type']);
        $query =  "INSERT INTO `categories` (`type`) VALUES ( '{$data['type']}' )";

        $result =  $this->connection()->query($query);
        if ($result == true) {
            return true;
        }
        return false;
    }
}
