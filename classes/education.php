<?php

//This Completed_studies class is handling all actions with the database such as
//select one or many, insert , update or delete a course
//The actual connection is passed into the c-tor
class Education
{
    private $db;

    //C-tor where we use an already existing connection to the database
    public function __construct($db)
    { 
        $this->db = $db->getConnection();
    }

    //Get one tuple from database table education based on id
    //We return an assocciative array
    public function get_one_education(int $id) : array
    {
        $result = $this->db->query("select * from  education where id = '$id'");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Get all tuple from database table education 
    //We return an assocciative array
    public function get_all_educations() : array
    {
        $result = $this->db->query("select * from  education order by start DESC");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Delete one from database table education based on id
    //Return true if successful added else false
    public function delete_education(int $id): bool
    {
        return $this->db->query("delete from  education where ID= $id");
    }

    //Add a new education tuple
    //Return true if successful added else false
    public function add_education(string $higher_education_instution, string $course_name,string $start, string $end) : bool
    {
        return $this->db->query("INSERT INTO education(higher_education_instution, course_name, start, end
        ) VALUES ('$higher_education_instution','$course_name', '$start', '$end')");
    }

    //Update a education tuple based on id
    //Return true if successful added else false
    public function update_education(int $id, string $higher_education_instution, string $course_name,string $start,string $end) : bool
    {
        return $this->db->query("update education set higher_education_instution='" . $higher_education_instution . "', course_name='" . $course_name . "',start='" . $start . "',end='" . $end . "' where ID = $id");
    }
}
