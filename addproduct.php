<?php

session_start();


if (!file_exists("temp1")) {
    mkdir("temp1");
}

$productName = $_POST['productName'];
$productSize = $_POST['productSize'];
$productPrice = $_POST['productPrice'];
$productDetails = $_POST['productDetails'];
$number = $_POST['number'];
$activity = $_POST['activity'];

$con = mysqli_connect("localhost:3308", "root", "", "quilling");

if (!$con) {
    echo die(mysqli_connect_error());
}



echo  $productName . '<br/>' . $productSize . '<br/>' . $productPrice . '<br/>' . $productDetails . '<br/>' . $number . '<br/>' . $activity . '<br/>';
/*
echo ' <img src= "' . $_SESSION['filesrc1'] . '"/>' . ' <br/>';
echo ' <img src= "' . $_SESSION['filesrc2'] . '"/>' . ' <br/>';
echo ' <img src= "' . $_SESSION['filesrc3'] . '"/>' . ' <br/>';


$conection = mysqli_connect("localhost", "root", "");
$query = "CREATE DATABASE quilling";
mysqli_query($conection, $query);
var_dump(mysqli_query($conection, $query));

*/  
/*
    if (isset($_FILES['img1'])) {
    
        $imgName = $_FILES['img1']['name'];
        $array = explode(".",$imgName );
        $ext = end($array);
        $newName = rand().".".$ext;

        $from = $_FILES['img1']['tmp_name'];
        $to = "temp1"."/".$newName;
        move_uploaded_file($from,$to);

        //echo '<img src="'.$to.'">';
        echo "  ok1   ";

        //$_SESSION['img1'] = 'ok';
        //$_SESSION['filesrc1'] = $to;

        //header("location:management.php");
    }

    if (isset($_FILES['img2'])) {
    
        $imgName = $_FILES['img2']['name'];
        $array = explode(".",$imgName );
        $ext = end($array);
        $newName = rand().".".$ext;

        $from = $_FILES['img2']['tmp_name'];
        $to = "temp1"."/".$newName;
        move_uploaded_file($from,$to);

        //echo '<img src="'.$to.'">';
        echo "  ok2   ";

        // $_SESSION['img2'] = 'ok';
        // $_SESSION['filesrc2'] = $to;
        // header("location:management.php");
    }

    if (isset($_FILES['img3'])) {
    
        $imgName = $_FILES['img3']['name'];
        $array = explode(".",$imgName );
        $ext = end($array);
        $newName = rand().".".$ext;

        $from = $_FILES['img3']['tmp_name'];
        $to = "temp1"."/".$newName;
        move_uploaded_file($from,$to);

        //echo '<img src="'.$to.'">';
        echo "  ok3   ";

        // $_SESSION['img3'] = 'ok';
        // $_SESSION['filesrc3'] = $to;
        // header("location:management.php");
    }

    */
