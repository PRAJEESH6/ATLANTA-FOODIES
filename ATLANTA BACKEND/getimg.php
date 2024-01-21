<?php 

include('./Imgconnect.php');
include_once('./core.php');

$sql_img = "select * from `img` order by id desc";
$sql_query = mysqli_query($img_con,$sql_img);

if($sql_query)
{
    $img = mysqli_fetch_assoc($sql_query);
    $imgs = $img['image_source'];
    echo $imgs;
}

?>