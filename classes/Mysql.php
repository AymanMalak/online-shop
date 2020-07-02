<?php



class Mysql
{
    private $db_servername, $db_name, $db_username, $db_password;
    public function connection()
    {
        $this->db_servername = 'localhost';
        $this->db_username = 'root';
        $this->db_password = '';
        $this->db_name = 'online_shop';

        return new mysqli($this->db_servername, $this->db_username, $this->db_password, $this->db_name);
    }
}
