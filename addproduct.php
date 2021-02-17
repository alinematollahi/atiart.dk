<?php


if (!file_exists("uplode")) {
    mkdir("uplode");
}

if (isset($_POST['productName'])){$productName = $_POST['productName'];}
if (isset($_POST['productSize'])){$productSize = $_POST['productSize'];}
if (isset($_POST['productPrice'])){$productPrice = $_POST['productPrice'];}
if (isset($_POST['productDetails'])){$productDetails = $_POST['productDetails'];}
if (isset($_POST['sort'])){$sort = $_POST['sort'];}
if (isset($_POST['activation'])){$activity = $_POST['activation'];}
if (isset($_POST['img1TempSrc'])){$img1src = str_replace("temp" , "uplode", $_POST['img1TempSrc']);}
if (isset($_POST['img2TempSrc'])){$img2src = str_replace("temp" , "uplode", $_POST['img2TempSrc']);}
if (isset($_POST['img3TempSrc'])){$img3src = str_replace("temp" , "uplode", $_POST['img3TempSrc']);}

/*
$productSize = $_POST['productSize'];
$productPrice = $_POST['productPrice'];
$productDetails = $_POST['productDetails'];
$sort = $_POST['sort'];

if ($_POST['activity']==1) {
    $activity = true;
} else {
    $activity = false;
}

*/

/*

if(isset($_SESSION['filename1'])){$img1src= "uplode/".$_SESSION['filename1'];}
else {$img1src=null;}
if(isset($_SESSION['filename2'])){$img1src= "uplode/".$_SESSION['filename2'];}
else {$img2src=null;}
if(isset($_SESSION['filename3'])){$img1src= "uplode/".$_SESSION['filename3'];}
else {$img3src=null;}

*/

/*
$img1src= "uplode/".$_SESSION['filename1'];
$img2src= "uplode/".$_SESSION['filename2'];
$img3src= "uplode/".$_SESSION['filename3'];
*/

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

if ($_POST['img1TempSrc'] !== ''){rename($_POST['img1TempSrc'] , $img1src);}
if ($_POST['img2TempSrc'] !== ''){rename($_POST['img2TempSrc'] , $img2src);}
if ($_POST['img3TempSrc'] !== ''){rename($_POST['img3TempSrc'] , $img3src);}


$stmt01 = $conn->prepare("SELECT * FROM products WHERE activity=?");
$stmt01->bindValue(1,'1');
$stmt01->execute();

$result01=$stmt01->fetchAll(PDO::FETCH_ASSOC);
$activeProductNumber = count($result01);

$response = array("Product added", $activeProductNumber);
echo json_encode($response);

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