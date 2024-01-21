<?php
include('Connect.php');
$sql = "select * from one";
$result = mysqli_query($conn,$sql);

if($result){
    $row = mysqli_fetch_assoc($result);
    echo $row['name'];

    $row = mysqli_fetch_assoc($result);
    $kk = $row['id'];
    echo $kk;
}

$id = $_GET[$kk];
if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];

    $query = "update `one` set id=$id name='$name' username='$username' email='$email' phone='$phone' city='$city' where id='$id'";
    $ghost = mysqli_query($conn,$query);
}

?>