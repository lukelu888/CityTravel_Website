<?php 
// we are transferring to using OOP class instead of query database directly 
class User{
    
    private $userId;
    private $userName;
    private $password;
    private $email;
    
    
    public function __construct($userId=null,$userName=null,$password=null,$email=null) {
        $this->userId=$userId;
        $this->userName=$userName;
        $this->password=$password;
        $this->email=$email;
    }
    
    
    public function getUserId()
    {
        return $this->userId;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

   
    
}


?>