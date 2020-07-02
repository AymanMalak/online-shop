<?php


require_once 'Mysql.php';

class Contact extends Mysql
{

    // Store
    public function store(array $data)
    {
        $data['fname'] = mysqli_real_escape_string($this->connection(), $data['fname']);
        $data['lname'] = mysqli_real_escape_string($this->connection(), $data['lname']);
        $data['email'] = mysqli_real_escape_string($this->connection(), $data['email']);
        $data['message'] = mysqli_real_escape_string($this->connection(), $data['message']);

        $query =  "INSERT INTO `contact`( `fname`, `lname`, `email`, `message`)  
            VALUES ( '{$data['fname']}' , '{$data['lname']}' , '{$data['email']}','{$data['message']}' )";
        $result =  $this->connection()->query($query);
        if ($result == true) {
            return true;
        }
        return false;
    }
}
