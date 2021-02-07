<?php
session_start();


$servername = "localhost:3308";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=atiart", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //$stmt = $conn->prepare("INSERT INTO products (name,size,price,details,sort,activity,img1src,img2src,img3src)
  //VALUES (:name,:size,:price,:details,:sort,:activity,:img1src,:img2src,:img3src)");

    //$stmt->bindParam(':name',$productName);
    $stmt = $conn->prepare("SELECT * FROM products");
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $productNumber = count($result);
    
    $stmt01 = $conn->prepare("SELECT * FROM products WHERE activity=?");
    $stmt01->bindValue(1,'1');
    $stmt01->execute();

    $result01=$stmt01->fetchAll(PDO::FETCH_ASSOC);
    $activeProductNumber = count($result01);   
} 
catch(PDOException $e) {
  echo $e->getMessage();
}
$conn = null;

if (isset($_POST['productName'])) {
    $_SESSION['productName'] =$_POST['productName'];
}
if (isset($_POST['productSize'])) {
    $_SESSION['productSize'] =$_POST['productSize'];
}
if (isset($_POST['productPrice'])) {
    $_SESSION['productPrice'] =$_POST['productPrice'];
}
if (isset($_POST['productDetails'])) {
    $_SESSION['productDetails'] =$_POST['productDetails'];
}
if (isset($_POST['sort'])) {
    $_SESSION['sort'] =$_POST['sort'];
}
if (isset($_POST['activity'])) {
    $_SESSION['activity'] =$_POST['activity'];
} 
/*
var_dump($_POST['productName']);
var_dump($_POST['productSize']);
var_dump($_POST['productPrice']);
var_dump($_POST['productDetails']);
var_dump($_POST['sort']);
var_dump($_POST['activity']);
*/

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
       // header("location:management.php");
        
    }

    if (isset($_POST['remove1'])){
        unlink($_SESSION['filesrc1']);
        $_SESSION['img1'] =null;
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
        //header("location:management.php");
    }

    if (isset($_POST['remove2'])){
        unlink($_SESSION['filesrc2']);
        $_SESSION['img2'] =null;
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
        //header("location:management.php");
    }

    if (isset($_POST['remove3'])){
        unlink($_SESSION['filesrc3']);
        $_SESSION['img3'] =null;
    }


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>management</title>
    <link rel="stylesheet" href="management.css">
</head>

<body>
    <button onclick="f()">click</button>
    <div>

        <div id="addProduct" class="productBox">
            <!--
                <form id="addProductForm" action="addproduct.php" method="POST" enctype="multipart/form-data">
            -->
            <div class="tableDiv">
                <form id="addProductForm" action="addproduct.php" method="POST">
                <form id="addToSession" action="management.php" method="POST">
                    <table>
                        <tr>
                            <td>Name</td>
                            <td>
                                <input id="productName" name="productName" type="text" placeholder="write the name"
                                value="<?php
                                
                                if (isset($_SESSION['productName'])) {
                                    echo $_SESSION['productName'];
                                } else {
                                    echo '';
                                }
                                ?>"
                                onchange="setValue()">
                            </td>
                        </tr>
                        <tr>
                            <td>Size</td>
                            <td>
                                <input id="productSize" name="productSize" type="text" placeholder="write the size"
                                value="<?php
                                
                                if (isset($_SESSION['productSize'])) {
                                    echo $_SESSION['productSize'];
                                } else {
                                    echo '';
                                }
                                ?>"
                                onchange="setValue()">
                            </td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>
                                <input id="productPrice" name="productPrice" type="text" placeholder="write the price"
                                value="<?php
                                
                                if (isset($_SESSION['productPrice'])) {
                                    echo $_SESSION['productPrice'];
                                } else {
                                    echo '';
                                }
                                ?>"
                                onchange="setValue()">
                            </td>
                        </tr>
                        <tr>
                            <td>Details</td>
                            <td>
                                <input id="productDetails" name="productDetails" type="text" placeholder="write details"
                                value="<?php
                                
                                if (isset($_SESSION['productDetails'])) {
                                    echo $_SESSION['productDetails'];
                                } else {
                                    echo '';
                                }
                                ?>"
                                onchange="setValue()">
                            </td>
                        </tr>
                        <tr>
                            <td>Sort</td>
                            <td>
                                <select name="sort" id="sort" onchange="setValue()">
                                <?php
                                for($i=$activeProductNumber+1;$i>=1;$i--){
                                    echo '<option value="'.$i.'" ';
                                    if (isset($_SESSION['sort']) && $_SESSION['sort']==$i) {echo "selected";}
                                    echo ' >'.$i.'st</option>';
                                }
                                ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Activity</td>
                            <td>
                                Active<input type="radio" name="activity" value="1"  onchange="setValue()" 
                                <?php
                                if (!isset($_SESSION['activity'])){
                                    echo "checked";
                                } else if (isset($_SESSION['activity']) && $_SESSION['activity']==1) {
                                        echo "checked";
                                    }
                                ?>>
                                Deactive<input type="radio" name="activity" value="0" onchange="setValue()"
                                <?php
                                if (isset($_SESSION['activity']) && $_SESSION['activity']==0) {
                                    echo "checked";
                                }
                                ?>>
                            </td>
                        </tr>
                    </table>
                </form>
                </form>
            </div>


            <div class="pic">
                <span class="picTitle">Image 1 (main)</span>

                <img id="img1" class="imgPreview" src="<?php

                                                        if (isset($_SESSION['img1'])) {
                                                            echo $_SESSION['filesrc1'];
                                                        } else {
                                                            echo '';
                                                        }
                                                        ?> 
                    " style="display:                         
                    <?php
                    if (isset($_SESSION['img1'])) {
                        echo 'block';
                    } else {
                        echo 'none';
                    }
                    ?>
                    ;" />
                <label id="label1" class="browse" style="display: 
                    <?php
                    if (isset($_SESSION['img1'])) {
                        echo 'none';
                    } else {
                        echo 'block';
                    }
                    ?>
                    ;">
                    <form id="img1-form" action="management.php" method="POST" enctype="multipart/form-data">
                        <input id="img1" type="file" name="img1" onchange="submitFile1()">
                        <div>
                            <input name="productName" type="hidden" class="name-copy">
                            <input name="productSize" type="hidden" class="size-copy">
                            <input name="productPrice" type="hidden" class="price-copy">
                            <input name="productDetails" type="hidden" class="details-copy">
                            <input name="sort" type="hidden" class="sort-copy">
                            <input name="activity" type="hidden" class="activity-copy">
                        </div>
                    </form>
                </label>
                <div id="btnDiv1" class="btnDiv" style="display: 
                    <?php
                    if (isset($_SESSION['img1'])) {
                        echo 'block';
                    } else {
                        echo 'none';
                    }
                    ?>
                    ;">
                    <label class="browse-change">
                        <form id="img1-change-form" action="management.php" method="POST" enctype="multipart/form-data">
                            <input type="file" name="img1" onchange="submitChangeFile1()">
                            <div>
                            <input name="productName" type="hidden" class="name-copy">
                            <input name="productSize" type="hidden" class="size-copy">
                            <input name="productPrice" type="hidden" class="price-copy">
                            <input name="productDetails" type="hidden" class="details-copy">
                            <input name="sort" type="hidden" class="sort-copy" >
                            <input name="activity" type="hidden" class="activity-copy">
                        </div>
                        </form>
                    </label>
                    <form action="management.php" method="POST">
                    <button type="submit" onclick="rmimg1()" name="remove1">Remove Image</button>
                    </form>
                </div>
            </div>



            <div class="pic">
                <span class="picTitle">Image 2</span>

                <img id="img2" class="imgPreview" src=<?php
                                                        if (isset($_SESSION['img2'])) {
                                                            echo $_SESSION['filesrc2'];
                                                        }
                                                        ?> style="display: 
                    <?php
                    if (isset($_SESSION['img2'])) {
                        echo 'block';
                    } else {
                        echo 'none';
                    }
                    ?>
                    ;" />
                <label id="label2" class="browse" style="display: 
                    <?php
                    if (isset($_SESSION['img2'])) {
                        echo 'none';
                    } else {
                        echo 'block';
                    }
                    ?>
                    ;">
                    <form id="img2-form" action="management.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="img2" onchange="submitFile2()">
                        <div>
                            <input name="productName" type="hidden" class="name-copy">
                            <input name="productSize" type="hidden" class="size-copy">
                            <input name="productPrice" type="hidden" class="price-copy">
                            <input name="productDetails" type="hidden" class="details-copy">
                            <input name="sort" type="hidden" class="sort-copy" >
                            <input name="activity" type="hidden" class="activity-copy">
                        </div>
                    </form>
                </label>
                <div id="btnDiv2" class="btnDiv" style="display: 
                    <?php
                    if (isset($_SESSION['img2'])) {
                        echo 'block';
                    } else {
                        echo 'none';
                    }
                    ?>
                    ;">
                    <label class="browse-change">
                        <form id="img2-change-form" action="management.php" method="POST" enctype="multipart/form-data">
                            <input id="img2" type="file" name="img2" onchange="submitChangeFile2()">
                            <div>
                                <input name="productName" type="hidden" class="name-copy">
                                <input name="productSize" type="hidden" class="size-copy">
                                <input name="productPrice" type="hidden" class="price-copy">
                                <input name="productDetails" type="hidden" class="details-copy">
                                <input name="sort" type="hidden" class="sort-copy" >
                                <input name="activity" type="hidden" class="activity-copy">
                            </div>
                        </form>
                    </label>
                    <form  action="management.php" method="POST">
                    <button type="submit" onclick="rmimg2()" name="remove2">Remove Image</button>
                    </form>
                </div>
            </div>

            <div class="pic">
                <span class="picTitle">Image 3</span>

                <img id="img3" class="imgPreview" src=<?php
                                                        if (isset($_SESSION['img3'])) {
                                                            echo $_SESSION['filesrc3'];
                                                        }
                                                        ?> style="display: 
                    <?php
                    if (isset($_SESSION['img3'])) {
                        echo 'block';
                    } else {
                        echo 'none';
                    }
                    ?>
                    ;" />
                <label id="label3" class="browse" style="display: 
                    <?php
                    if (isset($_SESSION['img3'])) {
                        echo 'none';
                    } else {
                        echo 'block';
                    }
                    ?>
                    ;">
                    <form id="img3-form" action="management.php" method="POST" enctype="multipart/form-data">
                        <input id="img3" type="file" name="img3" onchange="submitFile3()">
                        <div>
                            <input name="productName" type="hidden" class="name-copy">
                            <input name="productSize" type="hidden" class="size-copy">
                            <input name="productPrice" type="hidden" class="price-copy">
                            <input name="productDetails" type="hidden" class="details-copy">
                            <input name="sort" type="hidden" class="sort-copy" >
                            <input name="activity" type="hidden" class="activity-copy">
                        </div>
                    </form>
                </label>
                <div id="btnDiv3" class="btnDiv" style="display: 
                    <?php
                    if (isset($_SESSION['img3'])) {
                        echo 'block';
                    } else {
                        echo 'none';
                    }
                    ?>
                    ;">
                    <label class="browse-change">
                        <form id="img3-change-form" action="management.php" method="POST" enctype="multipart/form-data">
                            <input type="file" name="img3" onchange="submitChangeFile3()">
                            <div>
                            <input name="productName" type="hidden" class="name-copy">
                            <input name="productSize" type="hidden" class="size-copy">
                            <input name="productPrice" type="hidden" class="price-copy">
                            <input name="productDetails" type="hidden" class="details-copy">
                            <input name="sort" type="hidden" class="sort-copy" >
                            <input name="activity" type="hidden" class="activity-copy">
                        </div>
                        </form>
                    </label>
                    <form  action="management.php" method="POST">
                    <button type="submit" onclick="rmimg3()" name="remove3">Remove Image</button>
                    </form>
                </div>
            </div>



            <div class="setDiv">
                <div class="saveDiv">
                    <button class="savebtn" onclick="submitForm()">Save Changes</button>
                    <button class="cancelbtn">Cancel</button>
                </div>
            </div>
            <!--
            </form>
            -->
        </div>

    </div>


    <div id="container"></div>

    <script>
        function setValue() {
            var productName = document.getElementById("productName");
            var productSize = document.getElementById("productSize");
            var productPrice = document.getElementById("productPrice");
            var productDetails = document.getElementById("productDetails");

            var sort = document.getElementById("sort");
            var sortValue = sort.options[sort.selectedIndex];

            var activity = document.querySelector("input[type='radio'][name='activity']:checked");

            var nameCopy = document.getElementsByClassName("name-copy");
            for (var i1=0 ; i1<nameCopy.length ; i1++) {
                nameCopy[i1].value = productName.value;
            }
            var sizeCopy = document.getElementsByClassName("size-copy");
            for (var i2=0 ; i2<sizeCopy.length ; i2++) {
                sizeCopy[i2].value = productSize.value;
            }
            var priceCopy = document.getElementsByClassName("price-copy");
            for (var i3=0 ; i3<priceCopy.length ; i3++) {
                priceCopy[i3].value = productPrice.value;
            }
            var detailsCopy = document.getElementsByClassName("details-copy");
            for (var i4=0 ; i4<detailsCopy.length ; i4++) {
                detailsCopy[i4].value = productDetails.value;
            }
            var sortCopy = document.getElementsByClassName("sort-copy");
            for (var i5=0 ; i5<sortCopy.length ; i5++) {
                sortCopy[i5].value = sortValue.value;
            }
            var activityCopy = document.getElementsByClassName("activity-copy");
            for (var i6=0 ; i6<activityCopy.length ; i6++) {
                activityCopy[i6].value = activity.value;
            }
        }
        
        window.addEventListener("load",setValue);
        
    </script>

    <script>
        function submitForm() {
            let addForm = document.getElementById("addProductForm");
            /*
            let img1 =  document.getElementById("img1");
            let img2 =  document.getElementById("img2");
            let img3 =  document.getElementById("img3");
            let img1Copy =  document.getElementById("img1-copy");
            let img2Copy =  document.getElementById("img2-copy");
            let img3Copy =  document.getElementById("img3-copy");

            img1Copy = img1;
            img2Copy = img2;
            img3Copy = img3;
            console.log(img1Copy.src);
            console.log(img2Copy.src);
            console.log(img3Copy.src);
            //alert(img1);
            //alert(img1Copy);

            */

            addForm.submit();
        }
    </script>

    <script>
        function submitFile1() {
            
            //var addToSessionForm = document.getElementById("addToSession");
            //addToSessionForm.submit();

            var imgForm1 = document.getElementById("img1-form");
            imgForm1.submit();
        }

        function submitFile2() {
            var imgForm2 = document.getElementById("img2-form");
            imgForm2.submit();
        }

        function submitFile3() {
            var imgForm3 = document.getElementById("img3-form");
            imgForm3.submit();
        }

        function submitChangeFile1() {
            var imgChangeForm1 = document.getElementById("img1-change-form");
            imgChangeForm1.submit();
        }

        function submitChangeFile2() {
            var imgChangeForm2 = document.getElementById("img2-change-form");
            imgChangeForm2.submit();
        }

        function submitChangeFile3() {
            var imgChangeForm3 = document.getElementById("img3-change-form");
            imgChangeForm3.submit();
        }

        function rmimg1() {
            let img1 = document.getElementById("img1");
            img1.style.display = "none";
            let label1 = document.getElementById("label1");
            label1.style.display = "block";
            let btnDiv1 = document.getElementById("btnDiv1");
            btnDiv1.style.display = "none";
        }

        function rmimg2() {
            let img2 = document.getElementById("img2");
            img2.style.display = "none";
            let label2 = document.getElementById("label2");
            label2.style.display = "block";
            let btnDiv2 = document.getElementById("btnDiv2");
            btnDiv2.style.display = "none";
        }

        function rmimg3() {
            let img3 = document.getElementById("img3");
            img3.style.display = "none";
            let label3 = document.getElementById("label3");
            label3.style.display = "block";
            let btnDiv3 = document.getElementById("btnDiv3");
            btnDiv3.style.display = "none";
        }
    </script>

    <script>
        function f() {


            var container = document.getElementById("container");
            var productBox = document.createElement("div");
            productBox.classList = "productBox";
            container.appendChild(productBox);

            //====================================pic1=======================================

            var pic1 = document.createElement("div");
            pic1.classList = "pic";
            productBox.appendChild(pic1);

            var span1 = document.createElement("span");
            span1.classList = "picTitle";
            pic1.appendChild(span1);
            span1.innerHTML = "Image 1 (main)";

            var img1 = document.createElement("img");
            img1.classList = "imgPreview";
            pic1.appendChild(img1);
            /*
                        var addbtn1 = document.createElement("button");
                        addbtn1.classList = "addbtn";
                        pic1.appendChild(addbtn1);
                        addbtn1.innerHTML = "Add Image"
            */
            var label1 = document.createElement("label");
            label1.classList = "browse";
            pic1.appendChild(label1);

            var inputFile1 = document.createElement("input");
            inputFile1.type = "file";
            label1.appendChild(inputFile1);

            var btnDiv1 = document.createElement("div");
            btnDiv1.classList = "btnDiv";
            pic1.appendChild(btnDiv1);

            var chbtn1 = document.createElement("button");
            //chbtn1.classList = "";
            btnDiv1.appendChild(chbtn1);
            chbtn1.innerHTML = "Change Image";

            var rmbtn1 = document.createElement("button");
            //rmbtn1.classList = "";
            btnDiv1.appendChild(rmbtn1);
            rmbtn1.innerHTML = "Remove Image";

            //====================================pic2=======================================

            var pic2 = document.createElement("div");
            pic2.classList = "pic";
            productBox.appendChild(pic2);

            var span2 = document.createElement("span");
            span2.classList = "picTitle";
            pic2.appendChild(span2);
            span2.innerHTML = "Image 2";

            var img2 = document.createElement("img");
            img2.classList = "imgPreview";
            pic2.appendChild(img2);
            /*
                        var addbtn2 = document.createElement("button");
                        addbtn2.classList = "addbtn";
                        pic2.appendChild(addbtn2);
                        addbtn2.innerHTML = "Add Image"
            */

            var label2 = document.createElement("label");
            label2.classList = "browse";
            pic2.appendChild(label2);

            var inputFile2 = document.createElement("input");
            inputFile2.type = "file";
            label2.appendChild(inputFile2);

            var btnDiv2 = document.createElement("div");
            btnDiv2.classList = "btnDiv";
            pic2.appendChild(btnDiv2);

            var chbtn2 = document.createElement("button");
            //chbtn2.classList = "";
            btnDiv2.appendChild(chbtn2);
            chbtn2.innerHTML = "Change Image";

            var rmbtn2 = document.createElement("button");
            //rmbtn2.classList = "";
            btnDiv2.appendChild(rmbtn2);
            rmbtn2.innerHTML = "Remove Image";


            //====================================pic3=======================================

            var pic3 = document.createElement("div");
            pic3.classList = "pic";
            productBox.appendChild(pic3);

            var span3 = document.createElement("span");
            span3.classList = "picTitle";
            pic3.appendChild(span3);
            span3.innerHTML = "Image 3";

            var img3 = document.createElement("img");
            img3.classList = "imgPreview";
            pic3.appendChild(img3);

            /*
            var addbtn3 = document.createElement("button");
            addbtn3.classList = "addbtn";
            pic3.appendChild(addbtn3);
            addbtn3.innerHTML = "Add Image"
            */

            var label3 = document.createElement("label");
            label3.classList = "browse";
            pic3.appendChild(label3);

            var inputFile3 = document.createElement("input");
            inputFile3.type = "file";
            label3.appendChild(inputFile3);

            var btnDiv3 = document.createElement("div");
            btnDiv3.classList = "btnDiv";
            pic3.appendChild(btnDiv3);

            var chbtn3 = document.createElement("button");
            //chbtn3.classList = "";
            btnDiv3.appendChild(chbtn3);
            chbtn3.innerHTML = "Change Image";

            var rmbtn3 = document.createElement("button");
            //rmbtn3.classList = "";
            btnDiv3.appendChild(rmbtn3);
            rmbtn3.innerHTML = "Remove Image";


            //====================================table=======================================

            var tableDiv = document.createElement("div");
            tableDiv.classList = "tableDiv";
            productBox.appendChild(tableDiv);

            var productTable = document.createElement("table");
            tableDiv.appendChild(productTable);

            var tr1 = document.createElement("tr");
            productTable.appendChild(tr1);

            var td1 = document.createElement("td");
            tr1.appendChild(td1);

            td1.innerHTML = "Name";

            var td2 = document.createElement("td");
            tr1.appendChild(td2);

            var tr2 = document.createElement("tr");
            productTable.appendChild(tr2);

            var td3 = document.createElement("td");
            tr2.appendChild(td3);

            td3.innerHTML = "Size";

            var td4 = document.createElement("td");
            tr2.appendChild(td4);

            var tr3 = document.createElement("tr");
            productTable.appendChild(tr3);

            var td5 = document.createElement("td");
            tr3.appendChild(td5);

            td5.innerHTML = "Price";

            var td6 = document.createElement("td");
            tr3.appendChild(td6);

            var tr4 = document.createElement("tr");
            productTable.appendChild(tr4);

            var td7 = document.createElement("td");
            tr4.appendChild(td7);

            td7.innerHTML = "Details";

            var td8 = document.createElement("td");
            tr4.appendChild(td8);

            var tr5 = document.createElement("tr");
            productTable.appendChild(tr5);

            var td9 = document.createElement("td");
            tr5.appendChild(td9);

            td9.innerHTML = "Sort";

            var td10 = document.createElement("td");
            tr5.appendChild(td10);

            var tr6 = document.createElement("tr");
            productTable.appendChild(tr6);

            var td11 = document.createElement("td");
            tr6.appendChild(td11);

            td11.innerHTML = "Activity";

            var td12 = document.createElement("td");
            tr6.appendChild(td12);

            //====================================set buttons=======================================

            var setDiv = document.createElement("div");
            setDiv.classList = "setDiv";
            productBox.appendChild(setDiv);

            var editDiv = document.createElement("div");
            editDiv.classList = "editDiv";
            setDiv.appendChild(editDiv);

            var editbtn = document.createElement("button");
            editbtn.classList = "editbtn";
            editDiv.appendChild(editbtn);
            editbtn.innerHTML = "Edit Product"

            var rmbtn = document.createElement("button");
            rmbtn.classList = "rmbtn";
            editDiv.appendChild(rmbtn);
            rmbtn.innerHTML = "Remove Product"

            var saveDiv = document.createElement("div");
            saveDiv.classList = "saveDiv";
            setDiv.appendChild(saveDiv);

            var savebtn = document.createElement("button");
            savebtn.classList = "savebtn";
            saveDiv.appendChild(savebtn);
            savebtn.innerHTML = "Save Changes";

            var cancelbtn = document.createElement("button");
            cancelbtn.classList = "cancelbtn";
            saveDiv.appendChild(cancelbtn);
            cancelbtn.innerHTML = "Cancel";
        }
    </script>
</body>

</html>