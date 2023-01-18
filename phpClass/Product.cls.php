<?php
// we are transferring to use OOP class instead of query database directly 
class Product{
    private $productID;
    private $description;
    private $price;
    private $photo;
    
    public function __construct($productID=null, $description=null, $price=null, $photo=null){
        $this->productID = $productID;
        $this->description = $description;
        $this->price = $price;
        $this->photo = $photo;
    }

    /**
     * @return string
     */
    public function getProductID()
    {
        return $this->productID;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }



    /**
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param string $productID
     */
    public function setProductID($productID)
    {
        $this->productID = $productID;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param string $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }



    /**
     * @param string $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }
    
    
    public function __toString(){
        $toString = "<ul>
                    <li>$this->productID</li>
                    <li>$this->description</li>
                    <li>$this->price</li>
                    <li>$this->photo</li>
                    </ul>";
        return $toString;
    }
    
    
    
    
    


}