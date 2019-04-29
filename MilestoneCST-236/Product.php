<?php
class Product {
    private $id;
    private $product_name;
    private $product_picture;
    public function __construct($a, $b, $c) {
        $this->id = $a;
        $this->product_name = $b;
        $this->product_picture = $c;
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



}