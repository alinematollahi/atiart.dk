<?php

if (isset($_POST['productName'])){$productName = $_POST['productName'];}
if (isset($_POST['productSize'])){$productSize = $_POST['productSize'];}
if (isset($_POST['productPrice'])){$productPrice = $_POST['productPrice'];}
if (isset($_POST['productDetails'])){$productDetails = $_POST['productDetails'];}
if (isset($_POST['sort'])){$sort = $_POST['sort'];}
if (isset($_POST['activation'])){$activity = $_POST['activation'];}
if (isset($_POST['img1TempSrc'])){$img1src = str_replace("temp" , "uplode", $_POST['img1TempSrc']);}
if (isset($_POST['img2TempSrc'])){$img2src = str_replace("temp" , "uplode", $_POST['img2TempSrc']);}
if (isset($_POST['img3TempSrc'])){$img3src = str_replace("temp" , "uplode", $_POST['img3TempSrc']);}
if (isset($_POST['productId'])){$productId = $_POST['productId'];}
if (isset($_POST['oldsort'])){$oldsort = $_POST['oldsort'];}


$servername = "localhost:3308";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=atiart", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // get products befor update to set sort

  $stmt01 = $conn->prepare("SELECT * FROM products ORDER BY sort");
        
  $stmt01->execute();
  $result01 = $stmt01->fetchAll(PDO::FETCH_ASSOC);
  $resNumber=count($result01);

  // update product

  $stmt = $conn->prepare("INSERT INTO products (name,size,price,details,sort,activity,img1src)
  VALUES (:name,:size,:price,:details,:sort,:activity,:img1src)");
  

  $stmt = $conn->prepare("UPDATE `products` SET `name` = ?, `size` = ?, `price` = ?, `details` = ?, `sort` = ?, `activity` = ?, `img1src` = ?, `img2src` = ?, `img3src` = ? WHERE `products`.`id` = ?;");


    $stmt->bindValue(1,$productName);
    $stmt->bindValue(2,$productSize);
    $stmt->bindValue(3,$productPrice);
    $stmt->bindValue(4,$productDetails);
    $stmt->bindValue(5,$sort);
    $stmt->bindValue(6,$activity);
    $stmt->bindValue(7,$img1src);
    $stmt->bindParam(8,$img2src);
    $stmt->bindParam(9,$img3src);
    $stmt->bindValue(10,$productId);

    $stmt->execute();

    if ($_POST['img1TempSrc'] !== ''){rename($_POST['img1TempSrc'] , $img1src);}
    if ($_POST['img2TempSrc'] !== ''){rename($_POST['img2TempSrc'] , $img2src);}
    if ($_POST['img3TempSrc'] !== ''){rename($_POST['img3TempSrc'] , $img3src);}


    // set sort for show product part   
    
    for ($i=0;$i<$resNumber;$i++) {
        if($result01[$i]['sort'] < $oldsort && $result01[$i]['sort'] >= $sort 
          && $oldsort !== '9999' && $sort !== '9999') {

            $newSort = $result01[$i]['sort'] + 1 ;
            $stmt02 = $conn->prepare("UPDATE `products` SET `sort` = ? WHERE `products`.`id` = ?");
            $stmt02->bindValue(1,$newSort);
            $stmt02->bindValue(2,$result01[$i]['id']);
            $stmt02->execute();

        } elseif ($result01[$i]['sort'] <= $sort && $result01[$i]['sort'] > $oldsort 
                 && $oldsort !== '9999' && $sort !== '9999'){
            
            $newSort = $result01[$i]['sort'] - 1 ;
            $stmt02 = $conn->prepare("UPDATE `products` SET `sort` = ? WHERE `products`.`id` = ?");
            $stmt02->bindValue(1,$newSort);
            $stmt02->bindValue(2,$result01[$i]['id']);
            $stmt02->execute();

        } elseif ($oldsort == '9999' && $result01[$i]['sort'] >= $sort && $result01[$i]['sort'] !== '9999') {
           
                $newSort = $result01[$i]['sort'] + 1 ;
                $stmt02 = $conn->prepare("UPDATE `products` SET `sort` = ? WHERE `products`.`id` = ?");
                $stmt02->bindValue(1,$newSort);
                $stmt02->bindValue(2,$result01[$i]['id']);
                $stmt02->execute();   
            
        } elseif ($sort == '9999' && $result01[$i]['sort'] > $oldsort && $result01[$i]['sort'] !== '9999') {
           
            $newSort = $result01[$i]['sort'] - 1 ;
            $stmt02 = $conn->prepare("UPDATE `products` SET `sort` = ? WHERE `products`.`id` = ?");
            $stmt02->bindValue(1,$newSort);
            $stmt02->bindValue(2,$result01[$i]['id']);
            $stmt02->execute();   
        
        }
      }

    // set active Product Number to set sort for add product part

    $stmt03 = $conn->prepare("SELECT * FROM products WHERE activity=?");
    $stmt03->bindValue(1,'1');
    $stmt03->execute();

    $result03=$stmt03->fetchAll(PDO::FETCH_ASSOC);
    $activeProductNumber = count($result03);

    echo $activeProductNumber ;
    //echo $result01[$i]['sort'] ;//.' < '.$oldsort.' && '.$result01[$i]['sort'].' >= '.$sort;
    //echo 'oldsort: '.$_POST['oldsort'];
    /*
    echo $_POST['productId'].'<br>';
    echo $_POST['productName'].'<br>';
    echo $_POST['productSize'].'<br>';
    echo $_POST['productPrice'].'<br>';
    echo $_POST['productDetails'].'<br>';
    echo $_POST['sort'].'<br>';
    echo $_POST['activation'].'<br>';
    echo $_POST['img1TempSrc'].'<br>';
    echo $_POST['img2TempSrc'].'<br>';
    echo $_POST['img3TempSrc'].'<br>';
    */
} 
catch(PDOException $e) {
  echo $e->getMessage();
}
$conn = null;