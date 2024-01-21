<?php
//PHP access Controll.... MAIN CONTROLLS.....
include('core.php');
header('Access-Control-Allow-Origin: http://localhost:3001');


echo "welcome prajeesh";
//print_r($_POST);
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$city  = $_POST["city"];
echo $name;"<script>br</script>";
echo $email;"<script>br</script>";
echo $phone;"<script>br</script>";
echo $city;"<script>br</script>";
?>