<?php

namespace App\Model\Entity;

class Products {
    /**
     * ID product
     */
    public $id;

    /**
     * Date Time product
     */
    public $dthrInsert;

    /**
     * Description of product
     */
    public $description;

    /**
     * Price product
     */
    public $price;

    /**
     * Method responsable to insert a instance on database
     */
    public function create() {
       echo "<pre>";
       print_r($this);
       echo "<pre>"; 
       
    }
}