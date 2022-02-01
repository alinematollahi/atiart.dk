<html lang="en" id="pageBackground">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="management.css">
    <script src="https://kit.fontawesome.com/6dba727b51.js" crossorigin="anonymous"></script>
    <title>AtiArt-Management</title>
</head>

<body>
    <div id="messages"></div>
    <div id="management-start">
        <div class="management-start-txt"> Welcome to AtiArt Management</div>
        <div class="management-start-btn">
            <button id="select-products" type="button">Manage Products</button>
        </div>
        <div class="management-start-btn">
        <button id="select-messages" type="button">Manage Messages</button>
        </div>   
    </div>

    <div id="addProduct">
        <div id="addProduct-head">Manage Products</div>
        <!--<button id="backToManageHome" type="button"> Back to Management Home </button>
        <div id="statistics">
            <div>Total Products Number</div>
            <div>Active Products Number</div>
            <div>Deactive Products Number</div>
        </div>-->
        <div id="addProductBtnDiv">
            <button id="addBtn" type="button">Add New Product</button>
        </div>
        <div id="addProductBox" class="productBox">
            <form class="addProductForm" method="POST" enctype="multipart/form-data">
                <div class="tableDiv">
                    <table>
                        <tr>
                            <td>Name</td>
                            <td>
                                <input class="productName" name="productName" type="text" placeholder="write the name">
                            </td>
                        </tr>
                        <tr>
                            <td>Size</td>
                            <td>
                                <input class="productSize" name="productSize" type="text" placeholder="write the size">
                            </td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>
                                <input class="productPrice" name="productPrice" type="text" placeholder="write the price">
                            </td>
                        </tr>
                        <tr>
                            <td>Details</td>
                            <td>
                                <input class="productDetails" name="productDetails" type="text" placeholder="write details">
                            </td>
                        </tr>
                        <tr>
                            <td>Sort</td>
                            <td>
                                <select name="sort" class="sort">

                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>Activation</td>
                            <td>
                                Active<input type="radio" name="activation" value="1" class="activation" checked>
                                Deactive<input type="radio" name="activation" value="0" class="activation">
                            </td>
                        </tr>
                    </table>

                </div>


                <div class="pic">
                    <span class="picTitle">Image 1 (main)</span>

                    <img class="img1AddPreview  imgAddPreview" />
                    <label class="browse">
                        <input type="file" name="img1Preview" class="img1PreviewInput">
                        <input type="hidden" name="img1TempSrc">
                    </label>
                    <div class="btnDiv">
                        <label class="browse-change">

                            <input type="file" name="img1Preview" class="img1PreviewChange">
                            <input type="hidden" name="img1PreviewRemove">

                        </label>
                        <button class="img1PreviewRemove" type="button">Remove Image</button>
                    </div>
                </div>

                <div class="pic">
                    <span class="picTitle">Image 2</span>

                    <img class="img2AddPreview , imgAddPreview" />
                    <label class="browse">
                        <input type="file" name="img2Preview" class="img2PreviewInput">
                        <input type="hidden" name="img2TempSrc">
                    </label>
                    <div class="btnDiv">
                        <label class="browse-change">

                            <input type="file" name="img2Preview" class="img2PreviewChange">
                            <input type="hidden" name="img2PreviewRemove">

                        </label>
                        <button class="img2PreviewRemove" type="button">Remove Image</button>
                    </div>
                </div>

                <div class="pic">
                    <span class="picTitle">Image 3</span>

                    <img class="img3AddPreview , imgAddPreview" />
                    <label class="browse">
                        <input type="file" name="img3Preview" class="img3PreviewInput">
                        <input type="hidden" name="img3TempSrc">
                    </label>
                    <div class="btnDiv">
                        <label class="browse-change">

                            <input type="file" name="img3Preview" class="img3PreviewChange">
                            <input type="hidden" name="img3PreviewRemove">

                        </label>
                        <button class="img3PreviewRemove" type="button">Remove Image</button>
                    </div>
                </div>


                <div class="setDiv">
                    <div class="saveDiv">
                        <button class="savebtn" type="button">Save Changes</button>
                        <button id="cancelAddProduct" class="cancelbtn" type="button">Cancel</button>
                    </div>
                </div>
            </form>
        </div>


    </div>

    <div id="showProducts">
        <span id="showProductsHeader"> Product List </span>
    </div>
    <div id="manage-messages">
        <span>Messages List</span>
        <table id="messageTable">
            <tr>
                <td class="date">Date</td>
                <td class="time">Time</td>
                <td class="user-name">User Name</td>
                <td class="user-email">User Email</td>
                <td class="message-txt">Message</td>
                <td class="remove-message" id="remove-header">Remove</td>
            </tr>
        </table>
    </div>

<script src="manageMessages.js"></script>
<script>
//=============================================== Add preview image ===============================================//    

            let img1PreviewInput = document.getElementsByClassName("img1PreviewInput");
            for (i = 0; i < img1PreviewInput.length; i++) {
                img1PreviewInput[i].addEventListener("change", function() {

                    let files = this.files;
                    let file = files[0];
                    let formData = new FormData();

                    formData.append('img1Preview', file, file.name);
                    let img = this;
                    let xhr = new XMLHttpRequest();
                    xhr.onload = function() {
                        if (xhr.status == 200) {
                            img.parentElement.previousElementSibling.src = xhr.responseText;
                            img.nextElementSibling.value = xhr.responseText;
                            img.parentElement.previousElementSibling.style.display = "block";
                            img.parentElement.style.display = "none";
                            img.parentElement.nextElementSibling.style.display = "block";

                            img.parentElement.nextElementSibling.firstElementChild.firstElementChild.nextElementSibling.value = xhr.responseText;
                        } else {
                            document.write('err');
                        }
                    };

                    xhr.open('POST', 'imgPreview.php', true);
                    xhr.send(formData);
                });
            }

            let img2PreviewInput = document.getElementsByClassName("img2PreviewInput");
            for (i = 0; i < img2PreviewInput.length; i++) {
                img2PreviewInput[i].addEventListener("change", function() {

                    let files = this.files;
                    let file = files[0];
                    let formData = new FormData();

                    formData.append('img2Preview', file, file.name);
                    let img = this;
                    let xhr = new XMLHttpRequest();
                    xhr.onload = function() {
                        if (xhr.status == 200) {
                            img.parentElement.previousElementSibling.src = xhr.responseText;
                            img.nextElementSibling.value = xhr.responseText;
                            img.parentElement.previousElementSibling.style.display = "block";
                            img.parentElement.style.display = "none";
                            img.parentElement.nextElementSibling.style.display = "block";

                            img.parentElement.nextElementSibling.firstElementChild.firstElementChild.nextElementSibling.value = xhr.responseText;
                        } else {
                            document.write('err');
                        }
                    };

                    xhr.open('POST', 'imgPreview.php', true);
                    xhr.send(formData);
                });
            }

            let img3PreviewInput = document.getElementsByClassName("img3PreviewInput");
            for (i = 0; i < img3PreviewInput.length; i++) {
                img3PreviewInput[i].addEventListener("change", function() {

                    let files = this.files;
                    let file = files[0];
                    let formData = new FormData();

                    formData.append('img3Preview', file, file.name);
                    let img = this;
                    let xhr = new XMLHttpRequest();
                    xhr.onload = function() {
                        if (xhr.status == 200) {
                            img.parentElement.previousElementSibling.src = xhr.responseText;
                            img.nextElementSibling.value = xhr.responseText;
                            img.parentElement.previousElementSibling.style.display = "block";
                            img.parentElement.style.display = "none";
                            img.parentElement.nextElementSibling.style.display = "block";

                            img.parentElement.nextElementSibling.firstElementChild.firstElementChild.nextElementSibling.value = xhr.responseText;
                        } else {
                            document.write('err');
                        }
                    };

                    xhr.open('POST', 'imgPreview.php', true);
                    xhr.send(formData);
                });
            }

//=============================================== Change preview image ===============================================//

            let img1PreviewChange = document.getElementsByClassName("img1PreviewChange");
            for (i = 0; i < img1PreviewChange.length; i++) {
                img1PreviewChange[i].addEventListener("change", changePreviewImage);
            }   
                function changePreviewImage() {

                    let files = this.files;
                    let file = files[0];
                    let formData = new FormData();
                    let imgChanged = this;
                    let removeImg = imgChanged.nextElementSibling.value;
                    formData.append('img1PreviewChange', file, file.name);
                    formData.append('img1PreviewRemove', removeImg);

                    let xhr = new XMLHttpRequest();
                    xhr.onload = function() {
                        if (xhr.status == 200) {
                            imgChanged.parentElement.parentElement.previousElementSibling.previousElementSibling.src = xhr.responseText;
                            imgChanged.parentElement.parentElement.previousElementSibling.children[2].value = xhr.responseText;
                            imgChanged.nextElementSibling.value = xhr.responseText;
                        } else {
                            document.write('err');
                        }
                    };

                    xhr.open('POST', 'imgPreview.php', true);
                    xhr.send(formData);
                }
            

            let img2PreviewChange = document.getElementsByClassName("img2PreviewChange");
            for (i = 0; i < img1PreviewChange.length; i++) {
                img2PreviewChange[i].addEventListener("change", function() {

                    let files = this.files;
                    let file = files[0];
                    let formData = new FormData();
                    let imgChanged = this;
                    let removeImg = imgChanged.nextElementSibling.value;
                    formData.append('img2PreviewChange', file, file.name);
                    formData.append('img2PreviewRemove', removeImg);

                    let xhr = new XMLHttpRequest();
                    xhr.onload = function() {
                        if (xhr.status == 200) {
                            imgChanged.parentElement.parentElement.previousElementSibling.previousElementSibling.src = xhr.responseText;
                            imgChanged.parentElement.parentElement.previousElementSibling.children[2].value = xhr.responseText;
                            imgChanged.nextElementSibling.value = xhr.responseText;
                        } else {
                            document.write('err');
                        }
                    };

                    xhr.open('POST', 'imgPreview.php', true);
                    xhr.send(formData);
                });
            }

            let img3PreviewChange = document.getElementsByClassName("img3PreviewChange");
            for (i = 0; i < img1PreviewChange.length; i++) {
                img3PreviewChange[i].addEventListener("change", function() {

                    let files = this.files;
                    let file = files[0];
                    let formData = new FormData();
                    let imgChanged = this;
                    let removeImg = imgChanged.nextElementSibling.value;
                    formData.append('img3PreviewChange', file, file.name);
                    formData.append('img3PreviewRemove', removeImg);

                    let xhr = new XMLHttpRequest();
                    xhr.onload = function() {
                        if (xhr.status == 200) {
                            imgChanged.parentElement.parentElement.previousElementSibling.previousElementSibling.src = xhr.responseText;
                            imgChanged.parentElement.parentElement.previousElementSibling.children[2].value = xhr.responseText;
                            imgChanged.nextElementSibling.value = xhr.responseText;
                        } else {
                            document.write('err');
                        }
                    };

                    xhr.open('POST', 'imgPreview.php', true);
                    xhr.send(formData);
                });
            }

//=============================================== Remove preview image ===============================================//

            let img1PreviewRemove = document.getElementsByClassName("img1PreviewRemove");
            for (i = 0; i < img1PreviewRemove.length; i++) {
                img1PreviewRemove[i].addEventListener("click", function() {

                    let formData = new FormData();

                    let removeImg = this.previousElementSibling.firstElementChild.nextElementSibling.value;
                    formData.append('img1PreviewRemove', removeImg);

                    let rm = this;
                    let xhr = new XMLHttpRequest();
                    xhr.onload = function() {
                        if (xhr.status == 200) {
                            rm.parentElement.previousElementSibling.firstElementChild.value = "";
                            rm.parentElement.previousElementSibling.previousElementSibling.src = "";
                            rm.parentElement.previousElementSibling.children[2].value = "";
                            rm.parentElement.previousElementSibling.previousElementSibling.style.display = "none";
                            rm.parentElement.previousElementSibling.style.display = "block";
                            rm.parentElement.style.display = "none";
                        } else {
                            document.write('err');
                        }
                    };

                    xhr.open('POST', 'imgPreview.php', true);
                    xhr.send(formData);
                });
            }

            let img2PreviewRemove = document.getElementsByClassName("img2PreviewRemove");
            for (i = 0; i < img2PreviewRemove.length; i++) {
                img2PreviewRemove[i].addEventListener("click", function() {

                    let formData = new FormData();

                    let removeImg = this.previousElementSibling.firstElementChild.nextElementSibling.value;
                    formData.append('img2PreviewRemove', removeImg);

                    let rm = this;
                    let xhr = new XMLHttpRequest();
                    xhr.onload = function() {
                        if (xhr.status == 200) {
                            rm.parentElement.previousElementSibling.firstElementChild.value = "";
                            rm.parentElement.previousElementSibling.previousElementSibling.src = "";
                            rm.parentElement.previousElementSibling.children[2].value = "";
                            rm.parentElement.previousElementSibling.previousElementSibling.style.display = "none";
                            rm.parentElement.previousElementSibling.style.display = "block";
                            rm.parentElement.style.display = "none";
                        } else {
                            document.write('err');
                        }
                    };

                    xhr.open('POST', 'imgPreview.php', true);
                    xhr.send(formData);
                });
            }

            let img3PreviewRemove = document.getElementsByClassName("img3PreviewRemove");
            for (i = 0; i < img3PreviewRemove.length; i++) {
                img3PreviewRemove[i].addEventListener("click", function() {

                    let formData = new FormData();

                    let removeImg = this.previousElementSibling.firstElementChild.nextElementSibling.value;
                    formData.append('img3PreviewRemove', removeImg);

                    let rm = this;
                    let xhr = new XMLHttpRequest();
                    xhr.onload = function() {
                        if (xhr.status == 200) {
                            rm.parentElement.previousElementSibling.firstElementChild.value = "";
                            rm.parentElement.previousElementSibling.previousElementSibling.src = "";
                            rm.parentElement.previousElementSibling.children[2].value = "";
                            rm.parentElement.previousElementSibling.previousElementSibling.style.display = "none";
                            rm.parentElement.previousElementSibling.style.display = "block";
                            rm.parentElement.style.display = "none";
                        } else {
                            document.write('err');
                        }
                    };

                    xhr.open('POST', 'imgPreview.php', true);
                    xhr.send(formData);
                });
            }


//===============================================  save button  ===============================================// 

            var messages = document.getElementById("messages");
            let savebtn = document.getElementsByClassName("savebtn");
            for (i = 0; i < savebtn.length; i++) {
                savebtn[i].addEventListener("click", function() {

                    let table = this.parentElement.parentElement.parentElement.firstElementChild.firstElementChild.children;

                    let productName = table[0].children[0].children[1].children[0].value;
                    let productSize = table[0].children[1].children[1].children[0].value;
                    let productPrice = table[0].children[2].children[1].children[0].value;
                    let productDetails = table[0].children[3].children[1].children[0].value;
                    let sort = table[0].children[4].children[1].children[0].value;

                    let activation = document.querySelector("input[name='activation'][class='activation']:checked").value;

                    let addProductForm = this.parentElement.parentElement.parentElement.children;
                    img1 = addProductForm[1].children[2].children[1].value;
                    img2 = addProductForm[2].children[2].children[1].value;
                    img3 = addProductForm[3].children[2].children[1].value;

                    let formData = new FormData();
                    formData.append('productName', productName);
                    formData.append('productSize', productSize);
                    formData.append('productPrice', productPrice);
                    formData.append('productDetails', productDetails);
                    formData.append('sort', sort);
                    formData.append('activation', activation);
                    formData.append('img1TempSrc', img1);
                    formData.append('img2TempSrc', img2);
                    formData.append('img3TempSrc', img3);

                    let form = this.parentElement.parentElement.parentElement;
        
                    let xhr = new XMLHttpRequest();
                    xhr.onload = function() {
                        if (xhr.status == 200) {

                            form.reset();
                            form.children[1].children[1].src='';
                            form.children[1].children[1].style.display='none';
                            form.children[1].children[2].style.display='block';
                            form.children[1].children[3].style.display='none';

                            form.children[2].children[1].src='';
                            form.children[2].children[1].style.display='none';
                            form.children[2].children[2].style.display='block';
                            form.children[2].children[3].style.display='none';

                            form.children[3].children[1].src='';
                            form.children[3].children[1].style.display='none';
                            form.children[3].children[2].style.display='block';
                            form.children[3].children[3].style.display='none';

                            let timer = setInterval(func1, 5);
                            let counter = 0;

                            function func1() {
                                if (counter == 100) {
                                    clearInterval(timer);
                                    setTimeout(func2, 3000);

                                    function func2() {
                                        let timer1 = setInterval(func3, 3);
                                        let counter1 = 100;

                                        function func3() {
                                            if (counter1 == 0) {
                                                clearInterval(timer1);
                                                messages.style.display = "none"
                                            } else {
                                                counter1--;
                                                messages.style.opacity = counter1 / 100;
                                            }
                                        }
                                    }
                                } else {
                                    counter++;
                                    messages.style.display = "block"
                                    messages.style.opacity = counter / 100;
                                }
                            }

                            let response = JSON.parse(this.responseText);                            
                            messages.style.color = "green";
                            messages.innerHTML = response[0];

                            var sortNumber = response[1];
                            sortNumber = +sortNumber;
                            setSort(sortNumber);

                            var showProducts = document.getElementById("showProducts");
                            showProducts.innerHTML= "";
                            getProducts();

                        } else {
                            messages.style.display = "block";
                            messages.style.color = "red";
                            messages.innerHTML = 'err';
                        }
                    };

                    xhr.open('POST', 'addProduct.php', true);
                    xhr.send(formData);
                });
            }


   
</script>

<script src="showProducts.js"></script>
<script src="managementStart.js"></script>

</body>

</html>