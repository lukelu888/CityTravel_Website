<?php 
// we are transferring to use OOP class instead of query database directly 
class Order{
    
    private $orderId;
    private $description;
    private $totalPrice;
    private $paymentId;
    private $userId;
    
    
    public function __construct($orderId=null,$description=null,$totalPrice=null,$paymentId=null,$userId=null) {
        $this->orderId=$orderId;
        $this->description=$description;
        $this->totalPrice=$totalPrice;
        $this->paymentId=$paymentId;
        $this->userId=$userId;
    }
    
    
    public function getOrderId()
    {
        return $this->orderId;
    }

    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

   
    
}


?>