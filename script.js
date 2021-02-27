var homeHeader = document.getElementById("home-header");
var menu = document.getElementById("menu");
var homePage = document.getElementById("homePage");
var shopPage = document.getElementById("shopPage");
var aboutPage = document.getElementById("aboutPage");
var contactPage = document.getElementById("contactPage");
var cartPage = document.getElementById("cartPage");
var sampleContainer = document.getElementById("sample-container");
var footer = document.getElementById("footer");


var sampleName = document.getElementById("nameValue");
var sampleSize = document.getElementById("sizeValue");
var samplePrice = document.getElementById("priceValue");
var sampleDetails = document.getElementById("detailsValue");

var sampleimg1 = document.getElementById("sampleimg1");
var sampleimg2 = document.getElementById("sampleimg2");
var sampleimg3 = document.getElementById("sampleimg3");

var bigPicture = document.getElementById("sample-part2");

var homePageBtn = document.getElementById("homePageBtn");
var shopPageBtn = document.getElementById("shopPageBtn");
var aboutPageBtn = document.getElementById("aboutPageBtn");
var contactPageBtn = document.getElementById("contactPageBtn");
var cartPageBtn = document.getElementById("cartPageBtn");

homePageBtn.addEventListener("click", () => {
    homeHeader.style.display = "block";
    homePage.style.display = "block";

    shopPage.style.display = "none";
    aboutPage.style.display = "none";
    contactPage.style.display = "none";
    cartPage.style.display = "none";
    sampleContainer.style.display = "none";
});

shopPageBtn.addEventListener("click", () => {
    shopPage.style.display = "flex";

    homeHeader.style.display = "none";
    homePage.style.display = "none";
    aboutPage.style.display = "none";
    contactPage.style.display = "none";
    cartPage.style.display = "none";
    sampleContainer.style.display = "none";
});

aboutPageBtn.addEventListener("click", () => {
    aboutPage.style.display = "block";

    homeHeader.style.display = "none";
    homePage.style.display = "none";
    shopPage.style.display = "none";
    contactPage.style.display = "none";
    cartPage.style.display = "none";
    sampleContainer.style.display = "none";
});

contactPageBtn.addEventListener("click", () => {
    contactPage.style.display = "block";

    homeHeader.style.display = "none";
    homePage.style.display = "none";
    shopPage.style.display = "none";
    aboutPage.style.display = "none";
    cartPage.style.display = "none";
    sampleContainer.style.display = "none";
});

cartPageBtn.addEventListener("click", () => {
    cartPage.style.display = "block";

    homeHeader.style.display = "none";
    homePage.style.display = "none";
    shopPage.style.display = "none";
    aboutPage.style.display = "none";
    contactPage.style.display = "none";
    sampleContainer.style.display = "none";
});

ReturntoShopPageBtn.addEventListener("click", () => {
    shopPage.style.display = "flex";

    homeHeader.style.display = "none";
    homePage.style.display = "none";
    aboutPage.style.display = "none";
    contactPage.style.display = "none";
    cartPage.style.display = "none";
    sampleContainer.style.display = "none";
});

window.addEventListener("load", getProducts);

function getProducts() {

    let xhr = new XMLHttpRequest();
    xhr.onload = function () {
        if (xhr.status == 200) {

            var response = JSON.parse(this.responseText);

            for (var i = 0; i < response.length; i++) {
                if (response[i].activity == '1') {
                    let productBox = document.createElement("div");
                    shopPage.appendChild(productBox);
                    productBox.classList = "sample";
                    productBox.style.background = 'url("' + response[i].img1src + '") no-repeat center';
                    productBox.style.backgroundSize = "contain";

                    let name = document.createElement("input");
                    productBox.appendChild(name);
                    name.type = "hidden";
                    name.value = response[i].name;

                    let size = document.createElement("input");
                    productBox.appendChild(size);
                    size.type = "hidden";
                    size.value = response[i].size;

                    let price = document.createElement("input");
                    productBox.appendChild(price);
                    price.type = "hidden";
                    price.value = response[i].price;

                    let details = document.createElement("input");
                    productBox.appendChild(details);
                    details.type = "hidden";
                    details.value = response[i].details;

                    let img1src = document.createElement("input");
                    productBox.appendChild(img1src);
                    img1src.type = "hidden";
                    img1src.value = response[i].img1src;

                    let img2src = document.createElement("input");
                    productBox.appendChild(img2src);
                    img2src.type = "hidden";
                    img2src.value = response[i].img2src;

                    let img3src = document.createElement("input");
                    productBox.appendChild(img3src);
                    img3src.type = "hidden";
                    img3src.value = response[i].img3src;

                    productBox.addEventListener("click", (event) => {

                        sampleContainer.style.display = "block";

                        homeHeader.style.display = "none";
                        homePage.style.display = "none";
                        shopPage.style.display = "none";
                        aboutPage.style.display = "none";
                        contactPage.style.display = "none";
                        cartPage.style.display = "none";

                        let product = event.target;

                        sampleName.innerHTML = product.children[0].value;
                        sampleSize.innerHTML = product.children[1].value;
                        samplePrice.innerHTML = product.children[2].value;
                        sampleDetails.innerHTML = product.children[3].value;

                        sampleimg1.style.background = 'url("' + product.children[4].value + '") no-repeat center';
                        sampleimg1.style['background-size'] = 'contain';

                        sampleimg2.style.background = 'url("' + product.children[5].value + '") no-repeat center';
                        sampleimg2.style['background-size'] = 'contain';

                        sampleimg3.style.background = 'url("' + product.children[6].value + '") no-repeat center';
                        sampleimg3.style['background-size'] = 'contain';

                        bigPicture.style.background = 'url("' + product.children[4].value + '") no-repeat center';
                        bigPicture.style['background-size'] = 'contain';

                        sampleimg1.addEventListener("click", () => {
                            bigPicture.style.background = 'url("' + product.children[4].value + '") no-repeat center';
                            bigPicture.style['background-size'] = 'contain';
                            sampleimg1.style.boxShadow = "0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(27, 188, 236, 0.4)";
                            sampleimg2.style.boxShadow = "0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)";
                            sampleimg3.style.boxShadow = "0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)";
                        });

                        sampleimg2.addEventListener("click", () => {
                            bigPicture.style.background = 'url("' + product.children[5].value + '") no-repeat center';
                            bigPicture.style['background-size'] = 'contain';
                            sampleimg2.style.boxShadow = "0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(27, 188, 236, 0.4)";
                            sampleimg1.style.boxShadow = "0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)";
                            sampleimg3.style.boxShadow = "0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)";
                        });

                        sampleimg3.addEventListener("click", () => {
                            bigPicture.style.background = 'url("' + product.children[6].value + '") no-repeat center';
                            bigPicture.style['background-size'] = 'contain';
                            sampleimg3.style.boxShadow = "0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(27, 188, 236, 0.4)";
                            sampleimg2.style.boxShadow = "0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)";
                            sampleimg1.style.boxShadow = "0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)";
                        });
                    });

                    let detailBox = document.createElement("div");
                    productBox.appendChild(detailBox);
                    detailBox.classList = "detail";

                    let detailNode = document.createTextNode(
                        "Price : " + response[i].price + '\n' +
                        "Size : " + response[i].size
                    );
                    detailBox.appendChild(detailNode);

                    let addToCartBtn = document.createElement("button");
                    addToCartBtn.innerHTML = "Add to Cart";
                    detailBox.appendChild(addToCartBtn);
                    addToCartBtn.type = "button";
                    addToCartBtn.addEventListener("click", addToCart);

                }

            }

            //changeFile1.nextElementSibling.value = xhr.responseText;
        } else {
            document.write('err');
        }
    };
    xhr.open("GET", "editProduct.php?show=ok", true);
    xhr.send();
}

function ReturntoShopPage() {
    alert('ooooooook');
}

function addToCart() {

}

