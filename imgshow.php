<?php
    session_start();
/*
    $_SESSION['img1'];
    $_SESSION['filesrc1'];
    $_SESSION['img2'];
    $_SESSION['filesrc2'];

    $_SESSION['img3'];
    $_SESSION['filesrc3'];
*/

$_SESSION['productName'] =$_POST['productName'];
$_SESSION['productSize'] = $_POST['productSize'];
$_SESSION['productPrice'] = $_POST['productPrice'];
$_SESSION['productDetails'] = $_POST['productDetails'];

   if (!file_exists("temp")) {
    mkdir("temp");
    }

    if (isset($_FILES['img1'])) {
    
        $imgName = $_FILES['img1']['name'];
        $array = explode(".",$imgName );
        $ext = end($array);
        $newName = rand().".".$ext;

        $from = $_FILES['img1']['tmp_name'];
        $to = "temp"."/".$newName;
        move_uploaded_file($from,$to);

        $_SESSION['img1'] = 'ok';
        $_SESSION['filesrc1'] = $to;
        $_SESSION['filename1'] = $newName;
        header("location:management.php");
        
    }

    if (isset($_FILES['img2'])) {
    
        $imgName = $_FILES['img2']['name'];
        $array = explode(".",$imgName );
        $ext = end($array);
        $newName = rand().".".$ext;

        $from = $_FILES['img2']['tmp_name'];
        $to = "temp"."/".$newName;
        move_uploaded_file($from,$to);

        $_SESSION['img2'] = 'ok';
        $_SESSION['filesrc2'] = $to;
        $_SESSION['filename2'] = $newName;
        header("location:management.php");
    }

    if (isset($_FILES['img3'])) {
    
        $imgName = $_FILES['img3']['name'];
        $array = explode(".",$imgName );
        $ext = end($array);
        $newName = rand().".".$ext;

        $from = $_FILES['img3']['tmp_name'];
        $to = "temp"."/".$newName;
        move_uploaded_file($from,$to);

        $_SESSION['img3'] = 'ok';
        $_SESSION['filesrc3'] = $to;
        $_SESSION['filename3'] = $newName;
        header("location:management.php");
    }

    //header("location:management.php?img=ok&filesrc=".$to);

    //header("location:management.php?img=ok&filesrc=".$to);

?>