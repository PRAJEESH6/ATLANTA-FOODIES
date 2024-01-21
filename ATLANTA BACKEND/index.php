
<?php 
include('./Connect.php');


  //User Post data function..it helps to receive users data and we can make a trim ,striplashes ,htmlspecialchars...
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

       $connection = new PDO("mysql:host="."localhost".";dbname="."atlanta_signup","root","prajusuju6");
       $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
       $sql = 'select email from one where email = :email';
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
     
    try{
    $connection = new PDO("mysql:host="."localhost".";dbname="."atlanta_signup","root","prajusuju6");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    $name = $validdata["name"];
    $username = $validdata["username"];
    $email = $validdata["email"];
    $password = $validdata["password"];
    $phone = $validdata["phone"];
    $city = $validdata["city"];
    $hashkey = $validdata["hashkey"];
    $active = $validdata["active"];

    $sql = "insert into `one`(name , username , email , password , phone , city , hashkey , active ) values ('$name' , '$username' , '$email' , '$password' , '$phone' , '$city' , '$hashkey' , '$active' ) ";
   // $result = mysqli_query($conn,$sql);
     $stmt = $connection->prepare($sql);


    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

     //Sending Email Process
   

    if(empty($result))
    {
       // /Sending Email to the users...
        include('./Connect.php');
        include_once('./core.php');
        require './phpmailer/PHPMailerAutoload.php';
        
        $mail = new PHPMailer(true);
        
        try {
            $mail->SMTPDebug = 2;                                       
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';    
            $mail->Mailer = "smtp";                
            $mail->SMTPAuth   = true;                             
            $mail->Username   = 'sprajeesh947@gmail.com';                 
            $mail->Password   = 'qbme ifzc jfdx uqwq';                        
            $mail->SMTPSecure = 'ssl';                              
            $mail->Port       = 465;
            $mail->Host = 'ssl://smtp.gmail.com:465';  
            
        
            $mail->setFrom('atlanta@g.com', 'ATLANTA FOODIES');           
            $mail->addAddress($email);
            $mail->addAddress($email, $name.' - WELCOME FOODIES');
        
            $mail->isHTML(true);                                  
            $mail->Subject = 'Savor the Journey, Indulge the Flavor: Welcome ATLANTA FOODIES, Explore Your Culinary Adventure!.. ';
            $mail->Body    = '
            <html>
        <title>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
         <style>
            @import url("https://fonts.googleapis.com/css2?family=Josefin+Slab:ital,wght@1,600&display=swap");
            @import url("https://fonts.googleapis.com/css2?family=Monoton&display=swap");
        
        </style>
        </title>
        <body>
               <img src="https://images8.alphacoders.com/103/1032061.jpg" style=" width: 350px;height: 350px;; border : 1px solid black;border-radius:10px;box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;background-position: center;object-fit: cover;background-size: cover;"   alt="pic"/>
        
               <h1 style="font-family:Monoton ; color:orange; font-size=20px">Howdy '.$name. ',</h1><br>
        
               <h3 style="font-family:Monoton ; color:orange; font-size=20px">Welcome to Explore Atlanta Foodies!</h3><br>
               <p style="text-align:justify ;color:black; font-family:Josefin Slab">Embark on a delectable journey through the heart of Atlantas vibrant culinary scene. Our webpage is your ultimate guide to unraveling the citys diverse and mouthwatering food landscape. From sizzling Southern barbecues to eclectic fusion delights, Atlantas kitchens have something for every palate. Join us as we celebrate the rich tapestry of flavors that define this dynamic city, inviting you to explore, indulge, and savor each gastronomic experience.</P>
           
               <h3 style="font-family:Monoton ; color:orange; font-size=20px">Dive into Atlantas Culinary Kaleidoscope</h3><br>
               <p style="text-align:justify ;color:black; font-family:Josefin Slab">At Explore Atlanta Foodies, we believe that every meal tells a story, and Atlantas kitchens are a testament to a tale as diverse as its people. Navigate through our carefully curated content that captures the essence of local eateries, hidden gems, and culinary hotspots. Whether you re a seasoned food enthusiast or a curious newcomer, our webpage is your passport to discovering the extraordinary flavors that make Atlanta a gastronomic haven. Let your taste buds be your guide as you explore the vibrant and ever-evolving culinary landscape of this Southern gem.</P>
               
               <h3 style="font-family:Monoton ;  color:orange; font-size=20px">Discover, Share, and Feast Together</h3><br>
               <p style="text-align:justify ; color:black; font-family:Josefin Slab">We extend a warm welcome to all fellow foodies and enthusiasts eager to delve into the gastronomic wonders of Atlanta. Our webpage is not just a guide; its a community where food lovers unite to share their discoveries, recommendations, and passion for all things delicious. Join the conversation, swap stories, and feast your eyes on a culinary adventure that goes beyond the plate. At Explore Atlanta Foodies, we invite you to be a part of a community that celebrates the joy of exploration and the delight of sharing unforgettable dining experiences in this remarkable city.</P>
           
             <p style="text-align:justify ; color:black; font-family:Josefin Slab">If you have any queries regarding the demo session or about the program fee or joining details, drop an email to <a href"#">sprajeesh947@gmail.com</a> . We will get back to you.</p>
           
             <h6 style="color:black; font-family:Josefin Slab; font-size=16px"> Thank you ~ '.$name.'</h6>
             <h6 style="color:black; font-family:Josefin Slab; font-size=16px"> bY  ATLANTA FOODIES TEAM       </h6>
             <h6 style="color:black; font-family:Josefin Slab; font-size=16px"> CEO-PRAJEESH S  </h6>
             <h6 style="color:black; font-family:Josefin Slab; font-size=16px"> HQ- Ooty,Nilgiris      </h6>
        
        <button style="border:1px solid white;height:30px;border-radius:5px;background-color:black;text-decoration:none;text-underline:none;color:white"><a href="activate.php">Activate Now</a></button>
               </html>
               <img src="https://img.grouponcdn.com/seocms/3j3ewb4MkRYLaWPstmzttrhwBqCm/00_two_women_eating_barbecue_jpg-600x390" style=" width=350px; height=350px; border : 1px solid black;border-radius:10px;box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;background-position: center;object-fit: cover;background-size: cover;" alt="pic"/>
            <p style="text-align:justify ; color:black;  font-family:Josefin Slab">THANK YOU FOR SIGNUP OUR FOODIES WEBPAGE..START YOUR ADVENTURE WITH US...;</p>   </body>';
            $mail->AltBody = '<p style="text-align:justify ; color:black;  font-family:Josefin Slab">Welcome Foodies activate your foodies account..<a href="activate.php">Activate Now</a></p> ';
            $mail->send();
            echo "Mail has been sent successfully!";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }else{
        return false;
    }
    
   
   
 }catch(PDOException $e){
      die("Failed to connect".$e->getMessage());
 }
   }

//************************************************************************************************************************* */
   


 

   

  
//************************************************************************************************************************* */

    //PHP access Controll.... MAIN CONTROLLS.....
	header('Access-Control-Allow-Origin: http://localhost:3001');
    
    //Sanitize Data function..
     $GoldenData = sanitizeInput($_POST);

     //Checking error condition is empty or not...this is not a function..
     $ValidError = validData($GoldenData)[0];

     //Checking Valid values function...
     $ValidValues = validData($GoldenData)[1];print_r($ValidValues);
     
     //Checking ValidError is 0 not..for findout registered email process..
      if(empty($ValidError)){
       if(dupliacteEmail($ValidValues["email"])){
              
             //Password hasing technique...
             $options =["cost" => 15];
             echo $ValidValues["password"];
             $ValidValues["password"] = password_hash($ValidValues['password'],PASSWORD_BCRYPT,$options);
             echo $ValidValues["password"];

             //Generate the hash-key when users click submit button...
             $hash = sha1(mt_rand(1000,9999).time().$ValidValues["email"]);
             $ValidValues["hashkey"] = substr($hash,0,6);
             echo $ValidValues['hashkey'];
             //echo $ValidValues['name'];

             //Deault Active condition is 0..this is account activated process...
             $ValidValues["active"] = 0;

             //All the values stored in our DB..PHP-MYSQL DB function....
             Registereduser($ValidValues);

             $ActivateEmail=[
                "email"  => $validdata["email"],
                "hashkey" =>$validdata["hashkey"],
                "id" => $connection->lastInsertId()
            ];
           
            
             

       }else{
         $ValidError['email'] = "This Email has been Already Taken..";
       }
      }


    // $name = $_POST['name'];
	// $user = $_POST['name1'];
     $email = $_POST['email'];
     EmailFunction($ActivateEmail);
     function EmailFunction($Parms){


    //     $headers   = "From:sprajeesh";
    //     $headers  .= "MIME-version:1.0"; 
    //     $headers  .= "Content-type: text/html; charset=ISO-8859-1";
    
    //     $to = $Parms["email"];
    
    //     $subject = "WELCOME TO THE ATLATA FOODIES...please activate your path..";
    
    //     $actual_link = "http://localhost:3000/bus-ticket/src/PHP/activate.php?id=" .$Parms["id"]. "&hashkey=".$Parms["hashkey"]."&email=".$Parms["email"];
    
    //     $message = "Please click here to activate your account .<a href='".$actual_link."'>here</a>";
    
    //     if(mail($to , $subject , $message , $headers)){
    
    //         echo "Please check your YOHOO! mail id and activate your account...";
         }
      //  }
    // $password =$_POST['password'];
    // $cpassword = $_POST['cpassword'];
    // $phone = $_POST['phone'];
    // $city = $_POST['city'];
   
   

   
   
// echo $name;
// echo $email;
// echo $password;
// echo $cpassword;
// echo $phone;
// echo $city;

 ?>
