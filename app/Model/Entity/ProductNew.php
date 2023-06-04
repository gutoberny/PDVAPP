<?php

namespace App\Model\Entity;

use \WilliamCosta\DatabaseManager\Database;

class ProductNew {
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
        //Define date
        $this->dthrInsert = date('Y-m-d H:i:s');
       
        $this->id = (new Database('products'))->insert([
            'description' => $this->description,
            'price'       => $this->price,
            'data'        => $this->dthrInsert
        ]);
        echo "<pre>";
        print_r($this);
        echo "<pre>"; 
        exit;

    }
}