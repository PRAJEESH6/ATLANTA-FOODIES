<?php 
include("../BACKEND/Connect.php");

header('Access-Control-Allow-Origin: *');

 
     $file_name = $_FILES['pic']['name'];
      echo $tmp_file_name = $_FILES['pic']['tmp_name'];
        $new_file_name ="../BACKEND/SignUp_Login/".$file_name;
    
        if(move_uploaded_file($tmp_file_name,$new_file_name)){
            echo "Upload Scucessfully";
        }
        else{
            echo "Upload failed";
        }
      

      

//     $pic = $_FILES['file']['name'];
//     $tmp_file_name = $_FILES['file']['tmp_name'];
//    $image=file_get_contents($pic);



?>