<?php

require_once 'Mysql.php';

class Admin extends Mysql
{
    public function attempt($email, $password)
    {
        $query = "SELECT * FROM admins WHERE email = '$email' and `password`= '$password' ";
        $result = $this->connection()->query($query);
        $user = null;
        if ($result->num_rows == 1) {
            // $id =  $result->fetch_assoc()['id']; fo2 yb2a select id bs 
            $user =  $result->fetch_assoc();
        }
        return $user;
    }
}
