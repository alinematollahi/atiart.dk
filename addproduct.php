<?php

session_start();


if (!file_exists("uplode")) {
    mkdir("uplode");
}

$productName = $_POST['productName'];
$productSize = $_POST['productSize'];
$productPrice = $_POST['productPrice'];
$productDetails = $_POST['productDetails'];
$sort = $_POST['sort'];

if ($_POST['activity']==1) {
    $activity = true;
} else {
    $activity = false;
}

$img1src= "uplode/".$_SESSION['filename1'];
$img2src= "uplode/".$_SESSION['filename2'];
$img3src= "uplode/".$_SESSION['filename3'];


$servername = "localhost:3308";
$username = "root";
$password = "";
/*
try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE DATABASE atiart";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Database created successfully<br>";
  } 
  catch(PDOException $e) {
    echo $e->getMessage();
  }

  $conn = null;
*/
try {
  $conn = new PDO("mysql:host=$servername;dbname=atiart", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $conn->prepare("INSERT INTO products (name,size,price,details,sort,activity,img1src,img2src,img3src)
  VALUES (:name,:size,:price,:details,:sort,:activity,:img1src,:img2src,:img3src)");

$stmt->bindParam(':name',$productName);
$stmt->bindParam(':size',$productSize);
$stmt->bindParam(':price',$productPrice);
$stmt->bindParam(':details',$productDetails);
$stmt->bindParam(':sort',$sort);
$stmt->bindParam(':activity',$activity);
$stmt->bindParam(':img1src',$img1src);
$stmt->bindParam(':img2src',$img2src);
$stmt->bindParam(':img3src',$img3src);

$stmt->execute(); 
/*
  $query = "CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY ,
    name VARCHAR (255),
    size VARCHAR (255),
    price INT (10),
    details VARCHAR (255),
    sort INT (4),
    activity BOOLEAN ,
    img1src VARCHAR (255),
    img2src VARCHAR (255),
    img3src VARCHAR (255)
)";
$conn->exec($query);
*/
//$query01 = "INSERT INTO products (name,size,price,details,sort,activity,img1src,img2src,img3src) 
//VALUES ($productName,$productSize,$productPrice,$productDetails,$sort,$activity,$img1src,$img2src,$img3src)";
/*
$query01 = "INSERT INTO products (name,size) 
VALUES ('a','b')";

$conn->exec($query01);
*/
rename($_SESSION['filesrc1'] , "uplode/".$_SESSION['filename1']);
rename($_SESSION['filesrc2'] , "uplode/".$_SESSION['filename2']);
rename($_SESSION['filesrc3'] , "uplode/".$_SESSION['filename3']);
session_destroy();
header("location:management.php");
} 
catch(PDOException $e) {
  echo $e->getMessage();
}
$conn = null;


/*
$con = mysqli_connect("localhost:3308", "root", "", "quilling");
if (!$con) {
    echo die(mysqli_connect_error());
}
*/


//echo  $productName . '<br/>' . $productSize . '<br/>' . $productPrice . '<br/>' . $productDetails . '<br/>' . $number . '<br/>' . $activity . '<br/>';
/*
echo ' <img src= "' . $_SESSION['filesrc1'] . '"/>' . ' <br/>';
echo ' <img src= "' . $_SESSION['filesrc2'] . '"/>' . ' <br/>';
echo ' <img src= "' . $_SESSION['filesrc3'] . '"/>' . ' <br/>';


$conection = mysqli_connect("localhost", "root", "");
$query = "CREATE DATABASE quilling";
mysqli_query($conection, $query);
var_dump(mysqli_query($conection, $query));

*/