<?php
$host = "127.0.0.1";
$user = "root";
$pass = "";
$dbname = "travelcity";


try{
    $connection = new PDO("mysql:host = $host; dbname=$dbname", $user, $pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}catch (PDOException $exception){
    echo $exception->getMessage();
}





?>
