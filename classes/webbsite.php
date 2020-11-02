<?php

//This Webbsites class is handling all actions with the database such as
//select one or many, insert , update or delete a course
//The actual connection is passed into the c-tor
class Webbsite
{
    private $db;

    //C-tor where we use an already existing connection to the database
    public function __construct($db)
    { 
        $this->db = $db->getConnection();
    }

    //Get one tuple from database table webbsite based on id
    //We return an assocciative array
    public function get_one_webbsite(int $id) : array
    {
        $result = $this->db->query("select * from webbsite where id = '$id'");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Get all tuple from database table webbsite
    //We return an assocciative array
    public function get_all_webbsites() : array
    {
        $result = $this->db->query("select * from webbsite");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Delete one tuple from database table webbsite based on id
    //Return true if successful added else false
    public function delete_webbsite(int $id): bool
    {
        return $this->db->query("delete from webbsite where ID= $id");
    }

    //Add a new webbsite tuple
    //Return true if successful added else false
    public function add_webbsite(string $title, string $url,string $description) : bool
    {
        return $this->db->query("INSERT INTO webbsite(title, url, description
        ) VALUES ('$title', '$url', '$description')");
    }

    //Update a webbsite tuple based on id
    //Return true if successful added else false
    public function update_webbsite(int $id, string $title, string $url,string $description) : bool
    {
        return $this->db->query("update webbsite set title='" . $title . "', url='" . $url . "',description='" . $description ."'  where ID = $id");
    }
}
