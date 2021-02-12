<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="management.css">
    <title>Document</title>
</head>

<body>
    <div>

        <div id="addProduct" class="productBox">
            <div class="tableDiv">
                <form id="addProductForm" action="addproduct.php" method="POST">
                    <table>
                        <tr>
                            <td>Name</td>
                            <td>
                                <input id="productName" name="productName" type="text" placeholder="write the name">
                            </td>
                        </tr>
                        <tr>
                            <td>Size</td>
                            <td>
                                <input id="productSize" name="productSize" type="text" placeholder="write the size">
                            </td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>
                                <input id="productPrice" name="productPrice" type="text" placeholder="write the price">
                            </td>
                        </tr>
                        <tr>
                            <td>Details</td>
                            <td>
                                <input id="productDetails" name="productDetails" type="text" placeholder="write details">
                            </td>
                        </tr>
                        <tr>
                            <td>Sort</td>
                            <td>
                                <select name="sort" id="sort">

                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>Activation</td>
                            <td>
                                Active<input type="radio" name="activity" value="1" class="activation">
                                Deactive<input type="radio" name="activity" value="0" class="activation">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>


            <div class="pic">
                <span class="picTitle">Image 1 (main)</span>

                <img class="imgAddPreview" />
                <label class="browse">
                    <form method="POST" enctype="multipart/form-data">
                        <input type="file" name="imgPreview" class="imgPreview">
                    </form>
                </label>
                <div class="btnDiv">
                    <label class="browse-change">
                        <form method="POST" enctype="multipart/form-data">
                            <input type="file" name="imgPreview" class="imgPreviewChange">
                            <input type="hidden" name="removePreviousImg">
                        </form>
                    </label>
                    <button class="imgPreviewRemove">Remove Image</button>
                </div>
            </div>

            <div class="pic">
                <span class="picTitle">Image 2</span>

                <img class="imgAddPreview" />
                <label class="browse">
                    <form method="POST" enctype="multipart/form-data">
                        <input type="file" name="imgPreview" class="imgPreview">
                    </form>
                </label>
                <div class="btnDiv">
                    <label class="browse-change">
                        <form method="POST" enctype="multipart/form-data">
                            <input type="file" name="imgPreview" class="imgPreviewChange">
                            <input type="hidden" name="removePreviousImg">
                        </form>
                    </label>
                    <button class="imgPreviewRemove">Remove Image</button>
                </div>
            </div>


            <div class="setDiv">
                <div class="saveDiv">
                    <button class="savebtn" onclick="submitForm()">Save Changes</button>
                    <button class="cancelbtn">Cancel</button>
                </div>
            </div>

        </div>

        <script>
            imgPreview = document.getElementsByClassName("imgPreview");
            for (i = 0; i < imgPreview.length; i++) {
                imgPreview[i].addEventListener("change", function() {
                    let files = this.files;
                    let file = files[0];
                    let formData = new FormData();

                    formData.append('imgPreview', file, file.name);
                    let img = this;
                    let xhr = new XMLHttpRequest();
                    xhr.onload = function() {
                        if (xhr.status == 200) {
                            img.parentElement.parentElement.previousElementSibling.src = xhr.responseText;
                            img.parentElement.parentElement.previousElementSibling.style.display = "block";
                            img.parentElement.parentElement.style.display = "none";
                            img.parentElement.parentElement.nextElementSibling.style.display = "block";

                            img.parentElement.parentElement.nextElementSibling.firstElementChild.firstElementChild.firstElementChild.nextElementSibling.value = xhr.responseText;
                        } else {
                            document.write('err');
                        }
                    };

                    xhr.open('POST', 'imgPreview.php', true);
                    xhr.send(formData);
                });
            }

            imgPreviewChange = document.getElementsByClassName("imgPreviewChange");
            for (i = 0; i < imgPreviewChange.length; i++) {
                imgPreviewChange[i].addEventListener("change", function() {
                    let files = this.files;
                    let file = files[0];
                    let formData = new FormData();
                    let imgChanged = this;
                    let removeImg = imgChanged.nextElementSibling.value;
                    formData.append('imgPreviewChange', file, file.name);
                    formData.append('removePreviousImg', removeImg);
                    
                    let xhr = new XMLHttpRequest();
                    xhr.onload = function() {
                        if (xhr.status == 200) {
                            imgChanged.parentElement.parentElement.parentElement.previousElementSibling.previousElementSibling.src = xhr.responseText;
                            imgChanged.nextElementSibling.value = xhr.responseText;
                        } else {
                            document.write('err');
                        }
                    };

                    xhr.open('POST', 'imgPreview.php', true);
                    xhr.send(formData);
                });
            }

            imgPreviewRemove = document.getElementsByClassName("imgPreviewRemove");
            for (i = 0; i < imgPreviewRemove.length; i++) {
                imgPreviewRemove[i].addEventListener("click", function() {
                    
                    let formData = new FormData();

                    let removeImg = this.previousElementSibling.firstElementChild.firstElementChild.nextElementSibling.value;
                    formData.append('removePreviousImg', removeImg);

                    let rm = this;
                    let xhr = new XMLHttpRequest();
                    xhr.onload = function() {
                        if (xhr.status == 200) {
                            rm.parentElement.previousElementSibling.firstElementChild.firstElementChild.value="";
                            rm.parentElement.previousElementSibling.previousElementSibling.src ="";
                            rm.parentElement.previousElementSibling.previousElementSibling.style.display= "none";
                            rm.parentElement.previousElementSibling.style.display= "block";
                            rm.parentElement.style.display= "none";
                        } else {
                            document.write('err');
                        }
                    };

                    xhr.open('POST', 'imgPreview.php', true);
                    xhr.send(formData);
                });
            }


        </script>

</body>

</html>