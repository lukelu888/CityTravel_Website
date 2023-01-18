<?php 
session_start();
require_once 'dbconfig.php';
$sql = $connection->query(" select * from users where userName = '".$_SESSION['UserName']."' ");
foreach($sql as $data);

if(isset($_POST['edit'])){
    header('location:ChangeInfo.php');
}
// var_dump($_SESSION['userId']);
$stmt = "SELECT * FROM `order` where userId = ".$_SESSION['userId'];
$prepare = $connection->prepare($stmt);
$prepare->execute();
$result = $prepare->fetchAll();




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="./media/logo/icon.png">
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
    height:10px;
    text-decoration: none;

}
.navbar li {
    display: inline-block;
    font-size:20px;   
    text-align:center;
    width:200px;
    height:50px;
    /* padding-left: 50px; */
    border: 2px solid black;
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

 .container h1{
    font-size: 50px;    
    padding: 50px;
    text-align:center;
    color:black;
    font-weight: bold;
    
 }
.mainTab ul{
    list-style:none;
    border:1px solid #999;
    background-color: lightblue;
    font-size: 20px;
    width: auto;
    text-align:center;
    margin: auto 20%;
    
    
}
.mainTab li{
    display: inline-block;
    margin: 10px 10px;
    padding: 20px;
    cursor: pointer;
}
.mainTab .current{
    background-color: blue;
    color: white;
    border-radius: 20px;
}

.infoBox{
    width:auto;
    height: 300px;
    border:1px solid black;
    margin: 0 20%;
    margin-bottom: 10%;
    padding: 5%;
}

.infoBox .PersonalInfo{
    font-size: 30px;
}

form #edit{
    width:100px;
    height:40px;
    font-size: 20px;
}

h2{
    text-align: center;
}

table{
    border-collapse: collapse;
    margin:20px auto;
    padding:30px;
}
tr:nth-child(even){
    background-color:lightgrey;
}

table td,
table th{
    text-align: center;
    padding:20px;
}

#remove{
    height:30px;
    width:80px;
}

#remove:hover{
    background-color:red;
    color:white;
    border:none;
    cursor: pointer;
}
 footer{
    background-color: #063970;
    min-height: 50px;
    text-align: center;
    width:100%;
    
 }
 .icon{
    width: 50px;
    height: 50px;
    margin:30px 60px;
    display: inline-block;
    border-radius: 10px;
 }
 

 .clr{
    clear:both;
 }
 </style>
</head>
<body>
<?php require_once 'header.php'?>
    
    <div class="clr"></div>

    <div class="container">
        <h1>Account Infomation  </h1>
            <div class="mainTab">
                    <ul>
                        <li class="current">Account Info</li>
                        <li>Order History</li>
                        <!-- <li>Payment</li> -->
                    </ul>
            </div>
            <div class="infoBox">
                <div id="item" style="display:block; text-align:center;" >
                <div class="PersonalInfo">
                    <label for="username" >Username: </label> <span id="text1"><?php echo $_SESSION['UserName'];?></span> 
                    <br>
                    <br>
                    <label for="password">Password: <span id="text2"><?php echo $data['userPassword'];?></label></span>
                    <br>
                    <br>
                    <label for="email">Email: <span id="text3"><?php echo $data['userEmail'];?></label></span>
                    <br>
                    <br>
                    <form method="POST"><input type="submit" name ="edit" value="Edit" id="edit" ></form>
                </div>   
                </div>
        
                <div id="item" style="display:none">
                <h2>Your order details as below:</h2><br>
                
                <table border='1'>
                    <tr>
                        <th>OrdeID</th><th>Order Details</th><th>TotalPrice</th>
                    </tr>
                    <?php foreach($result as $oneOrder){;?>
                    <tr>
                        <td><?php echo $oneOrder['orderId'];?></td>
                        <td><?php echo $oneOrder['description'];?></td>
                        <td><?php echo $oneOrder['totalPrice'];?></td>
                    </tr>
                    <?php };?>
                </table>
                
                </div>

                <div id="item" style="display:none"> This is your payment info.</div>

                <div id="item" style="display:none"> This is your address.</div>
            </div>    
    </div>

        
  
    <footer>
        <i><a href="https://www.google.com/account/about/"><img src="./media/socialMedia/googlePlus.jpg" alt="google" class="icon"></a></i>
        <i><a href="https://www.facebook.com/"><img src="./media/socialMedia/facebook.png" alt="facebook" class="icon"></a></i>
        <i><a href="https://www.instagram.com/"><img src="./media/socialMedia/instagram.png" alt="instagram" class="icon"></a></i>
        <i><a href="https://www.skype.com/"><img src="./media/socialMedia/skype.png" alt="skype" class="icon"></a></i>
    </footer>
       
</body>
<script>
    var myli = document.querySelectorAll('.navbar li');
    var myul = document.querySelector('ul');
    myli[0].style.borderStyle = 'none';
    myli[0].style.backgroundColor = 'transparent';
    myli[1].style.display = 'none';
    myli[2].style.display = 'none';
    myli[3].style.display = 'none';

    myul.onmouseover = function(){
        myli[0].style.backgroundColor = 'transparent';
        myli[1].style.display = 'block';
        myli[2].style.display = 'block';
        myli[3].style.display = 'block';
    }

    myul.onmouseout = function(){
        myli[1].style.display = 'none';
        myli[2].style.display = 'none';
        myli[3].style.display = 'none';
    }


    var mainTab = document.querySelector('.mainTab');
    var lis = mainTab.querySelectorAll('li');
    var items = document.querySelectorAll('#item');
    
    for(let i = 0; i < lis.length; i++){
        lis[i].setAttribute('index', i); //set index number for each li.
        console.log(lis[i]);

        lis[i].onclick = function(){
            //1. get red background color when hover tab menu.
            //clean others first.
            for(let i=0; i<lis.length; i++){
                lis[i].className = '';
            }
            //get the clicked element.
            lis[i].className = 'current';

            //2. display the content for each block.
            var index = lis[i].getAttribute('index');
            //console.log(index);

            //clean others, only select what we clicked
            for(let i=0; i<items.length; i++){
                items[i].style.display = 'none';
            }
            items[index].style.display = 'block';
            
        }
    }
    <?php
    if(isset($_GET['pageNum'])){

        $pageNum=$_GET['pageNum'];
    
    
    ?>
    console.log(items[<?PHP ECHO $pageNum ?>]);
    for(let i=0; i<items.length; i++){
        items[i].style.display = 'none';
    }
            
    lis[0].className = '';

    lis[<?PHP ECHO $pageNum ?>].className = 'current';
    items[<?PHP ECHO $pageNum ?>].style.display = 'block';

    <?php }?>




</script>
</html>
