<?php


require_once 'Mysql.php';

class Order extends Mysql
{

    // get all
    public function getAll()
    {
        $query = "select * from orders";
        $result =  $this->connection()->query($query);
        $orders = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($orders, $row);
            }
        }
        return $orders;
    }

    // get once
    public function getOne($customerEmail)
    {
        $query = "select * from orders where customerEmail = '$customerEmail' ";
        $result = $this->connection()->query($query);
        $order =  null;
        if ($result->num_rows == 1) {
            $order = $result->fetch_assoc();
        }
        return $order;
    }

    // create
    public function store(array $data)
    {
        $data['customerName'] = mysqli_real_escape_string($this->connection(), $data['customerName']);
        $data['customerEmail'] = mysqli_real_escape_string($this->connection(), $data['customerEmail']);
        $data['customerAddress'] = mysqli_real_escape_string($this->connection(), $data['customerAddress']);

        $query =  "INSERT INTO orders (`customerName`,`customerEmail`,`customerAddress`,`customerPhone`) 
            VALUES ( '{$data['customerName']}' , '{$data['customerEmail']}' , '{$data['customerAddress']}','{$data['customerPhone']}' )";
        $result =  $this->connection()->query($query);
        if ($result == true) {
            return true;
        }
        return false;
    }
}
