<?php 
session_start();
require_once 'dbconfig.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="./media/logo/icon.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <title>City Trip - Welcome</title>
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
    position:absolute;
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

.searchBar #keyword{
    height: 60px;
    width:500px;
    border-radius: 14px;
    font-size: 50px;
}


section{
    background-image: url(./media/background/820461.jpg) ;
    background-size: 100% 100%;
    width:100%;
    min-height:600px;
    text-align: center;
    padding:30px 0;
    z-index: -1;
 }


 section h1{
    font-size: 80px;    
    padding: 40px;
    color:white;
    font-weight: bold;
    text-align:center;
    
    
 }

 section p{
    color:white;
    font-size: 40px;
    width:60%;
    margin:5px auto;
 }

.container1{
    width:80%;
    margin:10px auto;
    padding:50px 0px;
    box-sizing: border-box ;
    color:white;
    font-size: 40px;

}
#main ul{
    display: grid;
    grid-row-gap: 10px;
    grid-column-gap:10px;
    grid-template-columns: repeat(3, 1fr);
    margin: 30px 0;
    list-style: none;
    color: white;
    font-weight: bold;

}

.checkbox{

    height:40px;
    width:40px;
    text-align:center;
}


 footer{
    background-color: #063970;
    min-height: 100px;
    text-align: center;
 }
 .icon{
    width: 50px;
    height: 50px;
    margin:30px 60px;
    display: inline-block;
    border-radius: 10px;
 }

 .quantity{
    height: 70px;
    width:5em;
    font-size:30px;
 }

 #submit{
    background-image: linear-gradient(to right, #6A5ACD 0%, #1E90FF 51%, #1E90FF 100%);
    color:white;
    font-weight: bold;
    font-size: 35px;
    transition: 0.5s;
    height:90px;
    width:300px;
    border:none;
    border-radius:20px;
 }

 #submit:hover{
    cursor: pointer;
    color:black;
    background-position: right center;
 }
 
 
 </style>
</head>
<body>
<?php require_once 'header.php'?>

    <section>
        <div class="container">
            <h1>Welcome to CityTrip  </h1>
            <p>We inspire, you create and we deliver.At CityTrip, you are the creator of your getaway. </p> 
        </div>

        <div id="banner">
        <br><br>
        <form class="searchBar" action="Search.php" method="GET">
            <input type="text" id="keyword" name='keyword' placeholder="Search city name...">
            <br><br><br>
            <input type="submit" id="submit" value="Search City">
        </form>
          
            
        </div>
        <div id="searchResult">
            <h1>Search Results:</h1>
        </div>
        <div class="container1">
	  		<form  action="./invoice.php" method="get" id="main">
            <ul>
            <?php 
            if(isset($_GET['keyword'])){
                $keyword=$_GET["keyword"];
            }else{
                $keyword="";
            }   
            try{
                $sql = "SELECT * FROM `product` WHERE City like '%$keyword%'";
                
                $prepare = $connection->prepare($sql);
                $prepare->execute();
                $result=$prepare->fetchAll();
                
                foreach($result as $oneCity){
                    $photo = $oneCity["Photo"];
                    $ProductID =  $oneCity["ProductID"];
                    $city=$oneCity["City"];
                    $Description = $oneCity["Description"];
                    $Price = $oneCity["Price"];
                    
                    
                    echo "<li>
                    <p> <a href='./media/gallery/newYork.jpg' target='_blank'><img src='$photo' alt='newYork' class='gallery-image'></a></p>
                        <h1>$city</h1>
                    <h3>$Description<h3>
                        
                    
                    <h3>$<span class='price'>$Price</span></h3>
                    <input type='checkbox' class='checkbox' name='selection[$ProductID]'>
                    <label>Quantity:   </label>
                    <input type='number' class='quantity'>
                    </li>";
                }     
            }catch(PDOException $e){
                echo $e->getMessage();
            }               
    
            
        
            ?>
            </ul>
            <br>
            <br>
            <input type="submit" id="submit" value="Check out">
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

   var totalPrice =0;
   var count = 0;

   $('#main').on('submit', function(e) {
       
       let checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
      
       if(checkboxes.length >4 || checkboxes.length==0){
           alert('Please select at least 1 and maximum 4 city tours!');
           return false;
       }else{
           let quantity = 0;
           let productName ='';
           let price = 0;
           let orders = new Array();
           count = 0;
           checkboxes.forEach(function(checkbox){

               productName = checkbox.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.textContent +": " +checkbox.previousElementSibling.previousElementSibling.previousElementSibling.textContent;
               console.log(productName);
             
               quantity = checkbox.nextElementSibling.nextElementSibling.value;
               console.log(quantity);
               if(quantity==0){
                   alert('Please enter at least 1 for the item quantity!');
                   count++;
                   return false;
               }
               price =parseInt(checkbox.previousElementSibling.children[0].textContent)*quantity;
               console.log(price);
               let order = {
                   'productName':productName,
                   'quantity':quantity,
                   'price':price,
               }
               orders.push(order);
            })
            
           
            if(count>0){             
               e.preventDefault();
               
            }else{
               localStorage.setItem('orders',JSON.stringify(orders));
               return true;
            }
          
            
         
       }
   })
})

</script>
</html>