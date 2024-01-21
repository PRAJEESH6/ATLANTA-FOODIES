<?php 

include('./Connect.php');
include_once('./core.php');

$table = "select * from `one` order by id desc";
$re = mysqli_query($conn,$table);



if($re){
    $col = mysqli_fetch_assoc($re);
   // $id = $col['id'];
    $name = $col['name'];
   // $username = $col['username'];
   $email = $col['email'];
   // $password = $col['password'];
   // $pn = $col['phone'];
   // $city = $col['city'];
    //echo $id;
    echo $name;
   // echo $username;
   // echo $email;
   // echo $password;
   // echo $pn;
   // echo $city;

//    use PHPMailer;
//    use Exception;
    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\Exception;

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
            echo "no";
        }

       
      

?>