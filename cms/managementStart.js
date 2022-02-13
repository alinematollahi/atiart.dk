var managementStart = document.getElementById("management-start");
var addProduct = document.getElementById("addProduct");
var showProducts = document.getElementById("showProducts");
var manageMessages = document.getElementById("manage-messages");
var selectProductsBtn = document.getElementById("select-products");
var selectMessagesBtn = document.getElementById("select-messages");
var addBtn = document.getElementById("addBtn");
var addProductBox = document.getElementById("addProductBox");
var cancelAddProduct = document.getElementById("cancelAddProduct");
var addProductBtnDiv = document.getElementById("addProductBtnDiv");



selectProductsBtn.addEventListener("click",()=>{
    managementStart.style.display = "none";
    addProduct.style.display = "block";
    showProducts.style.display = "block"; 
});

selectMessagesBtn.addEventListener("click",()=>{
    managementStart.style.display = "none";
    manageMessages.style.display = "block";
});

addBtn.addEventListener("click",(event)=>{
    event.target.parentElement.style.display = "none";
    addProductBox.style.display = "block";
});

cancelAddProduct.addEventListener("click",()=>{
    addProductBox.style.display = "none";
    addProductBtnDiv.style.display = "block";
});


