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
                <form id="addProductForm" action="addproduct.php" method="POST" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>Name</td>
                            <td>
                                <input name="productName" type="text" placeholder="write the name">
                            </td>
                        </tr>
                        <tr>
                            <td>Size</td>
                            <td>
                                <input name="productSize" type="text" placeholder="write the size">
                            </td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>
                                <input name="productPrice" type="text" placeholder="write the price">
                            </td>
                        </tr>
                        <tr>
                            <td>Details</td>
                            <td>
                                <input name="productDetails" type="text" placeholder="write details">
                            </td>
                        </tr>
                        <tr>
                            <td>Number</td>
                            <td>
                                <select name="number" id="">
                                    <option value="1">1st</option>
                                    <option value="2">2st</option>
                                    <option value="3">3st</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Activity</td>
                            <td>
                                Active<input type="radio" name="activity" value="1">
                                Deactive<input type="radio" name="activity" value="0">
                            </td>
                        </tr>
                    </table>
                    <!--
                    <div>
                    <input id="img1-copy" type="file" name="img1">
                    <input id="img2-copy" type="file" name="img1">
                    <input id="img3-copy" type="file" name="img1">
                    </div>
                    -->
                    </form>
                </div>


                <div class="pic">
                    <span class="picTitle">Image 1 (main)</span>

                    <img id="img1" class="imgPreview" src="<?php
                                                            session_start();
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
                        <form id="img1-form" action="imgshow.php" method="POST" enctype="multipart/form-data">
                            <input id="img1" type="file" name="img1"  onchange="submitFile1()">
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
                            <form id="img1-change-form" action="imgshow.php" method="POST" enctype="multipart/form-data">
                                <input type="file" name="img1"  onchange="submitChangeFile1()">
                            </form>
                        </label>
                        <button onclick="rmimg1()">Remove Image</button>
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
                        <form id="img2-form" action="imgshow.php" method="POST" enctype="multipart/form-data">
                            <input type="file" name="img2"  onchange="submitFile2()">
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
                            <form id="img2-change-form" action="imgshow.php" method="POST" enctype="multipart/form-data">
                                <input id="img2" type="file" name="img2"  onchange="submitChangeFile2()">
                            </form>
                        </label>
                        <button onclick="rmimg2()">Remove Image</button>
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
                        <form id="img3-form" action="imgshow.php" method="POST" enctype="multipart/form-data">
                            <input id="img3" type="file" name="img3" onchange="submitFile3()">
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
                            <form id="img3-change-form" action="imgshow.php" method="POST" enctype="multipart/form-data">
                                <input type="file" name="img3"  onchange="submitChangeFile3()">
                            </form>
                        </label>
                        <button onclick="rmimg3()">Remove Image</button>
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

            td9.innerHTML = "Number";

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