<?php

// ============================================= create message ============================================= //

if( isset($_POST['userName']) && isset($_POST['userEmail']) && isset($_POST['userMessage'])){

    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $userMessage = $_POST['userMessage'];
    $messageDate = $_POST['date'];
    $messageTime = $_POST['time'];

    $servername = "localhost:3308";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=atiart", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("INSERT INTO messages (messagedate,messagetime,username,useremail,usermessage)
        VALUES (:messageDate,:messageTime,:userName,:userEmail,:userMessage)");
        $stmt->bindParam(':messageDate',$messageDate);
        $stmt->bindParam(':messageTime',$messageTime);
        $stmt->bindParam(':userName',$userName);
        $stmt->bindParam(':userEmail',$userEmail);
        $stmt->bindParam(':userMessage',$userMessage);

        $stmt->execute();
    } 
    catch(PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

}

// ============================================= get message ============================================= //

if (isset($_GET['getMessage'])){
    $servername = "localhost:3308";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=atiart", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM messages ORDER BY id DESC");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo  json_encode($result);

    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
}

// ============================================= remove message ============================================= //

if(isset($_POST['messageId'])) {

    $messageId = $_POST['messageId'];

    $servername = "localhost:3308";
    $username = "root";
    $password = "";

    try {
    $conn = new PDO("mysql:host=$servername;dbname=atiart", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("DELETE FROM messages WHERE id=?");
        $stmt->bindValue(1,$messageId);
        $stmt->execute();
    } 
    catch(PDOException $e) {
    echo $e->getMessage();
    }
    $conn = null;
}

?>