<?php 
session_start();
require_once 'dbconfig.php';
$sql = $connection->query(" select * from users where userName = '".$_SESSION['UserName']."' ");
foreach($sql as $data);


if(isset($_POST['save'])){
    if(!empty($_POST['username'])&&!empty($_POST['password'])&&!empty($_POST['email'])){

        $id = $data['userId'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $sql = "update users set userName = ?, userPassword = ?,  userEmail = ? where userId = ? ";

        $stmt = $connection->prepare($sql);

        $result = $stmt->execute(array($username, $password, $email, $id));

        $_SESSION['UserName'] = $username;

        if($result){
            echo  '<script>alert("User credentials has been updated!")
          
            window.location.href = "AccountPage.php"</script>
            ';
            // window.location.href = "LoginPage.php"</script>
            
        }else{
            echo  '<script>alert("Error!")</script>';
        }
    }else{
        echo '<script>alert("Please enter your information to change!")</script>';
    }
}
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
    /* height: auto; */
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

form{
    font-size: 25px;
}

form #save{
    width:100px;
    height:40px;
    font-size: 20px;
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
    
    <header>
        <a href="#">
            <img src="./media/logo/logo.png" alt="logo" id="logo">
        </a>
        <div class="navbar">
            <ul>
                <li ><img src="./media/background/profile-user.png" alt="userImg"></li>
                <li style="font-weight: bold;"><a href="WelcomePage.php">Welcome <?php echo $_SESSION['UserName'];?></a></li>
                <li ><a href="AccountPage.php">Account</a></li>
                <li ><a href="Logout.php">Logout</a></li>
            </ul>
        </div> 
    </header>
    
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
                <form method="POST">
                <div id="item" style="display:block; text-align:center;" >
                    <label for="username">Username:

                    <input type="text" name="username" id="username" value="<?php echo $_SESSION['UserName'];?>">
                    
                    <br>
                    <br>
                    <label for="password">Password: <input type="text" name="password" id="password" value="<?php echo $data['userPassword'];?>">
                    <br>
                    <br>
                    <label for="email">Email: <input type="text" name="email" id="email" value="<?php echo $data['userEmail'];?>">
                    <br>
                    <br>
                    <input type="submit" name ="save" value="save" id="save" >
                </div>
                </form>
        
                <div id="item" style="display:none"> This is order history.</div>

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


</script>
</html>