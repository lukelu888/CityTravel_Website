<?php 
session_start();
require_once 'dbconfig.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/invoice.css">
    <link rel="icon" type="image/x-icon" href="./media/logo/icon.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <!-- <script src="./js/invoice.js"></script> -->
    <title>City Trip - Invoice</title>
    <style>
        *{
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica, sans-serif;
 
}
header{
    background-color: #063970;
    padding: 40px;
    width: auto;
    min-height: 100px;
}
#logo{
   margin:0 20px 0 20px;
   width: 300px;
   height:100px;
}
.logo{
    width:85%;
    float:left;
    box-sizing:border-box;
}
.navbar{
    margin-top:10px;
    width:15%;
    float:right;
    box-sizing:border-box;
   
}
.navbar ul{
    list-style: none;
    text-decoration: none;
}
.navbar li {
    display: inline-block;
    font-size:20px;   
    text-align:center;
    width:200px;
    height:50px;
    border: 1px solid black;
    background-color:grey;

}
.navbar li a{
    text-decoration: none;
    color: black;
    font-weight: bold;
    /* margin-top:10px; */
}

.navbar li:hover{
    background-color: lightgray;
    
}
select.select{
    width: 80%;
    padding:15px;
    margin:20px auto;
    border-radius: 10px;
    font-size: 20px;
}
    </style>
</head>
<body>
<?php require_once 'header.php'?>
    

    <section>
        <div class="container">
            <h1>Invoice</h1>
            <div id="invoice">
                <ul id="invoice-header">
                    <li class="productName">Product Name</li>
                    <li>Quantity</li>
                    <li>Price</li>
                    
                </ul>
                
                <ul class="invoice-content">
                    <li class="productName"><span id="productName" name="productname"></span></li>
                    <li><span id="quantity"></span></li>
                    <li><span id="price"></span></li>
                    <li>
                       
                    </li>
                </ul>
                <ul id="invoice-total">
                    <li></li>
                    <li></li>
    
                    <li>
                        <ul id = "summary">
                            <li>Subtotal: <span id="subtotal"></span></li>
                            <li>QST(9.975%): <span id="QST"></span></li>
                            <li>GST(5%): <span id="GST"></span></li>
                            <li class="total">Total : <span id="total"></span></li>
                        </ul>
                    </li>
                    
                </ul>
            </div>


            <h1>Finalise Payment</h1>
            <form action="result.php" method="POST" id="paymentForm">
                <div id = "payment">

                    <div id="cardInfo" name="card">
                        <h2>Credit Card Info</h2>
                        <label for="cardNumber">*Card Number</label>
                        <br>
                        <input type="number" name="cardNumber" value="1234567890123456">
                        <p>Enter 15 or 16 digit number</p>
                        <br>
                        <label for="CVC">*CVC Number</label>
                        <br>
                        <input type="number" name="CVC" value="123">
                        <p>3 or 4 digit only</p>
                        <br>
                        <label for="nameOnCard">*Name on the Card</label>
                        <br>
                        <input type="text" name="nameOnCard" value="YinglinLu">
                        <p>Can use char or space, first letter can only be char</p>
                        <br>
                        <label for="expireDate">*Expiration Date</label>
                        <br>
                        <input type="text" placeholder="MM/YY" name="expirationDate" value="12/23">
                        <p>Expiry Date must be Greater Than Or Equal to Today's Date, format is MM/YY</p>
                        <br>
                        <label for="cardType">*Card Type</label>
                        <br>
                        
                        <select name="cardType" class="select">
                                
                                <option value="Visa">Visa</option>
                                <option value="Mastercard">Mastercard</option>
                                <option value="AmericanExpress">AmericanExpress</option>
                        </select>

                      
                        
                        <input type="reset" class="btn" name="reset" value="Clear">
                        <br>
                        <label for="totalPurchase">Total Purchase</label>
                        <br>
                        <p id="totalPurchase"></p>
                        <br>
                        <h3>Show terms and Conditions</h3>
                        <input type="checkbox" name="checkbox" id="checkbox"> 
                        <label id="agree">*Agree terms and Conditions</label> 
                    
                    </div>
                    

                    <div id="shippingInfo">
                        <h2>Billing Address</h2>
                        <!-- <label for="name">*Name</label>
                        <br>
                        <input type="text" name="name">
                        <p>can use char or space</p>
                        <br> -->
                        <label for="address">*Address</label>
                        <br>
                        <input type="text" name="address" value="8090 rue Beaubien">
                        <p>can use char, space, - or , </p>
                        <br>
                        <label for="address2">Address Line 2</label>
                        <br>
                        <input type="text" name="address2" value="11">
                        <br>
                        <label for="city">*City</label>
                        <br>
                        <input type="text" name="city" value="Montreal">
                        <p>can only use char or space</p>
                        <br>
                        <label for="postalCode">*Postal Code</label>
                        <br>
                        <input type="text" name="postalCode" value="H1T 4A5">
                        <p>A1A 1A1</p>
                        <br>
                        <label for="province">*Province</label>
                        <br>
                        <input type="text" name="province" value="QC">
                        <p>only char or space</p>
                        <br>
                        <label for="country">*Country</label>
                        <br>
                        <input type="text" name="country" value="CA">
                        <p>can only use char or space</p>
                        <input type="reset" class="btn" name="checkbox" value="Clear">
                    </div>

                </div>
                <input type="submit" name="placeOrder" value="Place Order" id="placeOrder">
            </form>

            
           

           
        </div>
    </section>
    
    <footer>
        <i><a href="https://www.google.com/account/about/"><img src="./media/socialMedia/googlePlus.jpg" alt="google" class="icon"></a></i>
        <i><a href="https://www.facebook.com/"><img src="./media/socialMedia/facebook.png" alt="facebook" class="icon"></a></i>
        <i><a href="https://www.instagram.com/"><img src="./media/socialMedia/instagram.png" alt="instagram" class="icon"></a></i>
        <i><a href="https://www.skype.com/"><img src="./media/socialMedia/skype.png" alt="skype" class="icon"></a></i>
    </footer>
       
</body>
<script>
    
    
    
document.addEventListener("DOMContentLoaded", function() { 
    var lis = document.querySelectorAll('li');
    var myul = document.querySelector('ul');
    lis[0].style.backgroundColor = 'transparent';
    lis[0].style.borderStyle = 'none';
    lis[1].style.display = 'none';
    lis[2].style.display = 'none';
    lis[3].style.display = 'none';

    myul.onmouseover = function(){
        lis[0].style.backgroundColor = 'transparent';
        lis[1].style.display = 'block';
        lis[2].style.display = 'block';
        lis[3].style.display = 'block';
    }

    myul.onmouseout = function(){
        lis[1].style.display = 'none';
        lis[2].style.display = 'none';
        lis[3].style.display = 'none';
    }

    var orders = JSON.parse(localStorage.getItem("orders"));
    console.log(orders);
    var subtotal = 0;
    var total=0;
    var cookie_description="description=";
    for(let i = 0; i < orders.length; i++) {
        if(i==0){
            document.querySelector('#productName').textContent=orders[i].productName;
            document.querySelector('#quantity').textContent=orders[i].quantity;
            let price =orders[i].price;
            document.querySelector('#price').textContent= price +"$";
            subtotal+=price;
        }else{

            let newContent = document.querySelector('.invoice-content').cloneNode(true);
           
            newContent.querySelector('#productName').textContent=orders[i].productName;
            newContent.querySelector('#quantity').textContent=orders[i].quantity;
            let price =orders[i].price;
            newContent.querySelector('#price').textContent=price+"$";
            subtotal+=price;
          
            $('#invoice-total').before(newContent);

        }
        cookie_description+=orders[i].productName+" - quantity: "+orders[i].quantity+",";
    }
console.log("cookie_description is :"+cookie_description);

    document.querySelector('#subtotal').textContent=subtotal+"$";
    let QST =(subtotal*0.09975).toFixed(2);
    document.querySelector('#QST').textContent=QST+"$";
    let GST =(subtotal*0.05).toFixed(2)
    document.querySelector('#GST').textContent= GST +"$";
    total = (Number(subtotal)+Number(QST)+Number(GST)).toFixed(2)+"$";
    $('#total').text(total);
   
    document.querySelector('#totalPurchase').textContent=total;

  
    // Cookie : transfer JS to PHP
    
    document.cookie="total="+total;
    document.cookie=cookie_description;

    //validation for Payment
    var pattern ={
        cardNumber:/^\d{15,16}$/,
        CVC: /^[0-9]{3,4}$/,
        nameOnCard: /^[a-zA-Z][a-z\sA-Z]*$/,
        
        expirationDate: /^(((0[8-9]|1[0-2])[-/\s]?22)|((0[1-9]|1[0-2])[-/\s]?(2[3-9]|[3-9][3-9])))$/,
        
        name:/^[a-zA-Z][a-z-\sA-Z]*$/,
        address:/^[a-zA-Z0-9][a-zA-Z0-9,\s-]*$/,
        address2:/^\w*$/,
        city: /^[a-zA-Z][a-zA-Z\s]*$/,
        postalCode: /^[a-zA-Z][0-9][a-zA-Z][\s]?[0-9][a-zA-Z][0-9]$/,
        province: /^[a-zA-Z][a-zA-Z\s]*$/,
        country: /^[a-zA-Z][a-zA-Z\s]*$/
    }
    function validate(field, regEx){
        if(regEx.test(field.value)){
            field.className = 'valid';
        }
        else{
            field.className = 'invalid';                
        }
    }

    var inputs = document.querySelectorAll('input');
   
    inputs.forEach((input)=>{
        input.addEventListener('keyup', (e)=>{
            validate(e.target, pattern[e.target.attributes.name.value]);  
        })
    })

    var placeOrder = document.querySelector('#placeOrder');
    
    placeOrder.addEventListener('click', (e)=>{
        for(let i=0; i<inputs.length; i++) {
            let name = inputs[i].attributes.name.value;
          
            if(inputs[i].value == '' && name != 'address2'){
                
                alert('Please enter all the information with * !');
                e.preventDefault();
                return false;
            }
            if(inputs[i].className == "invalid"){
                
                switch(name){
                    case 'cardNumber': alert('Please enter valid card number!'); e.preventDefault();return false;
                    case 'CVC': alert('please enter valid CVC !'); e.preventDefault();return false;
                    case 'nameOnCard':  alert('Please enter valid name on the card !');  e.preventDefault();return false;
                    case 'expirationDate': alert('Please enter valid expiration date !'); e.preventDefault(); return false;
                    case 'name': alert('Please enter your valid name !'); e.preventDefault(); return false;
                    case 'address': alert('Please enter your address !'); e.preventDefault(); return false;
                    case 'city': alert('Please enter valid city !'); e.preventDefault();return false;
                    case 'postalCode':   alert('Please enter your valid postalCode !'); e.preventDefault();return false;
                    case 'province':   alert('Please enter your valid province !'); e.preventDefault();return false;
                    case 'country': alert('Please enter your valid country!'); e.preventDefault();return false;
                }   
            }       
        }
     
    
        if(!(document.querySelector('#checkbox').checked)){
            alert('Please agree with the terms and conditions !');
            e.preventDefault();
            return false;
        }else{
            alert('Successfully place order! Thanks for your purchase !');
            return true;
        }      
    })



 })


</script>
</html>

