
<?php 
include("../BACKEND/Connect.php");


  //User Post data functio..it helps to receive users data and we can make a trim ,striplashes ,htmlspecialchars...
  //We can Sanitize our Data's...
   function sanitizeInput($userPostData){
    
    //Store and return the Sanitize Values...
    $sanitizeNewUser = [];
     
    foreach($userPostData as $key => $value){
         
        $data = trim($value); //remove spaces
        $data = stripslashes($data);//remove slashes//
        $data = htmlspecialchars($data,ENT_QUOTES,'UTF-8');
        $sanitizeNewUser[$key] = $data; 
        
    }
   return $sanitizeNewUser;
   }

 //***************************************************************************************************** */


   //This function helps to check fill all the required fields...
   function validData($users){

    //Store the errors and return the errors...
    $error = [];

    foreach($users as $key => $value){

        //Each by Each field is store $key...
        switch($key){

            //Checking name field...
            case "name" :
                if(empty($value))
                {
                    $error["name"] = "Name Must Be Entered..";
                }
                $fieldValue[$key] = $value;
            break;

            //Checking UserName field....
            case "username" :
                if(empty($value))
                {
                    $error["username"] = "UserName Must Be Entered...";
                }
                $fieldValue[$key] = $value;
                break;

                //Checking Email field...
            case "email" : 
                if(!filter_var($value,FILTER_VALIDATE_EMAIL))
                {
                $error["email"] = "Email is not valid";
                }
                $fieldValue[$key] = $value;
             break;

             //Checking Password field...
            case "password" :
               
                 if(!filter_var($value,FILTER_VALIDATE_REGEXP,["options" => array("regexp" => "^\d^")]))
                 {
                    $error["password"] = "The password's first character must be a letter..";
                 }
                 $one = $value;

                 //Checking Conirm Password...
                case "cpassword" :
                    if($value != $one){
                          $error['cpassword'] = "Password and Confirm Password must be Same...";
                    }
                    $fieldValue[$key] = $value;
                    break;

                    //Checking Phone Number field...
                    case "phone" :
                        if(empty($value))
                        {
                            $error['phone'] = "Please Enter the Valid Mobile Number..";
                        }
                        $fieldValue[$key] = $value;
                        break;

                        //Checking city field...
                        case "city" :
                            if(empty($value))
                            {
                                $error['city'] = "Please Enter the City..";
                            }
                            $fieldValue[$key] = $value;
                            break;


        }//switch
    }
    //Errord and Actual value...
    return [$error,$fieldValue];
   }

   //************************************************************************************************************************* */

   //Email Duplication Checking Area...
   function dupliacteEmail($email){

    try{

       $connection = new PDO("mysql:host="."localhost".";dbname="."samp","root","prajusuju6");
       $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
       $sql = 'select email from sample where email = :email';
       $stmt = $connection->prepare($sql);
       $stmt->bindParam(':email',$email);
       $stmt->execute();

       $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
       if(empty($result)){
        return true;
       }else{
        return false;
       }

    }catch(PDOException $e){
         die("Failed to connect".$e->getMessage());
    }
   }

   //************************************************************************************************************************* */

   //All the respected values are Stored in our DB..
   function Registereduser($validdata){
      
        
   }

//************************************************************************************************************************* */

    //PHP access Controll.... MAIN CONTROLLS.....
	header('Access-Control-Allow-Origin: http://localhost:3001');
    
    //Sanitize Data function..
     $GoldenData = sanitizeInput($_POST);

     //Checking error condition is empty or not...this is not a function..
     $ValidError = validData($GoldenData)[0];

     //Checking Valid values function...
     $ValidValues = validData($GoldenData)[1];
     
     //Checking ValidError is 0 not..for findout registered email process..
      if(empty($ValidError)){
       if(dupliacteEmail($ValidValues["email"])){
              
             //Password hasing technique...
             $options =["cost" => 15];
             echo $ValidValues["password"];
             $ValidValues["password"] = password_hash($ValidValues['password'],PASSWORD_BCRYPT,$options);
             echo $ValidValues["password"];

             //Generate the hash-key when users click submit button...
             $ValidValues["hashkey"] = sha1(mt_rand(10000,99999).time().$ValidValues["email"]);
             echo $ValidValues['hashkey'];

             //Deault Active condition is 0..this is account activated process...
             $ValidValues["active"] = 0;

             //All the values stored in our DB..PHP-MYSQL DB function....
             Registereduser($ValidValues);

       }else{
         $ValidError['email'] = "This Email has been Already Taken..";
       }
      }


    $name = $_POST['name'];
	$user = $_POST['name1'];
    $email = $_POST['email'];
    $password =$_POST['password'];
    $cpassword = $_POST['cpassword'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
   

    $sql = "insert into `samp` (name) values('$user')";
    $result=mysqli_query($conn,$sql);
    if($result){

	echo ("Hello from server: $user");
    }else{
        echo "failes";
    }
   
echo $name;
echo $email;
echo $password;
echo $cpassword;
echo $phone;
echo $city;

// ?>
