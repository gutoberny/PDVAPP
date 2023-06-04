<?php

namespace App\Model\Entity;

use \WilliamCosta\DatabaseManager\Database;

class Products {
    /**
     * ID product
     */
    public $idProduct;

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
     * Price product
     */
    public $taxes;

    /**
     * Method responsable to get products
     * @param string $where
     * @param string $order
     * @param string $limit
     * @param string $fields
     * @return PDOStatement
     */
    public static function getProducts($where = null, $order = null, $limit = null, $fields = '*') {
        return (new Database('products'))->select($where,$order,$limit,$fields);
    }


}