<?php

require 'config/config.php';

class Database
{
   private $db;

    /* All arguments for connecting to db is located in config */
    public function __construct()
    {
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DSN);
        $this->db->connect_errno > 0 ? die('Error when connecting to db[' . $db->connect_error . ']') : null;
      }

    public function getConnection()
    {
       return $this->db;
    }

  public function close()
  {
      $this->db->close();
  }
}