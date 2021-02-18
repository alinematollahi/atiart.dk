<?php

if (isset($_POST['productName'])){$productName = $_POST['productName'];}
if (isset($_POST['productSize'])){$productSize = $_POST['productSize'];}
if (isset($_POST['productPrice'])){$productPrice = $_POST['productPrice'];}
if (isset($_POST['productDetails'])){$productDetails = $_POST['productDetails'];}
if (isset($_POST['sort'])){$sort = $_POST['sort'];}
if (isset($_POST['activation'])){$activity = $_POST['activation'];}
if (isset($_POST['img1TempSrc'])){$img1src = str_replace("temp" , "uplode", $_POST['img1TempSrc']);}
//if (isset($_POST['img2TempSrc'])){$img2src = str_replace("temp" , "uplode", $_POST['img2TempSrc']);}
//if (isset($_POST['img3TempSrc'])){$img3src = str_replace("temp" , "uplode", $_POST['img3TempSrc']);}
if (isset($_POST['productId'])){$productId = $_POST['productId'];}

$servername = "localhost:3308";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=atiart", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $conn->prepare("INSERT INTO products (name,size,price,details,sort,activity,img1src)
  VALUES (:name,:size,:price,:details,:sort,:activity,:img1src)");
  

  $stmt = $conn->prepare("UPDATE `products` SET `name` = ?, `size` = ?, `price` = ?, `details` = ?, `sort` = ?, `activity` = ?, `img1src` = ? WHERE `products`.`id` = ?;");


$stmt->bindValue(1,$productName);
$stmt->bindValue(2,$productSize);
$stmt->bindValue(3,$productPrice);
$stmt->bindValue(4,$productDetails);
$stmt->bindValue(5,$sort);
$stmt->bindValue(6,$activity);
$stmt->bindValue(7,$img1src);
$stmt->bindValue(8,$productId);
//$stmt->bindParam(':img2src',$img2src);
//$stmt->bindParam(':img3src',$img3src);

$stmt->execute();
/*
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
*/

echo $_POST['productId'].'<br>';
echo $_POST['productName'].'<br>';
echo $_POST['productSize'].'<br>';
echo $_POST['productPrice'].'<br>';
echo $_POST['productDetails'].'<br>';
echo $_POST['sort'].'<br>';
echo $_POST['activation'].'<br>';
echo $_POST['img1TempSrc'].'<br>';
} 
catch(PDOException $e) {
  echo $e->getMessage();
}
$conn = null;