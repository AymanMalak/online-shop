<?php


require_once 'Mysql.php';

class OrderDetails extends Mysql
{

    // get all
    public function getAll()
    {
        $query = "select * from orderdetails";
        $result =  $this->connection()->query($query);
        $orderdetails = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($orderdetails, $row);
            }
        }
        return $orderdetails;
    }

    // get once
    public function getOne($id)
    {
        $query = "select * from orderdetails where id = '$id'";
        $result = $this->connection()->query($query);
        $orderdetail =  null;
        if ($result->num_rows == 1) {
            $orderdetail = $result->fetch_assoc();
        }
        return $orderdetail;
    }

    // create
    public function store(array $data)
    {

        $query =  "INSERT INTO orderdetails (`order_id`,`product_id`,`priceEach`) 
            VALUES ( '{$data['order_id']}' , '{$data['product_id']}' , '{$data['priceEach']}')";
        $result =  $this->connection()->query($query);
        if ($result == true) {
            return true;
        }
        return false;
    }
}
