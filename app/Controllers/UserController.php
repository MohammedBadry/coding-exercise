<?php 
namespace Controllers;

use Models\User;

class UserController
{
    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {        
        //form import page
        require_once 'app/Views/index.php';
    }

    function allUsers()
    {
        //retrive users page
        $users = $this->user->allUsers();
        require_once('app/Views/users.php');
    }

    function saveUser()
    {
        $file 			= $_FILES['image'];
        $name 			= $file['name'];
        $type 			= $file['type'];
        $size 			= $file['size'];
        $temporary_file = $file['tmp_name']; // temporary path
        $str_to_arry        = explode('.',$name);
        $extension          = end($str_to_arry); // get extension of the file.
        $upload_location 	  = "./files/"; // targeted location
        $new_name 			= "user-".time().".".$extension; // new name
        $location_with_name = $upload_location.$new_name; // finel new file

        // Allowed mime types 
        $excelMimes = array('image/jpg', 'image/jpeg', 'image/png'); 

        // Validate whether selected file is an image 
        if(empty($_POST['first_name']) || empty($_POST['last_name']) || empty($name) ){ 
            $status = "error";
            echo json_encode(['status' => 'error', 'message' => 'Please fill all required field.']);
            exit;
        }
        //Check file is an image
        if(!in_array($type, $excelMimes)){
            echo json_encode(['status' => 'error', 'message' => 'Please select a valid image file.']);
            exit;
        }
        //Check size less than 2MB
        if($size>2000000){
            echo json_encode(['status' => 'error', 'message' => 'Image size should be less than 2M.']);
            exit;
        }

        move_uploaded_file($temporary_file, $location_with_name);

        //save user method
        $this->user->saveUser($_POST['first_name'], $_POST['last_name'], $location_with_name);

        echo json_encode(['success' => 'error', 'message' => 'User has been added successfully.', 'image' => '<img src="'.$location_with_name.'" width="250" height="250">']);
    } 

    function deleteUser()
    {
        $id = $_POST['id'];
        if(empty($id) || !is_numeric($id)) {
            echo "Empty user";
        }
        $this->user->deleteUser($id);

        return header("Location: /".BASE_URL."/?act=all-users");
    }
}