<?php

//This experience class is handling all actions with the database such as
//select one or many, insert , update or delete a course
//The actual connection is passed into the c-tor
class Experience
{
    private $db;

    //C-tor where we use an already existing connection to the database
    public function __construct($db)
    { 
        $this->db = $db->getConnection();
    }

    //Get one tuple from database table experience based on id
    //We return an assocciative array
    public function get_one_experience(int $id) : array
    {
        $result = $this->db->query("select * from experience where id = '$id'");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Get all tuple from database table experience
    //We return an assocciative array
    public function get_all_experiences() : array
    {
        $result = $this->db->query("select * from experience order by start DESC");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Delete one tuple from database table experience based on id
    //Return true if successful added else false
    public function delete_experience(int $id): bool
    {
        return $this->db->query("delete from experience where ID= $id");
    }

    //Add a new experience tuple
    //Return true if successful added else false
    public function add_experience(string $workplace, string $title, string $start, string $end, string $description) : bool
    {
        return $this->db->query("INSERT INTO experience(workplace, title, start, end, description
        ) VALUES ('$workplace','$title', '$start', '$end', '$description')");
    }

    //Update a experience tuple based on id
    //Return true if successful added else false
    public function update_experience(int $id, string $workplace, string $title,string $start,string $end,string $description) : bool
    {
        return $this->db->query("update experience set workplace='".$workplace."',title='".$title."',start='".$start."',end='".$end."',description='".$description."' where ID = $id");
    }
}
