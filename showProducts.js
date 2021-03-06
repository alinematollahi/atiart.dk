

// =======================================  set sort part  ======================================= //

window.addEventListener("load", getSortNumber);

function getSortNumber() {
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var sortNumber = this.responseText;
            sortNumber = +sortNumber;
            setSort(sortNumber);
        }
    };
    xhttp.open("GET", "setSort.php?sort=ok", true);
    xhttp.send();
}

function setSort(sortNumber) {

    var sortSelect = document.getElementsByClassName("sort");
    for (var i1 = 0; i1 < sortSelect.length; i1++) {
        sortSelect[i1].innerHTML = '';
        for (var i2 = sortNumber + 1; i2 >= 1; i2--) {
            var sortOption = document.createElement("option");
            sortSelect[i1].appendChild(sortOption);
            sortOption.value = i2;

            switch (i2) {
                case 1:
                    sortOption.innerHTML = '1st';
                    break;
                case 2:
                    sortOption.innerHTML = '2nd';
                    break;
                default:
                    sortOption.innerHTML = i2 + 'th';
                    break;
            }
        }
    }
}

document.querySelectorAll("input[name='activation'][class='activation']")[1].addEventListener("change", function () {
    let select = this.parentElement.parentElement.previousElementSibling.children[1].children[0];
    select.innerHTML = '';
    let deactiveOption = document.createElement("option");
    select.appendChild(deactiveOption);
    deactiveOption.innerHTML = "---";
    deactiveOption.value = 9999;
});

document.querySelectorAll("input[name='activation'][class='activation']")[0].addEventListener("change", function () {
    let select = this.parentElement.parentElement.previousElementSibling.children[1].children[0];
    select.innerHTML = '';
    getSortNumber();
});



//===============================================  show products  ===============================================//

window.addEventListener("load", getProducts);

function getProducts() {
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let response = JSON.parse(this.responseText);
            //alert('get ok');
            showProduct(response);
        }
    };
    xhttp.open("GET", "editProduct.php?show=ok", true);
    xhttp.send();
}

function showProduct(response) {
    //alert('show ok');
    for (let i = 0; i < response.length; i++) {

        var showProducts = document.getElementById("showProducts");
        var productBox = document.createElement("div");
        productBox.classList = "productBox";
        showProducts.appendChild(productBox);

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
        td2.innerHTML = response[i].name;

        var tr2 = document.createElement("tr");
        productTable.appendChild(tr2);

        var td3 = document.createElement("td");
        tr2.appendChild(td3);
        td3.innerHTML = "Size";

        var td4 = document.createElement("td");
        tr2.appendChild(td4);
        td4.innerHTML = response[i].size;

        var tr3 = document.createElement("tr");
        productTable.appendChild(tr3);

        var td5 = document.createElement("td");
        tr3.appendChild(td5);
        td5.innerHTML = "Price";

        var td6 = document.createElement("td");
        tr3.appendChild(td6);
        td6.innerHTML = response[i].price;

        var tr4 = document.createElement("tr");
        productTable.appendChild(tr4);

        var td7 = document.createElement("td");
        tr4.appendChild(td7);
        td7.innerHTML = "Details";

        var td8 = document.createElement("td");
        tr4.appendChild(td8);
        td8.innerHTML = response[i].details;

        var tr5 = document.createElement("tr");
        productTable.appendChild(tr5);

        var td9 = document.createElement("td");
        tr5.appendChild(td9);
        td9.innerHTML = "Sort";

        var td10 = document.createElement("td");
        tr5.appendChild(td10);
        switch (response[i].sort) {
            case '1': td10.innerHTML = '1st';
                break;
            case '2': td10.innerHTML = '2nd';
                break;
            case '9999': td10.innerHTML = '---';
                break;
            default: td10.innerHTML = response[i].sort + 'th'
                break;
        }

        var tr6 = document.createElement("tr");
        productTable.appendChild(tr6);

        var td11 = document.createElement("td");
        tr6.appendChild(td11);
        td11.innerHTML = "Activation";

        var td12 = document.createElement("td");
        tr6.appendChild(td12);
        if (response[i].activity == 1) { td12.innerHTML = 'Active'; td12.style.color = 'green' }
        else { td12.innerHTML = 'Deactive'; td12.style.color = 'red' }


        //====================================pic1=======================================

        var pic1 = document.createElement("div");
        pic1.classList = "pic";
        productBox.appendChild(pic1);

        var span1 = document.createElement("span");
        span1.classList = "picTitle";
        pic1.appendChild(span1);
        span1.innerHTML = "Image 1 (main)";

        var img1 = document.createElement("img");
        img1.classList = "imgShowPreview";
        pic1.appendChild(img1);
        img1.src = response[i].img1src;

        var noimage1 = document.createElement("div");
        noimage1.classList = "noimage";
        pic1.appendChild(noimage1);
        noimage1.innerHTML = "No Image Set!"

        if (response[i].img1src == '' || response[i].img1src == null){
            img1.style.display = "none";
            noimage1.style.display = "block";
        }

        //====================================pic2=======================================

        var pic2 = document.createElement("div");
        pic2.classList = "pic";
        productBox.appendChild(pic2);

        var span2 = document.createElement("span");
        span2.classList = "picTitle";
        pic2.appendChild(span2);
        span2.innerHTML = "Image 2";

        var img2 = document.createElement("img");
        img2.classList = "imgShowPreview";
        pic2.appendChild(img2);
        img2.src = response[i].img2src;

        var noimage2 = document.createElement("div");
        noimage2.classList = "noimage";
        pic2.appendChild(noimage2);
        noimage2.innerHTML = "No Image Set!"

        if (response[i].img2src == '' || response[i].img2src == null){
            img2.style.display = "none";
            noimage2.style.display = "block";
        }

        //====================================pic3=======================================

        var pic3 = document.createElement("div");
        pic3.classList = "pic";
        productBox.appendChild(pic3);

        var span3 = document.createElement("span");
        span3.classList = "picTitle";
        pic3.appendChild(span3);
        span3.innerHTML = "Image 3";

        var img3 = document.createElement("img");
        img3.classList = "imgShowPreview";
        pic3.appendChild(img3);
        img3.src = response[i].img3src;

        var noimage3 = document.createElement("div");
        noimage3.classList = "noimage";
        pic3.appendChild(noimage3);
        noimage3.innerHTML = "No Image Set!"

        if (response[i].img3src == '' || response[i].img3src == null){
            img3.style.display = "none";
            noimage3.style.display = "block";
        }

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
        editbtn.innerHTML = "Edit Product";
        editbtn.addEventListener("click", function () {
            this.parentElement.parentElement.parentElement.style.display = "none";
            this.parentElement.parentElement.parentElement.nextElementSibling.style.display = "block";
        });

        var rmbtn = document.createElement("button");
        rmbtn.classList = "rmbtn";
        editDiv.appendChild(rmbtn);
        rmbtn.innerHTML = "Remove Product";

        var hideWindow = document.createElement("div");
        editDiv.appendChild(hideWindow);
        hideWindow.classList = "hide-window";

        var question = document.createElement("div");
        hideWindow.appendChild(question);
        question.classList = "question";

        var questionText = document.createTextNode("Are you sure to remove " + response[i].name + " ??!");
        question.appendChild(questionText);

        var nobtn = document.createElement("button");
        question.appendChild(nobtn);
        nobtn.innerHTML = "No";
        nobtn.type = "button";

        var yesbtn = document.createElement("button");
        question.appendChild(yesbtn);
        yesbtn.innerHTML = "Yes";
        yesbtn.type = "button";

        var rmSort = document.createElement("input");
        question.appendChild(rmSort);
        rmSort.type = "hidden";
        rmSort.value = response[i].sort;


        rmbtn.addEventListener("click", (event) => {
            event.target.nextElementSibling.style.display = "block";
        });

        nobtn.addEventListener("click", (event) => {
            event.target.parentElement.parentElement.style.display = "none";
        });

        yesbtn.addEventListener("click", (event) => {

            let productId = event.target.parentElement.parentElement.parentElement.parentElement.parentElement.nextElementSibling.firstElementChild.firstElementChild.value
            let rmSortValue = event.target.nextElementSibling.value;
            let formData = new FormData();
            formData.append('productId', productId);
            formData.append('rmSort', rmSortValue);

            let xhr = new XMLHttpRequest();
            xhr.onload = function () {
                if (xhr.status == 200) {

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

                    messages.innerHTML = "Product Removed";
                    messages.style.color = "red";
                    
                    var sortNumber = xhr.responseText;
                    sortNumber = +sortNumber;
                    setSort(sortNumber);

                    var showProduct = document.getElementById("showProduct");
                    showProduct.innerHTML = "";
                    getProducts();

                } else {
                    messages.style.display = "block";
                    messages.style.color = "red";
                    messages.innerHTML = 'err';
                }
            };

            xhr.open('POST', 'delete.php', true);
            xhr.send(formData);
        });


        //=========================================  edit product part  ============================================//

        var editProductBox = document.createElement("div");
        editProductBox.classList = "edit-productBox";
        showProducts.appendChild(editProductBox);
        var editForm = document.createElement("form");
        editProductBox.appendChild(editForm);
        editForm.method = "POST";
        editForm.enctype = "multipart/form-data";

        var productId = document.createElement("input");
        productId.type = "hidden";
        productId.name = "productId";
        productId.value = response[i].id;
        editForm.appendChild(productId);

        //==================================== table  (edit part) =======================================

        var tableDiv = document.createElement("div");
        tableDiv.classList = "tableDiv";
        editForm.appendChild(tableDiv);

        var productTable = document.createElement("table");
        tableDiv.appendChild(productTable);

        var tr1 = document.createElement("tr");
        productTable.appendChild(tr1);

        var td1 = document.createElement("td");
        tr1.appendChild(td1);

        td1.innerHTML = "Name";

        var td2 = document.createElement("td");
        tr1.appendChild(td2);
        var productNameEditInput = document.createElement("input");
        td2.appendChild(productNameEditInput);
        productNameEditInput.type = "text";
        productNameEditInput.name = "productName";
        productNameEditInput.classList = "productName";
        productNameEditInput.value = response[i].name;

        var tr2 = document.createElement("tr");
        productTable.appendChild(tr2);

        var td3 = document.createElement("td");
        tr2.appendChild(td3);

        td3.innerHTML = "Size";

        var td4 = document.createElement("td");
        tr2.appendChild(td4);
        var productSizeEditInput = document.createElement("input");
        td4.appendChild(productSizeEditInput);
        productSizeEditInput.type = "text";
        productSizeEditInput.name = "productSize";
        productSizeEditInput.classList = "productSize";
        productSizeEditInput.value = response[i].size;

        var tr3 = document.createElement("tr");
        productTable.appendChild(tr3);

        var td5 = document.createElement("td");
        tr3.appendChild(td5);

        td5.innerHTML = "Price";

        var td6 = document.createElement("td");
        tr3.appendChild(td6);
        var productPriceEditInput = document.createElement("input");
        td6.appendChild(productPriceEditInput);
        productPriceEditInput.type = "text";
        productPriceEditInput.name = "productPrice";
        productPriceEditInput.classList = "productPrice";
        productPriceEditInput.value = response[i].price;

        var tr4 = document.createElement("tr");
        productTable.appendChild(tr4);

        var td7 = document.createElement("td");
        tr4.appendChild(td7);

        td7.innerHTML = "Details";

        var td8 = document.createElement("td");
        tr4.appendChild(td8);
        var productDetailsEditInput = document.createElement("input");
        td8.appendChild(productDetailsEditInput);
        productDetailsEditInput.type = "text";
        productDetailsEditInput.name = "productDetails";
        productDetailsEditInput.classList = "productDetails";
        productDetailsEditInput.value = response[i].details;

        var tr5 = document.createElement("tr");
        productTable.appendChild(tr5);

        var td9 = document.createElement("td");
        tr5.appendChild(td9);
        td9.innerHTML = "Sort";

        var td10 = document.createElement("td");
        tr5.appendChild(td10);
        var sortEdit = document.createElement("select");
        td10.appendChild(sortEdit);




        var tr6 = document.createElement("tr");
        productTable.appendChild(tr6);

        var td11 = document.createElement("td");
        tr6.appendChild(td11);

        td11.innerHTML = "Activation";

        var td12 = document.createElement("td");
        tr6.appendChild(td12);
        var node1 = document.createTextNode("Active");
        td12.appendChild(node1);
        var activeInput = document.createElement("input");
        td12.appendChild(activeInput);
        activeInput.type = "radio";
        activeInput.value = '1';
        activeInput.name = "activation";
        activeInput.classList = "editActive";
        var node2 = document.createTextNode(" Deactive");
        td12.appendChild(node2);
        var deactiveInput = document.createElement("input");
        td12.appendChild(deactiveInput);
        deactiveInput.type = "radio";
        deactiveInput.value = '0';
        deactiveInput.name = "activation";
        deactiveInput.classList = "editDeactive";
        //if (response[i].activity == '1') { activeInput.checked = true; }
        //else if (response[i].activity == '0') { deactiveInput.checked = true; }

        let activeProducts = [];
        for (var i3 = 0; i3 < response.length; i3++) {
            if (response[i3].activity == '1') {
                activeProducts.push('1');
            }
        }

        if (response[i].activity == '0') {
            deactiveInput.checked = true;
            activeInput.checked = false;
            deactiveInput.value = '0';

            var sortEditOption = document.createElement("option");
            sortEdit.appendChild(sortEditOption);
            sortEditOption.innerHTML = '---';
            sortEditOption.value = 9999;
        } else if (response[i].activity == '1') {
            activeInput.checked = true;
            deactiveInput.checked = false;
            activeInput.value = '1';

            for (var i4 = activeProducts.length; i4 >= 1; i4--) {
                var sortEditOption = document.createElement("option");
                sortEdit.appendChild(sortEditOption);
                sortEditOption.value = i4;
                if (i4 == +response[i].sort) { sortEditOption.selected = "selected"; }

                switch (i4) {
                    case 1:
                        sortEditOption.innerHTML = '1st';
                        break;
                    case 2:
                        sortEditOption.innerHTML = '2nd';
                        break;
                    default:
                        sortEditOption.innerHTML = i4 + 'th';
                        break;
                }
            }
        }

        activeInput.addEventListener("change", (event) => {
            activeInput.checked = true;
            deactiveInput.checked = false;
            let showBox = event.target.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.previousElementSibling;
            let act = showBox.children[0].children[0].children[5].children[1].innerHTML;
            let sortEdit = event.target.parentElement.parentElement.previousElementSibling.children[1].children[0];

            if (act == 'Deactive') {
                sortEdit.innerHTML = '';
                for (var i5 = activeProducts.length + 1; i5 >= 1; i5--) {

                    var sortEditOption = document.createElement("option");
                    sortEdit.appendChild(sortEditOption);
                    sortEditOption.value = i5;

                    switch (i5) {
                        case 1:
                            sortEditOption.innerHTML = '1st';
                            break;
                        case 2:
                            sortEditOption.innerHTML = '2nd';
                            break;
                        default:
                            sortEditOption.innerHTML = i5 + 'th';
                            break;
                    }
                }
            } else if (act == 'Active') {
                sortEdit.innerHTML = '';
                for (var i6 = activeProducts.length; i6 >= 1; i6--) {
                    let lastSort = showBox.children[0].children[0].children[4].children[1].innerHTML;
                    lastSort = lastSort.slice(0, -2);
                    lastSort = +lastSort;
                    var sortEditOption = document.createElement("option");
                    sortEdit.appendChild(sortEditOption);
                    sortEditOption.value = i6;
                    if (i6 == lastSort) { sortEditOption.selected = "selected"; }

                    switch (i6) {
                        case 1:
                            sortEditOption.innerHTML = '1st';
                            break;
                        case 2:
                            sortEditOption.innerHTML = '2nd';
                            break;
                        default:
                            sortEditOption.innerHTML = i6 + 'th';
                            break;
                    }
                }
            }
        });

        deactiveInput.addEventListener("click", (event) => {

            deactiveInput.checked = true;
            activeInput.checked = false;

            let showBox = event.target.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.previousElementSibling;
            let act = showBox.children[0].children[0].children[5].children[1].innerHTML;
            let sortEdit = event.target.parentElement.parentElement.previousElementSibling.children[1].children[0];

            sortEdit.innerHTML = '';
            var sortEditOption = document.createElement("option");
            sortEdit.appendChild(sortEditOption);
            sortEditOption.innerHTML = '---';
            sortEditOption.value = 9999;
        });

        //==================================== pic1  (edit part) =======================================

        var pic1 = document.createElement("div");
        pic1.classList = "pic";
        editForm.appendChild(pic1);

        var span1 = document.createElement("span");
        span1.classList = "picTitle";
        pic1.appendChild(span1);
        span1.innerHTML = "Image 1 (main)";

        var img1 = document.createElement("img");
        img1.classList = "imgAddPreview";
        pic1.appendChild(img1);

        var label1 = document.createElement("label");
        label1.classList = "browse";
        pic1.appendChild(label1);

        var inputFile1 = document.createElement("input");
        inputFile1.type = "file";
        inputFile1.name = "img1Preview";
        inputFile1.classList = "img1PreviewInput";
        label1.appendChild(inputFile1);

        var img1TempSrc = document.createElement("input");
        img1TempSrc.type = "hidden";
        img1TempSrc.name = "img1TempSrc";
        label1.appendChild(img1TempSrc);

        var btnDiv1 = document.createElement("div");
        btnDiv1.classList = "btnDiv";
        pic1.appendChild(btnDiv1);

        var labelChange1 = document.createElement("label");
        labelChange1.classList = "browse-change";
        btnDiv1.appendChild(labelChange1);

        var inputChangeFile1 = document.createElement("input");
        inputChangeFile1.type = "file";
        inputChangeFile1.name = "img1Preview";
        inputChangeFile1.class = "img1PreviewChange";
        labelChange1.appendChild(inputChangeFile1);


        var img1PreviewRemove = document.createElement("input");
        img1PreviewRemove.type = "hidden";
        img1PreviewRemove.name = "img1PreviewRemove";
        labelChange1.appendChild(img1PreviewRemove);

        var rmbtn1 = document.createElement("button");
        //rmbtn1.classList = "";
        btnDiv1.appendChild(rmbtn1);
        rmbtn1.innerHTML = "Remove Image";
        rmbtn1.type = "button";

        if (response[i].img1src !== null && response[i].img1src !== '') {
            img1.src = response[i].img1src;
            img1.style.display = "block";
            label1.style.display = "none";
            btnDiv1.style.display = "block";
            img1TempSrc.value = response[i].img1src;
        } else if (response[i].img1src == '' || response[i].img1src == null) {
            img1.style.display = "none";
            label1.style.display = "block";
            btnDiv1.style.display = "none";
            img1TempSrc.value = '';
        }

        // change preview

        inputChangeFile1.addEventListener("change", (event) => {

            let picDiv = event.target.parentElement.parentElement.parentElement;
            let changeFile1 = event.target;
            let files = event.target.files;
            let file = files[0];

            let formData = new FormData();
            let removeImg = event.target.nextElementSibling.value;
            formData.append('img1PreviewChange', file, file.name);
            formData.append('img1PreviewRemove', removeImg);

            let xhr = new XMLHttpRequest();
            xhr.onload = function () {
                if (xhr.status == 200) {
                    picDiv.children[1].src = xhr.responseText;
                    picDiv.children[2].children[1].value = xhr.responseText;
                    changeFile1.nextElementSibling.value = xhr.responseText;
                } else {
                    document.write('err');
                }
            };
            xhr.open('POST', 'imgPreview.php', true);
            xhr.send(formData);
        });

        // remove preview

        rmbtn1.addEventListener("click", (event) => {
            event.target.style.color = "blue";
            let removeImg = event.target.previousElementSibling.children[1].value;
            let formData = new FormData();
            formData.append('img1PreviewRemove', removeImg);

            let rm = event.target;
            let xhr = new XMLHttpRequest();
            xhr.onload = function () {
                if (xhr.status == 200) {
                    rm.parentElement.previousElementSibling.firstElementChild.value = "";
                    rm.parentElement.previousElementSibling.previousElementSibling.src = "";
                    rm.parentElement.previousElementSibling.children[1].value = "";
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

        // add preview

        inputFile1.addEventListener("change", function (event) {

            let files = event.target.files;
            let file = files[0];
            let formData = new FormData();

            formData.append('img1Preview', file, file.name);
            let img = event.target;
            let xhr = new XMLHttpRequest();
            xhr.onload = function () {
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

        //==================================== pic2  (edit part) =======================================

        var pic2 = document.createElement("div");
        pic2.classList = "pic";
        editForm.appendChild(pic2);

        var span2 = document.createElement("span");
        span2.classList = "picTitle";
        pic2.appendChild(span2);
        span2.innerHTML = "Image 2";

        var img2 = document.createElement("img");
        img2.classList = "imgAddPreview";
        pic2.appendChild(img2);

        var label2 = document.createElement("label");
        label2.classList = "browse";
        pic2.appendChild(label2);

        var inputFile2 = document.createElement("input");
        inputFile2.type = "file";
        label2.appendChild(inputFile2);

        var img2TempSrc = document.createElement("input");
        img2TempSrc.type = "hidden";
        img2TempSrc.name = "img2TempSrc";
        label2.appendChild(img2TempSrc);

        var btnDiv2 = document.createElement("div");
        btnDiv2.classList = "btnDiv";
        pic2.appendChild(btnDiv2);

        var labelChange2 = document.createElement("label");
        labelChange2.classList = "browse-change";
        btnDiv2.appendChild(labelChange2);

        var inputChangeFile2 = document.createElement("input");
        inputChangeFile2.type = "file";
        inputChangeFile2.name = "img2Preview";
        inputChangeFile2.class = "img2PreviewChange";
        labelChange2.appendChild(inputChangeFile2);


        var img2PreviewRemove = document.createElement("input");
        img2PreviewRemove.type = "hidden";
        img2PreviewRemove.name = "img2PreviewRemove";
        labelChange2.appendChild(img2PreviewRemove);

        var rmbtn2 = document.createElement("button");
        //rmbtn2.classList = "";
        btnDiv2.appendChild(rmbtn2);
        rmbtn2.innerHTML = "Remove Image";
        rmbtn2.type = "button";

        if (response[i].img2src !== null && response[i].img2src !== '') {
            img2.src = response[i].img2src;
            img2.style.display = "block";
            label2.style.display = "none";
            btnDiv2.style.display = "block";
            img2TempSrc.value = response[i].img2src;
        } else if (response[i].img2src == '' || response[i].img2src == null) {
            img2.style.display = "none";
            label2.style.display = "block";
            btnDiv2.style.display = "none";
            img2TempSrc.value = '';
        }

        // change preview

        inputChangeFile2.addEventListener("change", (event) => {

            let picDiv = event.target.parentElement.parentElement.parentElement;
            let changeFile2 = event.target;
            let files = event.target.files;
            let file = files[0];

            let formData = new FormData();
            let removeImg = event.target.nextElementSibling.value;
            formData.append('img1PreviewChange', file, file.name);
            formData.append('img1PreviewRemove', removeImg);

            let xhr = new XMLHttpRequest();
            xhr.onload = function () {
                if (xhr.status == 200) {
                    picDiv.children[1].src = xhr.responseText;
                    picDiv.children[2].children[1].value = xhr.responseText;
                    changeFile2.nextElementSibling.value = xhr.responseText;
                } else {
                    document.write('err');
                }
            };
            xhr.open('POST', 'imgPreview.php', true);
            xhr.send(formData);
        });

        // remove preview

        rmbtn2.addEventListener("click", (event) => {
            event.target.style.color = "blue";
            let removeImg = event.target.previousElementSibling.children[1].value;
            let formData = new FormData();
            formData.append('img2PreviewRemove', removeImg);

            let rm = event.target;
            let xhr = new XMLHttpRequest();
            xhr.onload = function () {
                if (xhr.status == 200) {
                    rm.parentElement.previousElementSibling.firstElementChild.value = "";
                    rm.parentElement.previousElementSibling.previousElementSibling.src = "";
                    rm.parentElement.previousElementSibling.children[1].value = "";
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

        // add preview

        inputFile2.addEventListener("change", function (event) {

            let files = event.target.files;
            let file = files[0];
            let formData = new FormData();

            formData.append('img2Preview', file, file.name);
            let img = event.target;
            let xhr = new XMLHttpRequest();
            xhr.onload = function () {
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


        //==================================== pic3  (edit part) =======================================

        var pic3 = document.createElement("div");
        pic3.classList = "pic";
        editForm.appendChild(pic3);

        var span3 = document.createElement("span");
        span3.classList = "picTitle";
        pic3.appendChild(span3);
        span3.innerHTML = "Image 3";

        var img3 = document.createElement("img");
        img3.classList = "imgAddPreview";
        pic3.appendChild(img3);

        var label3 = document.createElement("label");
        label3.classList = "browse";
        pic3.appendChild(label3);

        var inputFile3 = document.createElement("input");
        inputFile3.type = "file";
        label3.appendChild(inputFile3);

        var img3TempSrc = document.createElement("input");
        img3TempSrc.type = "hidden";
        img3TempSrc.name = "img3TempSrc";
        label3.appendChild(img3TempSrc);

        var btnDiv3 = document.createElement("div");
        btnDiv3.classList = "btnDiv";
        pic3.appendChild(btnDiv3);

        var labelChange3 = document.createElement("label");
        labelChange3.classList = "browse-change";
        btnDiv3.appendChild(labelChange3);

        var inputChangeFile3 = document.createElement("input");
        inputChangeFile3.type = "file";
        inputChangeFile3.name = "img3Preview";
        inputChangeFile3.class = "img3PreviewChange";
        labelChange3.appendChild(inputChangeFile3);


        var img3PreviewRemove = document.createElement("input");
        img3PreviewRemove.type = "hidden";
        img3PreviewRemove.name = "img3PreviewRemove";
        labelChange3.appendChild(img3PreviewRemove);

        var rmbtn3 = document.createElement("button");
        //rmbtn3.classList = "";
        btnDiv3.appendChild(rmbtn3);
        rmbtn3.innerHTML = "Remove Image";
        rmbtn3.type = "button";

        if (response[i].img3src !== null && response[i].img3src !== '') {
            img3.src = response[i].img3src;
            img3.style.display = "block";
            label3.style.display = "none";
            btnDiv3.style.display = "block";
            img3TempSrc.value = response[i].img3src;
        } else if (response[i].img3src == '' || response[i].img3src == null) {
            img3.style.display = "none";
            label3.style.display = "block";
            btnDiv3.style.display = "none";
            img3TempSrc.value = '';
        }

        // change preview

        inputChangeFile3.addEventListener("change", (event) => {

            let picDiv = event.target.parentElement.parentElement.parentElement;
            let changeFile3 = event.target;
            let files = event.target.files;
            let file = files[0];

            let formData = new FormData();
            let removeImg = event.target.nextElementSibling.value;
            formData.append('img1PreviewChange', file, file.name);
            formData.append('img1PreviewRemove', removeImg);

            let xhr = new XMLHttpRequest();
            xhr.onload = function () {
                if (xhr.status == 200) {
                    picDiv.children[1].src = xhr.responseText;
                    picDiv.children[2].children[1].value = xhr.responseText;
                    changeFile3.nextElementSibling.value = xhr.responseText;
                } else {
                    document.write('err');
                }
            };
            xhr.open('POST', 'imgPreview.php', true);
            xhr.send(formData);
        });

        // remove preview

        rmbtn3.addEventListener("click", (event) => {
            event.target.style.color = "blue";
            let removeImg = event.target.previousElementSibling.children[1].value;
            let formData = new FormData();
            formData.append('img3PreviewRemove', removeImg);

            let rm = event.target;
            let xhr = new XMLHttpRequest();
            xhr.onload = function () {
                if (xhr.status == 200) {
                    rm.parentElement.previousElementSibling.firstElementChild.value = "";
                    rm.parentElement.previousElementSibling.previousElementSibling.src = "";
                    rm.parentElement.previousElementSibling.children[1].value = "";
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

        // add preview

        inputFile3.addEventListener("change", function (event) {

            let files = event.target.files;
            let file = files[0];
            let formData = new FormData();

            formData.append('img3Preview', file, file.name);
            let img = event.target;
            let xhr = new XMLHttpRequest();
            xhr.onload = function () {
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

        //==================================== set buttons (edit part) =======================================//

        var setDiv = document.createElement("div");
        setDiv.classList = "setDiv";
        editForm.appendChild(setDiv);

        var editDiv = document.createElement("div");
        editDiv.classList = "editDiv";
        setDiv.appendChild(editDiv);
        //============================ remove btn ============================//

        var rmbtn = document.createElement("button");
        rmbtn.classList = "rmbtn";
        editDiv.appendChild(rmbtn);
        rmbtn.innerHTML = "Remove Product";
        rmbtn.type = "button";

        var hideWindow = document.createElement("div");
        editDiv.appendChild(hideWindow);
        hideWindow.classList = "hide-window";

        var question = document.createElement("div");
        hideWindow.appendChild(question);
        question.classList = "question";

        var questionText = document.createTextNode("Are you sure to remove " + response[i].name + " ??!");
        question.appendChild(questionText);

        var nobtn = document.createElement("button");
        question.appendChild(nobtn);
        nobtn.innerHTML = "No";
        nobtn.type = "button";

        var yesbtn = document.createElement("button");
        question.appendChild(yesbtn);
        yesbtn.innerHTML = "Yes";
        yesbtn.type = "button";

        var rmSort = document.createElement("input");
        question.appendChild(rmSort);
        rmSort.type = "hidden";
        rmSort.value = response[i].sort;


        rmbtn.addEventListener("click", (event) => {
            event.target.nextElementSibling.style.display = "block";
        });

        nobtn.addEventListener("click", (event) => {
            event.target.parentElement.parentElement.style.display = "none";
        });

        yesbtn.addEventListener("click", (event) => {

            let productId = event.target.parentElement.parentElement.parentElement.parentElement.parentElement.firstElementChild.value
            let rmSortValue = event.target.nextElementSibling.value;
            let formData = new FormData();
            formData.append('productId', productId);
            formData.append('rmSort', rmSortValue);

            let xhr = new XMLHttpRequest();
            xhr.onload = function () {
                if (xhr.status == 200) {

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

                    messages.innerHTML = "Product Removed";
                    messages.style.color = "red";

                    var sortNumber = xhr.responseText;
                    sortNumber = +sortNumber;
                    setSort(sortNumber);

                    var showProduct = document.getElementById("showProduct");
                    showProduct.innerHTML = "";
                    getProducts();


                } else {
                    messages.style.display = "block";
                    messages.style.color = "red";
                    messages.innerHTML = 'err';
                }
            };

            xhr.open('POST', 'delete.php', true);
            xhr.send(formData);
        });

        //============================ save btn ============================//

        var saveDiv = document.createElement("div");
        saveDiv.classList = "saveDiv";
        setDiv.appendChild(saveDiv);

        var savebtn = document.createElement("button");
        savebtn.classList = "savebtn";
        savebtn.type = "button";
        saveDiv.appendChild(savebtn);
        savebtn.innerHTML = "Save Changes";

        var oldSort = document.createElement("input");
        saveDiv.appendChild(oldSort);
        oldSort.type = "hidden";
        oldSort.value = response[i].sort;

        savebtn.addEventListener("click", function () {

            var editTable = this.parentElement.parentElement.parentElement.children[1].firstElementChild.children;

            let productName = editTable[0].children[1].children[0].value;
            let productSize = editTable[1].children[1].children[0].value;
            let productPrice = editTable[2].children[1].children[0].value;
            let productDetails = editTable[3].children[1].children[0].value;
            let sort = editTable[4].children[1].children[0].value;
          
            let activation;
            if (deactiveInput.checked) { activation = '0'; }
            else if (activeInput.checked) { activation = '1'; }
           
            let addProductForm = this.parentElement.parentElement.parentElement.children;
            let productId = addProductForm[0].value;;
            let img1 = addProductForm[2].children[2].children[1].value;
            let img2 = addProductForm[3].children[2].children[1].value;
            let img3 = addProductForm[4].children[2].children[1].value;

            let oldSortValue = this.nextElementSibling.value;

            let formData = new FormData();
            formData.append('productId', productId);
            formData.append('productName', productName);
            formData.append('productSize', productSize);
            formData.append('productPrice', productPrice);
            formData.append('productDetails', productDetails);
            formData.append('sort', sort);
            formData.append('activation', activation);
            formData.append('img1TempSrc', img1);
            formData.append('img2TempSrc', img2);
            formData.append('img3TempSrc', img3);
            formData.append('oldsort', oldSortValue);

            let xhr = new XMLHttpRequest();
            xhr.onload = function () {
                if (xhr.status == 200) {
                   
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
                    

                    //let response = JSON.parse(this.responseText);                            
                    messages.style.color = "orange";
                    messages.innerHTML = "Product Edited";
                   // messages.innerHTML = xhr.responseText;

                    var sortNumber = xhr.responseText;
                    sortNumber = +sortNumber;
                    setSort(sortNumber);

                    var showProduct = document.getElementById("showProduct");
                    showProduct.innerHTML= "";
                    getProducts();
                    

                } else {
                    messages.style.display = "block";
                    messages.style.color = "red";
                    messages.innerHTML = 'err';
                }
            };

            xhr.open('POST', 'edit.php', true);
            xhr.send(formData);

        });

        //============================ cancle btn ============================//

        var cancelbtn = document.createElement("button");
        cancelbtn.classList = "cancelbtn";
        saveDiv.appendChild(cancelbtn);
        cancelbtn.innerHTML = "Cancel";
        cancelbtn.type = "button";

        cancelbtn.addEventListener("click", (event) => {
            event.target.style.color = "blue";
            event.target.parentElement.parentElement.parentElement.parentElement.style.display = "none";
            event.target.parentElement.parentElement.parentElement.parentElement.previousElementSibling.style.display = "block";


        });
    }
}