<?php


require_once 'Mysql.php';

class Product extends Mysql
{

    // get all
    public function getAll()
    {
        $query = "select * from products";
        $result =  $this->connection()->query($query);
        $product = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($product, $row);
            }
        }
        return $product;
    }

    // get once
    public function getOne($id)
    {
        $query = "select * from products where product_id = '$id'";
        $result = $this->connection()->query($query);
        $product =  null;
        if ($result->num_rows == 1) {
            $product = $result->fetch_assoc();
        }
        return $product;
    }

    // get by Category
    public function getCat($id)
    {
        $query = "SELECT * FROM `products` WHERE category_id = '$id' ";
        $result =  $this->connection()->query($query);
        $product = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($product, $row);
            }
        }
        return $product;
    }

    // create
    public function store(array $data)
    {
        $data['name'] = mysqli_real_escape_string($this->connection(), $data['name']);
        $data['desc'] = mysqli_real_escape_string($this->connection(), $data['desc']);

        $query =  "INSERT INTO products (`name`,`desc`,`quantity`,`category_id`,img,price,created_At) 
            VALUES ( '{$data['name']}' , '{$data['desc']}' , '{$data['quantity']}','{$data['category_id']}','{$data['img']}' , '{$data['price']}', CURRENT_TIME )";
        $result =  $this->connection()->query($query);
        if ($result == true) {
            return true;
        }
        return false;
    }

    // update 
    public function update($id, array $data)
    {
        $data['name'] = mysqli_real_escape_string($this->connection(), $data['name']);
        $data['desc'] = mysqli_real_escape_string($this->connection(), $data['desc']);

        $query =  "UPDATE products SET 
        `name`=  '{$data['name']}',
        `desc`=  '{$data['desc']}',
        `quantity`= '{$data['quantity']}',
        `category_id`= '{$data['category_id']}',
        `price`= '{$data['price']}'
        WHERE product_id = '$id'";
        $result =  $this->connection()->query($query);
        if ($result == true) {
            return true;
        }
        return false;
    }

    // delete
    public function delete($id)
    {
        $query = "DELETE FROM products where product_id = '$id'";
        $result =  $this->connection()->query($query);
        if ($result == true) {
            return true;
        }
        return false;
    }
}
