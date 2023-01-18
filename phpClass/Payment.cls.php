<?php 
// we are transferring to use OOP class instead of query database directly 
class Payment{
    
    private $paymentId;
    private $cardNumber;
    private $CVC;
    private $holderName;
    private $expiryDate;

    private $address;
    private $userId;
    
    
    public function __construct($paymentId=null,$cardNumber=null,$CVC=null,$holderName=null,$expiryDate=null,$address=null,$userId=null) {
        $this->paymentId=$paymentId;
        $this->cardNumber=$cardNumber;
        $this->CVC=$CVC;
        $this->holderName=$holderName;
        $this->expiryDate=$expiryDate;
        $this->address=$address;
        $this->userId=$userId;
     
    }


    public function getPaymentId()
    {
        return $this->paymentId;
    }
    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;
    }

   
    
}


?>