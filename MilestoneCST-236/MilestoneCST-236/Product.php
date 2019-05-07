<?php
class Product {
    private $id;
    private $product_name;
    private $product_description;
    private $product_picture;
    private $product_price;
    
    public function __construct($id, $pn, $pd, $pp, $ppr) {
        $this->id = $id;
        $this->product_name = $pn;
        $this->product_description = $pd;
        $this->product_picture = $pp;
        $this->product_price = $ppr;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getProduct_name()
    {
        return $this->product_name;
    }


    /**
     * @param mixed $product_name
     */
    public function setProduct_name($product_name)
    {
        $this->product_name = $product_name;
    }
    /**
     * @return mixed
     */
    public function getProduct_picture()
    {
        return $this->product_picture;
    }

    /**
     * @param mixed $product_picture
     */
    public function setProduct_picture($product_picture)
    {
        $this->product_picture = $product_picture;
    }
    /**
     * @return mixed
     */
    public function getProduct_description()
    {
        return $this->product_description;
    }

    /**
     * @return mixed
     */
    public function getProduct_price()
    {
        return $this->product_price;
    }

    /**
     * @param mixed $product_description
     */
    public function setProduct_description($product_description)
    {
        $this->product_description = $product_description;
    }

    /**
     * @param mixed $product_price
     */
    public function setProduct_price($product_price)
    {
        $this->product_price = $product_price;
    }




}