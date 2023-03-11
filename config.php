<?php

Class Database
{
    private $user ;
    private $host;
    private $pass ;
    private $db;
/*
    public function __construct()
    {
        $this->user = "root";
        $this->host = "localhost";
        $this->pass = "";
        $this->db = "vfl";
    }
    */
    //mysqli("hostname","username","password","db name")
    public function connect()
    {
        $link = new mysqli("localhost", "root","", "vfl");
        return $link;
    }
}

?>