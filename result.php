<?php
session_start();
require_once 'dbconfig.php';
$total = $_COOKIE['total'];
$description = $_COOKIE['description'];



try{
    
    if (isset($_POST['placeOrder'])) {
        $cardNumber = $_POST['cardNumber'];
        $cardType = $_POST['cardType'];
        $CVC = $_POST['CVC'];
        $horderName = $_POST['nameOnCard'];
        $expiryDate = $_POST['expirationDate'];
        $address =$_POST['address'].",".$_POST['address2'].",".$_POST['city'].",".$_POST['province'].",".$_POST['country'].",".$_POST['postalCode'];
        

        // ADD PAYMENT METHOD TO PAYMENT TABLE
        $sql_payment = "INSERT INTO `payment`( `cardNumber`,`cardType`, `CVC`, `holderName`, `expiryDate`, `address`) VALUES ('$cardNumber','$cardType','$CVC','$horderName','$expiryDate','$address')";
        $connection->exec($sql_payment);
    


        //Find paymentId
        $sql_findPaymentId = "select paymentId from payment where cardNumber = '$cardNumber' and CVC='$CVC'";
        $s = $connection->prepare($sql_findPaymentId);
        $s->execute();
        $res = $s->fetchAll();

        if (!empty($res)) {
            $paymentId = $res[0]['paymentId'];
        }else{
            $paymentId = 0;
        }

    

        //get  USERID
        $userId = $_SESSION["userId"];
       
        
        $sql_order = "insert into `order` (description, totalPrice, paymentId,userId) values ('$description','$total', $paymentId,$userId)";
        $connection->exec($sql_order);
       
        header("location:AccountPage.php?pageNum=1");
            
            
        
    }
}catch(PDOException $exception){
    echo $exception->getMessage();
}
?>