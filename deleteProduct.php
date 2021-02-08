<?php

if(isset($_POST['remove'])){
    $remove = $_POST['remove'];
}

$servername = "localhost:3308";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=atiart", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("DELETE FROM products WHERE id=?");
    $stmt->bindValue(1,$remove);
    $stmt->execute();
    header("location:management.php");
   
} 
catch(PDOException $e) {
  echo $e->getMessage();
}
$conn = null;
?>