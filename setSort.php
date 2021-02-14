<?php
$servername = "localhost:3308";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=atiart", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $stmt = $conn->prepare("SELECT * FROM products ORDER BY sort");
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $productNumber = count($result);
    
    
    
    $stmt01 = $conn->prepare("SELECT * FROM products WHERE activity=?");
    $stmt01->bindValue(1,'1');
    $stmt01->execute();

    $result01=$stmt01->fetchAll(PDO::FETCH_ASSOC);
    $activeProductNumber = count($result01);  
    
    echo $activeProductNumber;
} 
catch(PDOException $e) {
  echo $e->getMessage();
}
$conn = null;

?>