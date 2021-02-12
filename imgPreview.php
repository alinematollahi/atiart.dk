<?php

if (isset($_FILES['imgPreview'])) {
    
    $imgName = $_FILES['imgPreview']['name'];
    $array = explode(".",$imgName );
    $ext = end($array);
    $newName = rand().".".$ext;

    $from = $_FILES['imgPreview']['tmp_name'];
    $to = "temp"."/".$newName;
    move_uploaded_file($from,$to);
    echo $to;
}



if (isset($_FILES['imgPreviewChange']) && isset($_POST['removePreviousImg'])) {

    $removeImg = $_POST['removePreviousImg'];
    unlink($removeImg);
    
    $imgName = $_FILES['imgPreviewChange']['name'];
    $array = explode(".",$imgName );
    $ext = end($array);
    $newName = rand().".".$ext;

    $from = $_FILES['imgPreviewChange']['tmp_name'];
    $to = "temp"."/".$newName;
    move_uploaded_file($from,$to);
    echo $to;
}

if (!isset($_FILES['imgPreviewChange']) && isset($_POST['removePreviousImg'])) {
    unlink($_POST['removePreviousImg']);
}



?>