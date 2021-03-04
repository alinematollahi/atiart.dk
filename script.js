
// main page variables
var homeHeader = document.getElementById("home-header");
var menu = document.getElementById("menu");
var homePage = document.getElementById("homePage");
var shopPage = document.getElementById("shopPage");
var aboutPage = document.getElementById("aboutPage");
var contactPage = document.getElementById("contactPage");
var cartPage = document.getElementById("cartPage");
var sampleContainer = document.getElementById("sample-container");
var footer = document.getElementById("footer");

// menu buttons
var homePageBtn = document.getElementById("homePageBtn");
var shopPageBtn = document.getElementById("shopPageBtn");
var aboutPageBtn = document.getElementById("aboutPageBtn");
var contactPageBtn = document.getElementById("contactPageBtn");
var cartPageBtn = document.getElementById("cartPageBtn");

// cart page variables
var subtotal = document.getElementById("subtotal");
var tax = document.getElementById("tax");
var shipping = document.getElementById("shipping");
var total = document.getElementById("total");

// sample page variables
var sampleName = document.getElementById("nameValue");
var sampleSize = document.getElementById("sizeValue");
var samplePrice = document.getElementById("priceValue");
var sampleDetails = document.getElementById("detailsValue");

var sampleimg1 = document.getElementById("sampleimg1");
var sampleimg2 = document.getElementById("sampleimg2");
var sampleimg3 = document.getElementById("sampleimg3");

var bigPicture = document.getElementById("sample-part2");

// more
var homeSeeMoreBtn = document.getElementById("homeSeeMoreBtn");
var pageBackground = document.getElementById("pageBackground");


//================================ move between pages ================================//

homePageBtn.addEventListener("click", () => {
    homeHeader.style.display = "block";
    homePage.style.display = "block";

    shopPage.style.display = "none";
    aboutPage.style.display = "none";
    contactPage.style.display = "none";
    cartPage.style.display = "none";
    sampleContainer.style.display = "none";

    pageBackground.style.background = 'url("pictures/l.jpg") no-repeat center fixed';
    pageBackground.style.backgroundSize = 'cover';
});

shopPageBtn.addEventListener("click", () => {
    shopPage.style.display = "flex";

    homeHeader.style.display = "none";
    homePage.style.display = "none";
    aboutPage.style.display = "none";
    contactPage.style.display = "none";
    cartPage.style.display = "none";
    sampleContainer.style.display = "none";

    pageBackground.style.background = 'url("pictures/k.jpg") no-repeat center fixed';
    pageBackground.style.backgroundSize = 'cover';
});

aboutPageBtn.addEventListener("click", () => {
    aboutPage.style.display = "block";

    homeHeader.style.display = "none";
    homePage.style.display = "none";
    shopPage.style.display = "none";
    contactPage.style.display = "none";
    cartPage.style.display = "none";
    sampleContainer.style.display = "none";

    pageBackground.style.background = 'url("pictures/r.jpg") no-repeat center fixed';
    pageBackground.style.backgroundSize = 'cover';
});

contactPageBtn.addEventListener("click", () => {
    contactPage.style.display = "block";

    homeHeader.style.display = "none";
    homePage.style.display = "none";
    shopPage.style.display = "none";
    aboutPage.style.display = "none";
    cartPage.style.display = "none";
    sampleContainer.style.display = "none";

    pageBackground.style.background = 'url("pictures/l.jpg") no-repeat center fixed';
    pageBackground.style.backgroundSize = 'cover';
});

cartPageBtn.addEventListener("click", () => {
    cartPage.style.display = "block";

    homeHeader.style.display = "none";
    homePage.style.display = "none";
    shopPage.style.display = "none";
    aboutPage.style.display = "none";
    contactPage.style.display = "none";
    sampleContainer.style.display = "none";

    pageBackground.style.background = 'url("pictures/a.jpg") no-repeat center fixed';
    pageBackground.style.backgroundSize = 'cover';
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

homeSeeMoreBtn.addEventListener("click", () => {
    shopPage.style.display = "flex";

    homeHeader.style.display = "none";
    homePage.style.display = "none";
    aboutPage.style.display = "none";
    contactPage.style.display = "none";
    cartPage.style.display = "none";
    sampleContainer.style.display = "none";
});

//=========================== get products from DB & create shop page and cart page ===========================//

window.addEventListener("load", getProducts);

function getProducts() {

    let xhr = new XMLHttpRequest();
    xhr.onload = function () {
        if (xhr.status == 200) {

            var response = JSON.parse(this.responseText);

            var sampleInputContainer= document.getElementById("sampleInputContainer");

            // create shop page

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
                   
                    let id = document.createElement("input");
                    productBox.appendChild(id);
                    id.type = "hidden";
                    id.value = response[i].id;

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
                        samplePrice.innerHTML = product.children[2].value + "  DKK";
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

                        sampleInputContainer.children[0].value = product.children[0].value;
                        sampleInputContainer.children[1].value = product.children[1].value;
                        sampleInputContainer.children[2].value = product.children[2].value;
                        sampleInputContainer.children[3].value = product.children[3].value;
                        sampleInputContainer.children[4].value = product.children[4].value;
                        sampleInputContainer.children[5].value = product.children[5].value;
                        sampleInputContainer.children[6].value = product.children[6].value;
                        sampleInputContainer.children[7].value = product.children[7].value;

                    });

                    let detailBox = document.createElement("div");
                    productBox.appendChild(detailBox);
                    detailBox.classList = "detail";

                    let detailNode1 = document.createTextNode(
                        "Price : " + response[i].price + " DKK"
                    );
                    detailBox.appendChild(detailNode1);

                    let linebreak = document.createElement("br");
                    detailBox.appendChild(linebreak);

                    let detailNode2 = document.createTextNode(
                        "Size : " + response[i].size
                    );
                    detailBox.appendChild(detailNode2);

                    let addToCartBtn = document.createElement("button");
                    addToCartBtn.innerHTML = "Add to Cart";
                    detailBox.appendChild(addToCartBtn);
                    addToCartBtn.type = "button";
                    addToCartBtn.addEventListener("click", addToCart);
                }

            }

            // create home page

            var homePart2 = document.getElementById("content-part2");

            for (var i = 0; i < 6 ; i++) {
                if (response[i].activity == '1') {
                    let productBox = document.createElement("div");
                    homePart2.appendChild(productBox);
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

                    
                    let id = document.createElement("input");
                    productBox.appendChild(id);
                    id.type = "hidden";
                    id.value = response[i].id;

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
                        samplePrice.innerHTML = product.children[2].value + "  DKK";
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

                        sampleInputContainer.children[0].value = product.children[0].value;
                        sampleInputContainer.children[1].value = product.children[1].value;
                        sampleInputContainer.children[2].value = product.children[2].value;
                        sampleInputContainer.children[3].value = product.children[3].value;
                        sampleInputContainer.children[4].value = product.children[4].value;
                        sampleInputContainer.children[5].value = product.children[5].value;
                        sampleInputContainer.children[6].value = product.children[6].value;
                        sampleInputContainer.children[7].value = product.children[7].value;
                    });

                    let detailBox = document.createElement("div");
                    productBox.appendChild(detailBox);
                    detailBox.classList = "detail";

                    let detailNode1 = document.createTextNode(
                        "Price : " + response[i].price + " DKK"
                    );
                    detailBox.appendChild(detailNode1);

                    let linebreak = document.createElement("br");
                    detailBox.appendChild(linebreak);

                    let detailNode2 = document.createTextNode(
                        "Size : " + response[i].size
                    );
                    detailBox.appendChild(detailNode2);
                }
            }
        } else {
            document.write('err');
        }
    };
    xhr.open("GET", "editProduct.php?show=ok", true);
    xhr.send();
}


// set cart

var subtotalValue = 0;
var taxValue;
var shippingValue = 0;
var totalValue = 0;

taxValue= (subtotalValue + (subtotalValue * 0.05));

subtotal.innerHTML = subtotalValue + "  DKK";
tax.innerHTML = taxValue + "  DKK";
shipping.innerHTML = shippingValue + "  DKK";
total.innerHTML = totalValue + "  DKK";

//=============================================== add to cart ===============================================//


var cartProductIDs =[];

var hideWindow = document.getElementById("hide-window");
var cartQuestion = document.getElementById("cart-question");
var addedText = document.getElementById("addedText");
var existText = document.getElementById("existText");
var backToShop = document.getElementById("backToShop");
var seeCart = document.getElementById("seeCart");

backToShop.addEventListener("click",()=>{
    hideWindow.style.display = "none";
    shopPage.style.display = "flex";

    homeHeader.style.display = "none";
    homePage.style.display = "none";
    aboutPage.style.display = "none";
    contactPage.style.display = "none";
    cartPage.style.display = "none";
    sampleContainer.style.display = "none";
});

seeCart.addEventListener("click",()=>{
    hideWindow.style.display = "none";
    cartPage.style.display = "block";

    homeHeader.style.display = "none";
    homePage.style.display = "none";
    shopPage.style.display = "none";
    aboutPage.style.display = "none";
    contactPage.style.display = "none";
    sampleContainer.style.display = "none";
});

function addToCart(event) {

    event.stopPropagation();

    let id = event.target.parentElement.parentElement.children[7];
    let continueFunc = true;
    for( x in cartProductIDs){
        if (id.value == cartProductIDs[x].value){ continueFunc = false; alert(cartProductIDs[x].value);}
    }

    if ( continueFunc == false) {
        hideWindow.style.display = "block";
        existText.style.display = "block";
        addedText.style.display = "none";
    }
    else {

        cartProductIDs.push(id);

        let name = event.target.parentElement.parentElement.children[0];
        let price = event.target.parentElement.parentElement.children[2];
        let mainImg = event.target.parentElement.parentElement.children[4];
        
        let cartBoxContainer = document.getElementById("cart-box-container");

        let cartBox = document.createElement("div");
        cartBoxContainer.appendChild(cartBox);
        cartBox.classList = "cart-box";

        // part 1

        let cartBoxPart1 = document.createElement("div");
        cartBox.appendChild(cartBoxPart1);
        cartBoxPart1.classList = "cart-box-part1";
        cartBoxPart1.style.background = 'url("' + mainImg.value + '") no-repeat center';
        cartBoxPart1.style.backgroundSize = "contain";

          // create hidden input to use for sample page;

        let Name = document.createElement("input");
        cartBoxPart1.appendChild(Name);
        Name.type = "hidden";
        Name.value =  event.target.parentElement.parentElement.children[0].value;

        let size = document.createElement("input");
        cartBoxPart1.appendChild(size);
        size.type = "hidden";
        size.value =  event.target.parentElement.parentElement.children[1].value;

        let Price = document.createElement("input");
        cartBoxPart1.appendChild(Price);
        Price.type = "hidden";
        Price.value =  event.target.parentElement.parentElement.children[2].value;

        let details = document.createElement("input");
        cartBoxPart1.appendChild(details);
        details.type = "hidden";
        details.value =  event.target.parentElement.parentElement.children[3].value;

        let img1src = document.createElement("input");
        cartBoxPart1.appendChild(img1src);
        img1src.type = "hidden";
        img1src.value =  event.target.parentElement.parentElement.children[4].value;

        let img2src = document.createElement("input");
        cartBoxPart1.appendChild(img2src);
        img2src.type = "hidden";
        img2src.value =  event.target.parentElement.parentElement.children[5].value;

        let img3src = document.createElement("input");
        cartBoxPart1.appendChild(img3src);
        img3src.type = "hidden";
        img3src.value =  event.target.parentElement.parentElement.children[6].value;

        
        let ID = document.createElement("input");
        cartBoxPart1.appendChild(ID);
        ID.type = "hidden";
        ID.value =  event.target.parentElement.parentElement.children[7].value;
        
        cartBoxPart1.addEventListener("click",(event)=>{
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
            samplePrice.innerHTML = product.children[2].value + "  DKK";
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

        // part 2

        let cartBoxPart2 = document.createElement("div");
        cartBox.appendChild(cartBoxPart2);
        cartBoxPart2.classList = "cart-box-part2";
        
            let cartBoxPart2Table1 = document.createElement("table");
            cartBoxPart2.appendChild(cartBoxPart2Table1);
            cartBoxPart2Table1.classList = "cart-box-part2-table1";

                let cartBoxPart2Table1Tr1 = document.createElement("tr");
                cartBoxPart2Table1.appendChild(cartBoxPart2Table1Tr1);

                    let cartBoxPart2Table1Tr1Td1 = document.createElement("td");
                    cartBoxPart2Table1Tr1.appendChild(cartBoxPart2Table1Tr1Td1);
                    cartBoxPart2Table1Tr1Td1.classList = "cart-box-part2-table1-col1";
                    cartBoxPart2Table1Tr1Td1.innerHTML = "Name";

                    let cartBoxPart2Table1Tr1Td2 = document.createElement("td");
                    cartBoxPart2Table1Tr1.appendChild(cartBoxPart2Table1Tr1Td2);
                    cartBoxPart2Table1Tr1Td2.classList = "cart-box-part2-table1-col2";
                    cartBoxPart2Table1Tr1Td2.innerHTML = name.value;

                let cartBoxPart2Table1Tr2 = document.createElement("tr");
                cartBoxPart2Table1.appendChild(cartBoxPart2Table1Tr2);

                    let cartBoxPart2Table1Tr2Td1 = document.createElement("td");
                    cartBoxPart2Table1Tr2.appendChild(cartBoxPart2Table1Tr2Td1);
                    cartBoxPart2Table1Tr2Td1.classList = "cart-box-part2-table1-col1";
                    cartBoxPart2Table1Tr2Td1.innerHTML = "Unit Price";

                    let cartBoxPart2Table1Tr2Td2 = document.createElement("td");
                    cartBoxPart2Table1Tr2.appendChild(cartBoxPart2Table1Tr2Td2);
                    cartBoxPart2Table1Tr2Td2.classList = "cart-box-part2-table1-col2";
                    cartBoxPart2Table1Tr2Td2.innerHTML = price.value +"  DKK";
        

            let cartBoxPart2Table2 = document.createElement("table");
            cartBoxPart2.appendChild(cartBoxPart2Table2);
            cartBoxPart2Table2.classList = "cart-box-part2-table2";

                let cartBoxPart2Table2Tr = document.createElement("tr");
                cartBoxPart2Table2.appendChild(cartBoxPart2Table2Tr);

                    let cartBoxPart2Table2TrTd1 = document.createElement("td");
                    cartBoxPart2Table2Tr.appendChild(cartBoxPart2Table2TrTd1);
                    cartBoxPart2Table2TrTd1.classList = "cart-box-part2-table2-col1";
                    cartBoxPart2Table2TrTd1.innerHTML = "Quantity";

                    let cartBoxPart2Table2TrTd2 = document.createElement("td");
                    cartBoxPart2Table2Tr.appendChild(cartBoxPart2Table2TrTd2);
                    cartBoxPart2Table2TrTd2.classList = "cart-box-part2-table2-col2";

                        let quantity = document.createElement("input");
                        cartBoxPart2Table2TrTd2.appendChild(quantity);
                        quantity.classList = "quantity";
                        quantity.type = "number";
                        quantity.value = 1 ;

        // part 3

        let cartBoxPart3 = document.createElement("div");
        cartBox.appendChild(cartBoxPart3);
        cartBoxPart3.classList = "cart-box-part3";
        let productPrice = quantity.value * price.value;
        
        cartBoxPart3.innerHTML = productPrice + "  DKK";
        subtotalValue = +subtotalValue;
        productPrice = +productPrice;
        subtotalValue = subtotalValue + productPrice;
        subtotal.innerHTML = subtotalValue + "  DKK";

        shippingValue = shippingValue + (quantity.value*20);

        taxValue = subtotalValue * 0.05;
        taxValue = taxValue.toFixed(2);
        taxValue = +taxValue;
        totalValue = subtotalValue + taxValue + shippingValue;

        subtotal.innerHTML = subtotalValue + "  DKK";
        tax.innerHTML = taxValue + "  DKK";
        shipping.innerHTML = shippingValue + "  DKK";
        total.innerHTML = totalValue + "  DKK";


        quantity.addEventListener("change",()=>{

            let priceDiff = (quantity.value * price.value) - productPrice;
            productPrice = quantity.value * price.value;
            cartBoxPart3.innerHTML = productPrice + "  DKK";
            subtotalValue = subtotalValue + priceDiff;
            subtotal.innerHTML = subtotalValue + "  DKK";

            taxValue = subtotalValue * 0.05;
            taxValue = taxValue.toFixed(2);
            taxValue = +taxValue;
            tax.innerHTML = taxValue + "  DKK";

            shippingValue = shippingValue + ((priceDiff/price.value)*20);
            shipping.innerHTML = shippingValue + "  DKK";

            totalValue = subtotalValue + taxValue + shippingValue;
            total.innerHTML = totalValue + "  DKK";
        });

        // part 4

        let cartBoxPart4 = document.createElement("div");
        cartBox.appendChild(cartBoxPart4);
        cartBoxPart4.classList = "cart-box-part4";

            let closeProductBox = document.createElement("i");
            cartBoxPart4.appendChild(closeProductBox);
            closeProductBox.classList = "fas fa-times";

            closeProductBox.addEventListener("click",(event)=>{

                subtotalValue = subtotalValue - (quantity.value * price.value);
                subtotal.innerHTML = subtotalValue + "  DKK";

                taxValue = subtotalValue * 0.05;
                taxValue = taxValue.toFixed(2);
                taxValue = +taxValue;
                tax.innerHTML = taxValue + "  DKK";

                shippingValue = shippingValue - (20*quantity.value);
                shipping.innerHTML = shippingValue + "  DKK";

                totalValue = subtotalValue + taxValue + shippingValue;
                total.innerHTML = totalValue + "  DKK";

                event.target.parentElement.parentElement.style.display="none";

                for(x in cartProductIDs){
                    if (id.value == cartProductIDs[x].value){cartProductIDs[x]="";}
                }
            });

           // show confirmation message

           hideWindow.style.display = "block";
           addedText.style.display = "block";
           existText.style.display = "none";
    }
}

//================================ set contact form ================================//

var formSubmitBtn =contactForm["formSubmitBtn"];

formSubmitBtn.addEventListener("click",()=>{

    var userName = document.getElementById("userName").value;
    var userEmail = document.getElementById("userEmail").value;
    var userMessage = document.getElementById("userMessage").value;
    var contactForm = document.getElementById("contactForm");
    var confirmation = document.getElementById("confirmation");

    let date = new Date().toLocaleDateString();
    let time = new Date().toLocaleTimeString();

    let formData = new FormData();

    formData.append('date', date);
    formData.append('time', time);
    formData.append('userName', userName);
    formData.append('userEmail', userEmail);
    formData.append('userMessage', userMessage);

    let xhr = new XMLHttpRequest();
    xhr.onload = function () {
        if (xhr.status == 200) {
            contactForm.reset();

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
                                        confirmation.style.display = "none"
                                    } else {
                                        counter1--;
                                        confirmation.style.opacity = counter1 / 100;
                                    }
                                }
                            }
                        } else {
                            counter++;
                            confirmation.style.display = "block"
                            confirmation.style.opacity = counter / 100;
                        }
                    }

                    confirmation.innerHTML = "Your Message Sent";
                    confirmation.style.color = "green";
        } else {
 
        }
    };

    xhr.open('POST', 'getMessage.php', true);
    xhr.send(formData);     
});

