<?php 
header('Access-Control-Allow-Origin: *');

 
 $file_name = $_FILES['photo']['name'];
  $tmp_file_name = $_FILES['photo']['tmp_name'];
     
    
        if(move_uploaded_file($tmp_file_name,"./imgs/$file_name")){
            echo "Upload Scucessfully";
        }
        else{
            echo "Upload failed";
        }
      

      
   $img_connect = mysqli_connect('localhost','root','prajusuju6','atlanta_img');

   $img_sql = "insert into `img`(image_source) values ('$file_name')";
   $img_result  = mysqli_query($img_connect,$img_sql);

   if($img_result){
    echo "Image inserted Successfully..";
   }else
   {
    echo "Image inserted Unsuccessfully..";
   }



?>