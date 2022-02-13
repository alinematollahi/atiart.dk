<?php

//===================================  Image 1 preview  ===================================//

// add image
if (isset($_FILES['img1Preview'])) {
    
    $imgName = $_FILES['img1Preview']['name'];
    $array = explode(".",$imgName );
    $ext = end($array);
    $newName = rand().".".$ext;

    $from = $_FILES['img1Preview']['tmp_name'];
    $to = "temp"."/".$newName;
    move_uploaded_file($from,$to);
    echo $to;
}

// change image
if (isset($_FILES['img1PreviewChange']) && isset($_POST['img1PreviewRemove'])) {
    
    if($_POST['img1PreviewRemove'] !== ''){unlink($_POST['img1PreviewRemove']);}
    
    $imgName = $_FILES['img1PreviewChange']['name'];
    $array = explode(".",$imgName );
    $ext = end($array);
    $newName = rand().".".$ext;

    $from = $_FILES['img1PreviewChange']['tmp_name'];
    $to = "temp"."/".$newName;
    move_uploaded_file($from,$to);
    echo $to;
}

// remove image
if (!isset($_FILES['img1PreviewChange']) && isset($_POST['img1PreviewRemove'])) {
    
    if($_POST['img1PreviewRemove'] !== ''){unlink($_POST['img1PreviewRemove']);}
}

//===================================  Image 2 preview  ===================================//

// add image
if (isset($_FILES['img2Preview'])) {
    
    $imgName = $_FILES['img2Preview']['name'];
    $array = explode(".",$imgName );
    $ext = end($array);
    $newName = rand().".".$ext;

    $from = $_FILES['img2Preview']['tmp_name'];
    $to = "temp"."/".$newName;
    move_uploaded_file($from,$to);
    echo $to;
}

// change image
if (isset($_FILES['img2PreviewChange']) && isset($_POST['img2PreviewRemove'])) {

    $removeImg = $_POST['img2PreviewRemove'];
    unlink($removeImg);
    
    $imgName = $_FILES['img2PreviewChange']['name'];
    $array = explode(".",$imgName );
    $ext = end($array);
    $newName = rand().".".$ext;

    $from = $_FILES['img2PreviewChange']['tmp_name'];
    $to = "temp"."/".$newName;
    move_uploaded_file($from,$to);
    echo $to;
}

// remove image
if (!isset($_FILES['img2PreviewChange']) && isset($_POST['img2PreviewRemove'])) {
    unlink($_POST['img2PreviewRemove']);
}

//===================================  Image 3 preview  ===================================//

// add image
if (isset($_FILES['img3Preview'])) {
    
    $imgName = $_FILES['img3Preview']['name'];
    $array = explode(".",$imgName );
    $ext = end($array);
    $newName = rand().".".$ext;

    $from = $_FILES['img3Preview']['tmp_name'];
    $to = "temp"."/".$newName;
    move_uploaded_file($from,$to);
    echo $to;
}

// change image
if (isset($_FILES['img3PreviewChange']) && isset($_POST['img3PreviewRemove'])) {

    $removeImg = $_POST['img3PreviewRemove'];
    unlink($removeImg);
    
    $imgName = $_FILES['img3PreviewChange']['name'];
    $array = explode(".",$imgName );
    $ext = end($array);
    $newName = rand().".".$ext;

    $from = $_FILES['img3PreviewChange']['tmp_name'];
    $to = "temp"."/".$newName;
    move_uploaded_file($from,$to);
    echo $to;
}

// remove image
if (!isset($_FILES['img3PreviewChange']) && isset($_POST['img3PreviewRemove'])) {
    unlink($_POST['img3PreviewRemove']);
}

?>