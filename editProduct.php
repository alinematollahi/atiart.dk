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



    if (isset($_GET['show'])) {echo  json_encode($result);}

    /*
    $myObj->name = "John";
    $myObj->age = 30;
    $myObj->city = "New York";
    
    $myJSON = json_encode($myObj);
    
    echo $myJSON;


    for ($i=0;$i<$productNumber;$i++) {
      
    $p->id = $result[$i]['id'];
    $p->name = $result[$i]['name'];


      $response = $p;
    }


    if (isset($_GET['show'])) {echo  json_encode($response);}
  */
} 
catch(PDOException $e) {
  echo $e->getMessage();
}
$conn = null;

//var_dump($response);


    
?>