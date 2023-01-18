<?php 
session_start();
require_once 'dbconfig.php';
try{
    $sql = "SELECT * from product";
    $prepare = $connection->prepare($sql);
    $prepare->execute();
    $result=$prepare->fetchAll();

}catch(PDOException $e){
    echo $e->getMessage();
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
    width: auto;
    min-height: 100px;
}
#logo{
   margin:0 20px 0 20px;
   width: 300px;
   height:100px;
}
.logo{
    width:65%;
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
}

.navbar li:hover{
    background-color: lightgray;
    
}


#bannerImg{
    width:100%;
    position: sticky; 
    z-index: -1;
    height:auto;
}

.container h1{
    font-size: 50px;
    color:mediumblue;
    background: -webkit-linear-gradient(#05abe5, #00d4ff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

section{
    width:100%;
    height: 100%;
    min-height:12.5em;
    text-align: center;
 }



 section p{
    font-size:40px;
    color:dodgerblue;
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

 form{
    
    box-sizing: border-box;
    padding:100px;
    font-size: 40px;
    color:aliceblue;
    font-weight: bold;
    text-align: left;
    width:600px;
    margin:auto;
   
 }
 form input{
    box-sizing: border-box;
    width:100%;
    margin:0 auto;
    margin-bottom: 30px;
    padding:10px;
    border-radius: 10px;
    font-size:30px;
 }
 #submit{
    background-image: linear-gradient(to right, #6A5ACD 0%, #1E90FF 51%, #1E90FF 100%);
    color:white;
    font-weight: bold;
    font-size: 35px;
    transition: 0.5s;
    height:110px;
    width:500px;
    border:none;
    border-radius:20px;
    margin:10px auto;
 }

 #submit:hover{
    cursor: pointer;
    color:black;
    background-position: right center;
 }

 .slideshow-container{
    text-align:center;
 }

 .mySlides{
    display:none;
    margin:auto;
 }

 .display-left, 
 .display-right{
    width: 100px;
    height: 100px;
    position:relative;
    top:-800px;
    background-color: gray;
    color:white;
 }

 .display-right{
    float:right;
 }
 .display-left:hover, 
 .display-right:hover{
    background-color:lightgrey;
    cursor: pointer;
 }

 .sidebox1{
    display:grid;
    grid-template-columns: repeat(3, 1fr);
    grid-column-gap:10px;
    margin:20px;
    text-align:center;
 }
.sidebox1 #box{
    border:1px solid black;
    padding:10px;

}
.sidebox1 p{
   font-size:30px;
   font-weight:bold;
}

.sidebox1 img{
    border-radius:20px;
}

.adv{
    text-align:center;
}

.adv img{
    width:1100px;
}
</style>
</head>
<body>
   <?php require_once 'header.php'?>
    
    <div class="banner">
    <img src="./media/background/mianbackground.png" alt="bannerImg" id="bannerImg">
    </div>
    <br><br><br>
    <section>
        <div class="container">
            <h1>We inspire, you create and we deliver. At CityTrip, you are the creator of your getaway. </h1> 
        </div>
  
        <form class="searchBar" action="Search.php" method="GET">
            <input type="submit" id="submit" value="Go to Shopping">
        </form>
 
    </section>

    <div class="sidebox1">
        <div id="box">
            <img src="./media/gallery/box1.avif" alt="">
            <br><br><br><br>
            <p>Members save 20% or more on warm winter getaways</p>
        </div>
        <div id="box">
            <img src="./media/gallery/box2.avif" alt="" height="625px" width="500px">
            <br><br><br><br>
            <p>Make that family reunion finally happen this year</p>
        </div>
        <div id="box">
            <img src="./media/gallery/box3.avif" alt="">
            <br><br><br><br>
            <p>Save with Member Prices at your favourite ski destinations</p>
        </div>
    </div>
    <br><br>
    <div class="adv">
        <img src="./media/gallery/ads.jpg" alt="">
    </div>

    <footer>
        <i><a href="https://www.google.com/account/about/"><img src="./media/socialMedia/googlePlus.jpg" alt="google" class="icon"></a></i>
        <i><a href="https://www.facebook.com/"><img src="./media/socialMedia/facebook.png" alt="facebook" class="icon"></a></i>
        <i><a href="https://www.instagram.com/"><img src="./media/socialMedia/instagram.png" alt="instagram" class="icon"></a></i>
        <i><a href="https://www.skype.com/"><img src="./media/socialMedia/skype.png" alt="skype" class="icon"></a></i>
    </footer>
       
</body>
<script>
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




</script>
</html>