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

$servername = "localhost:3308";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=atiart", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // get products befor add to set sort

  $stmt01 = $conn->prepare("SELECT * FROM products ORDER BY sort");
        
  $stmt01->execute();
  $result01 = $stmt01->fetchAll(PDO::FETCH_ASSOC);
  $resNumber=count($result01);

  // add product

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

// set sort

for ($i=0;$i<$resNumber;$i++) {
  if ($result01[$i]['sort'] >= $sort && $result01[$i]['sort'] !== '9999'){
    $newSort = $result01[$i]['sort'] + 1 ;
    $stmt02 = $conn->prepare("UPDATE `products` SET `sort` = ? WHERE `products`.`id` = ?");
    $stmt02->bindValue(1,$newSort);
    $stmt02->bindValue(2,$result01[$i]['id']);
    $stmt02->execute();        
  }
}


// set active Product Number

$stmt03 = $conn->prepare("SELECT * FROM products WHERE activity=?");
$stmt03->bindValue(1,'1');
$stmt03->execute();

$result03=$stmt03->fetchAll(PDO::FETCH_ASSOC);
$activeProductNumber = count($result03);

$response = array("Product added", $activeProductNumber);
echo json_encode($response);

} 
catch(PDOException $e) {
  echo $e->getMessage();
}
$conn = null;