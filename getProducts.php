<?php
    $servername = "localhost:3308";
    $username = "root";
    $password = "";
    
    try {
      $conn = new PDO("mysql:host=$servername;dbname=atiart", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
      // get products befor add to set sort
    
      $stmt = $conn->prepare("SELECT * FROM products  ORDER BY sort");
      //$stmt->bindValue(1,'1');
            
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $resNumber=count($result);

      if (isset($_POST['getProducts'])) {echo  json_encode($result);}

    } 
    catch(PDOException $e) {
      echo $e->getMessage();
    }
    $conn = null;
?>