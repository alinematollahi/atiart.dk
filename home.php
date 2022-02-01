<html lang="en" id="pageBackground">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AtiArt - Quilling</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/6dba727b51.js" crossorigin="anonymous"></script>
</head>

<body>
    

    <div id="menu">
        <button id="homePageBtn" type="button">Home</button>
        <button id="shopPageBtn" type="button">Shop</button>
        <button id="aboutPageBtn" type="button">About AtiArt</button>
        <button id="contactPageBtn" type="button">Contact Us</button>
        <button id="cartPageBtn" type="button">Cart <i class="fas fa-shopping-cart"></i></button>
    </div>

    <div id="home-header">AtiArt</div>

    <div id="homePage">
        <div id="content-part1">
            Quilling <br><br>
            Quilling is the art of rolled, shaped,
            and glued paper that results in creating
            a unified, decorative design. The name
            quilling is thought to come from the origin
            of the art; birds’ feathers, or quills, were
            used to coil the strips of paper around.
        </div>
        <h2>Sample Products</h2>
        <div id="content-part2"></div>

        <div id="content-tail">
            <button type="button" id="homeSeeMoreBtn"> See More</button>
        </div>
    </div>

    <div id="shopPage"></div>

    <div id="aboutPage">
            <ul>
                <li>All in the site is handmade</li>
                <li>suitable as cute decorations and lovely gifts</li>
                <li>Custom orders are welcome</li>
                <li>Shipping to all over the world</li>
            </ul>        
    </div>

    <div id="contactPage">
        <div id="contact-part1">
            CONTACT US
        </div>
        <div id="contact-part2">
            <ul>
                <li>
                    <i class="fas fa-map-marker-alt"></i>
                    Copenhagen-Denmark
                </li>
                <li>
                    <i class="fas fa-phone-square-alt"></i>
                    +45 71557785
                </li>
                <li>
                    <i class="fas fa-envelope"></i>
                    atiart@gmail.com
                </li>
                <li>
                    <a href="https://www.facebook.com/ati.art.165" target="_blank">
                        <i class="fab fa-facebook-square"></i>
                        ati.art.165
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/handmade.denmark" target="_blank">
                        <i class="fab fa-instagram"></i>
                        handmade.denmark
                    </a>
                </li>
            </ul>
        </div>
        <div id="contact-part3">
            <form id="contactForm" method="POST">
                <div class="required">
                    <input type="text" placeholder="your Name" required id="userName" name="userName">
                </div>
                <div class="required">
                    <input type="email" placeholder="your Email" required id="userEmail" name="userEmail">
                </div>
                <div class="required">
                    <textarea cols="30" rows="6" placeholder="your message" required id="userMessage" name="userMessage"></textarea>
                </div>
                <div>
                    <!--<input type="submit" value="send message">-->
                    <button type="button" id="formSubmitBtn">Send Message</button>
                </div>
            </form>
        </div>
    </div>

    <div id="cartPage">

        <div id="invoice">
            <div>
                <h2> Order Summary </h2>
            </div>
            <div>

                <table>
                    <tr>
                        <td> Subtotal</td>
                        <td id="subtotal"></td>
                    </tr>
                    <tr>
                        <td>Tax (5%)</td>
                        <td id="tax"></td>
                    </tr>
                    <tr>
                        <td>Shipping</td>
                        <td id="shipping"></td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <td id="total-topic">Total</td>
                        <td id="total"></td>
                    </tr>
                </table>

            </div>

            <div>
                <button>Checkout</button>
            </div>
        </div>

        <div  id="cart-box-container"></div>
    </div>

    <div id="sample-container">
        <div id="sample-part1">
            <div class="sample-part1-inside" id="sampleimg1"></div>
            <div class="sample-part1-inside" id="sampleimg2"></div>
            <div class="sample-part1-inside" id="sampleimg3"></div>
        </div>
        <div id="sample-part2">

        </div>
        <div id="sample-part3">
            <table>
                <tr>
                    <td class="col1">Name</td>
                    <td class="col2" id="nameValue"></td>
                </tr>
                <tr>
                    <td class="col1">Size</td>
                    <td class="col2" id="sizeValue"></td>
                </tr>
                <tr>
                    <td class="col1">Price</td>
                    <td class="col2" id="priceValue"></td>
                </tr>
                <tr>
                    <td class="col1">Details</td>
                    <td class="col2" id="detailsValue"></td>
                </tr>
            </table>
            <div id="sampleInputContainer">
                <input type="hidden">
                <input type="hidden">
                <input type="hidden">
                <input type="hidden">
                <input type="hidden">
                <input type="hidden">
                <input type="hidden">
                <input type="hidden">
                <div>
                    <button type="button" onclick="addToCart(event)">Add to Cart</button>
                    <button type="button" id="ReturntoShopPageBtn">Return to Shop Page</button>
                </div>  
            </div>
        </div>
    </div>
    


    <div id="footer">
        <div>
            Quilling Art <br> <br>
            Quilling is the art of rolled,
            shaped, and glued paper that results
            in creating a unified,
            decorative design.
        </div>
        <div>
            Contact <br><br>
            <i class="fas fa-map-marker-alt"></i>
            Copenhagen-Denmark
            <br>
            <i class="fas fa-phone-square-alt"></i>
            +45 71557785
            <br>
            <a href="https://www.facebook.com/ati.art.165" target="_blank">
                <i class="fab fa-facebook-square"></i>
                ati.art.165
            </a>
            <br>
            <a href="https://www.instagram.com/handmade.denmark" target="_blank">
                <i class="fab fa-instagram"></i>
                handmade.denmark
            </a>
        </div>
        <div>
            Ati Art
            <br>
            <ul>
                <li>All in the site is handmade</li>
                <li>suitable as cute decorations and lovely gifts</li>
                <li>Custom orders are welcome</li>
                <li>Shipping to all over the world</li>
            </ul>
        </div>
    </div>

    <div id="hide-window">
        <div id="cart-question" class="question">
            <div id="addedText"> Product Added to the Cart</div>
            <div id="existText"> This Product Is Already in the Cart</div>
            <button id="backToShop"> Continue Shopping </button>
            <button id="seeCart"> See the Cart </button>
        </div>
    </div>
    <div id="confirmation"></div>

    <script src="script.js"></script>
</body>

</html>