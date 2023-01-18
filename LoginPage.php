<?php
require_once 'dbconfig.php';
session_start();
$userName="";
$password = "";
if (isset($_SESSION['userName'])) {
    $userName=$_SESSION['userName'];
    $password=$_SESSION['userPassword'];
} 

try {

    if (isset($_POST['submit'])) {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $userName = $_POST['username'];
            $password = $_POST['password'];

            $sql = "select * from users where userName = :username and userPassword = :password";
            $s = $connection->prepare($sql);
            $s->bindParam(':username', $userName);
            $s->bindParam(':password', $password);
            $s->execute();
            $res = $s->fetchAll();
           
            if (!empty($res)) {
                $_SESSION['UserName'] = $userName;
                $_SESSION['userId'] = $res[0]['userId'];
                echo '<script>
                        alert("Welcome to Travel City!");
                        window.location.href = "WelcomePage.php";
                    </script>';

               
            } else {
                echo '<script>alert("Invalid account information!")</script>';
            }
        }
    }
} catch (PDOException $exception) {
    echo $exception->getMessage();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>City Trip - Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;

        }

        header {
            background-color: #063970;
            padding: 40px;
            min-height: 100px;
        }

        #logo {
            margin: 0 20px 0 20px;
            width: 300px;
            height: 100px;
        }

        .navbar {
            float: right;
        }

        .navbar ul {
            list-style: none;
            margin: 40px 20px 0 0;
            text-decoration: none;
        }

        .navbar li {
            display: inline-block;
            font-size: 30px;
            padding-left: 50px;
        }

        .navbar li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            padding: 15px;
        }

        .navbar li a:hover {
            background-color: gray;
            border-radius: 15px;

        }


        section {
            background-image: url(./media/background/background.jpg);
            background-size: 100%;
            width: 100%;
            min-height: 600px;
            text-align: center;
        }

        section h1 {
            font-size: 80px;
            padding: 40px;
            color: white;
            font-weight: bold;

        }

        section a {
            color: black;
            font-weight: bold;
        }

        .btn {
            width: 30%;
            margin: 0 auto;
            background-color: peru;
            display: block;
            border-radius: 20px;
            color: white;
            font-weight: bold;
            font-size: 20px;
            text-decoration: none;
            padding: 20px;

        }

        .btn:hover {
            background-color: red;
        }

        footer {
            background-color: #063970;
            min-height: 100px;

            text-align: center;
        }

        .icon {
            width: 50px;
            height: 50px;
            margin: 30px 60px;
            display: inline-block;
            border-radius: 10px;
        }

        form {

            box-sizing: border-box;
            padding: 30px;
            font-size: 40px;
            color: aliceblue;
            font-weight: bold;
            text-align: left;
            width: 600px;
            margin: auto;

        }

        form input {
            box-sizing: border-box;
            width: 100%;
            margin: 0 auto;
            margin-bottom: 30px;
            padding: 10px;
            border-radius: 10px;
            font-size: 30px;
        }

        #submit {
            background-color: aqua;
            color: aliceblue;
            font-weight: bold;
            font-size: 30px;
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
                <li><a href="Registration.php">Register</a></li>
                <li><a href="LoginPage.php">Login</a></li>
            </ul>
        </div>
    </header>


    <section>
        <form action="LoginPage.php" method="post">
            <label for="username">Username</label>
            <br>
            <input type="text" name="username" id="username" value=<?=$userName?>>
            <br>
            <label for="password">Password</label>
            <br>
            <input type="password" name="password" id="password" value=<?=$password?>>
            <br>
            <input type="submit" name="submit" value="Login" id="submit">
        </form>
        <a href="Registration.php" class="btn">Don't have account yet? Register Now!</a>
    </section>



    <footer>
        <i><a href="https://www.google.com/account/about/"><img src="./media/socialMedia/googlePlus.jpg" alt="google" class="icon"></a></i>
        <i><a href="https://www.facebook.com/"><img src="./media/socialMedia/facebook.png" alt="facebook" class="icon"></a></i>
        <i><a href="https://www.instagram.com/"><img src="./media/socialMedia/instagram.png" alt="instagram" class="icon"></a></i>
        <i><a href="https://www.skype.com/"><img src="./media/socialMedia/skype.png" alt="skype" class="icon"></a></i>
    </footer>

</body>

</html>