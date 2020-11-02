<?php
//Required files to be used
require 'classes/database.php';

require 'classes/education.php'; //Genomförda studier(Utbildning)
require 'classes/webbsite.php'; //Skapade webbplatser(Webbplatser)
require 'classes/experience.php';  //Arbetslivsfarenhet(Erfarenhet)

//Define that content is json
header('Content-Type: application/json');
//Define that all domain are valid
header('Access-Control-Allow-Origin: *');
//Define valid methods
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');
//Define valid headers
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, x-Requested-With');

//Check if id exist in url
if (isset($_GET['id']))
{
   $id = $_GET['id'];
}

//Connect to database in C-tor
$db = new Database(); 
$education = new Education($db);


 switch($_SERVER['REQUEST_METHOD']) //Get current method
 {
    case 'GET' :
    
      //Get one or all education depending on id
      $result = isset($id) ? $education->get_one_education($id) : $education->get_all_educations();

      //Check if the result contains any rows
      if (count($result) > 0) 
      {
         http_response_code(200); //Yes we have some rows
      }
      else 
      {      
        http_response_code(404); //Empty collection
        $result = array("message" => "No education found");
      }
    break; //end case GET


     case 'POST' : //adding

      //Get data from body and convert json to php variable
      $data =  json_decode(file_get_contents("php://input"));
    
      //Add a new education and pass all argument
      if ($education->add_education($data->higher_education_instution, $data->course_name, $data->start, $data->end))
      {
         http_response_code(201);
         $result = array("message" => "Education added");
      }
      else 
      {
         http_response_code(501);
         $result = array("message" => "Education added failed");     
      }
     break; //end case POST

     case 'PUT' : //update
      //$myfile = fopen("tonyfoo.txt", "w") or die("Unable to open file!");
    
      if (!isset($id))  //id must be present
      {
         http_response_code(510);
         $result = array("message" => "No id present");     
      }
      else 
      {
          //Get data from body and convert json to php variable
         $data =  json_decode(file_get_contents("php://input"));

         //Update a specific education and pass in all arguments
         if ($education->update_education($id, $data->higher_education_instution, $data->course_name, $data->start, $data->end))
         {
            http_response_code(200);
            $result = array("message" => "Education updated");  
         }
         else 
         {
            http_response_code(503);
            $result = array("message" => "Education Update failed"); 
         } 
      }
     break; //end case PUT

     case 'DELETE' :
      if (!isset($id)) // id must be present 
      {
         http_response_code(510); //return error
         $result = array("message" => "No id is present");     
      }
      else 
      {
         if ($education->delete_education($id)){
            http_response_code(200); //return success
            $result = array("message" => "Education deleted"); 
         }
         else 
         {
            http_response_code(503); //return error
            $result = array("message" => "Education delete failed"); 
         }
      }
   break; //end case DELETE
}

echo json_encode($result); //Return as json
$db->close(); //close connection to db






