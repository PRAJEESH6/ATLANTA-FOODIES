<?php 
session_start();
include('Connect.php');

 //PHP access Controll.... MAIN CONTROLLS.....
 header('Access-Control-Allow-Origin: http://localhost:3001');
 
 if(isset($_POST['submit']))
 {
    $username=$_POST['username'];
$mobile=$_POST['email'];
echo $username;
echo $mobile;
 }
 echo "hii";
 
if(isset($_POST['submit'])){
     $na = $_POST['username'];
     $em = $_POST['email'];

     echo $na;
 echo $em;

       $query = "select * from `one` where username='$na' and email='$em'";
     $res = mysqli_query($conn,$query);
     
     if(mysqli_num_rows($res) > 0){
      echo "true";
      
     }else{
      echo "false";
     }
}else{
  echo "error";
}

//      $query = "select * from `one` where username='$na' and email='$em'";
//      $res = mysqli_query($conn,$query);
     
    
//      if($res)
//      {
//       $_SESSION['datas'] = $res;
//      }
     
    //  if(mysqli_num_rows($res) > 0)
    //  {
    //   $query1 = "select id,name,username,email,password,phone,city,hashkey,active where username=".$na."";
    //   $executeQuery = mysqli_query($conn,$query1);

    //   $_SESSION['datas'] = $executeQuery;
    //  }
     
//      $data = mysqli_fetch_array($res);
//      echo $data;

//      $_SESSION['id']        = $data['id'];
//      $_SESSION['name']      = $data['name'];
//      $_SESSION['username']  = $data['username'];
//      $_SESSION['email']     = $data['email'];
//      $_SESSION['password']  = $data['password'];
//      $_SESSION['phone']     = $data['phone'];
//      $_SESSION['city']      = $data['city'];
//      $_SESSION['hashkey']   = $data['hashkey'];
//      $_SESSION['active']    = $data['active'];


//   //  echo '<script>
//   //       alert("Sucessfully LOgin");
//   //  </script>';
//      echo $na;
//      echo $em;
//     // echo $data['city'];
//     // header('location:http://localhost:3001/home');
// }else{
//     echo "No data available";
//     header('location:');
// }


//*********************************FUNCTIONS******************************************** */

//User Post data function..it helps to receive users data and we can make a trim ,striplashes ,htmlspecialchars...
  //We can Sanitize our Data's...

//   function sanitize($datas){

//     //Store and return the Sanitize Values...
//     $DataArray = [];

//     foreach($datas as $key => $value)
//     {
//       $data = trim($value);
//       $data = stripslashes($data);
//       $data = htmlspecialchars($data,ENT_QUOTES,'UTF-8');
//       $DataArray[$key] = $data;
//     }
//     return $DataArray;
//   }

//  // Sanitize Data function..
//  $AllData = sanitize($_POST);
//  var_dump($AllData);


?>