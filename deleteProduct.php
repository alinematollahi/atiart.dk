<?php

if(isset($_POST['remove'])){
    $remove = $_POST['remove'];
}
if(isset($_POST['rmSort'])){
    $rmSort = $_POST['rmSort'];
}

//var_dump($_POST['rmSort']);

$servername = "localhost:3308";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=atiart", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("DELETE FROM products WHERE id=?");
    $stmt->bindValue(1,$remove);
    $stmt->execute();

    //header("location:management.php");
} 
catch(PDOException $e) {
  echo $e->getMessage();
}
$conn = null;

try {
    $conn = new PDO("mysql:host=$servername;dbname=atiart", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
      $stmt01 = $conn->prepare("SELECT * FROM products ORDER BY sort");
      //$stmt01->bindValue(1,$rmSort);
      $stmt01->execute();
      $result01 = $stmt01->fetchAll(PDO::FETCH_ASSOC);
      $resNumber=count($result01);

      for ($i=0;$i<$resNumber;$i++) {
        if($result01[$i]['sort']>$rmSort && $result01 !== '9999') {
            $newSort = $result01[$i]['sort'] - 1 ;

            $stmt02 = $conn->prepare("UPDATE `products` SET `sort` = ? WHERE `products`.`id` = ?");
            $stmt02->bindValue(1,$newSort);
            $stmt02->bindValue(2,$result01[$i]['id']);
            $stmt02->execute();

        }
      }
  
      header("location:management.php");
  } 
  catch(PDOException $e) {
    echo $e->getMessage();
  }
  $conn = null;
?>