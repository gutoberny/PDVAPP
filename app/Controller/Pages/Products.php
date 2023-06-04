<?php

namespace App\Controller\Pages;
use \App\Model\Entity\Products as EntityProducts;


use \App\Utils\View;

class Products extends Page{
    /**
     * Method to renderize products to page
     */
    private static function getProductsItens() {
        $itens = '';

        $results = (new EntityProducts())->getProducts(null, 'idProduct DESC');

        while($obProducts = $results->fetchObject(EntityProducts::class)){
            $itens .= View::render('pages/products/item', [
                'description'   => $obProducts->description,
                'price'         => $obProducts->price,
                'taxes'         => $obProducts->taxes,
                'dthrInsert'    => date('d/m/Y H:m:s', strtotime($obProducts->dthrInsert))
            ]);

        }
        return $itens;
    }
    
    /**
     * Metod responsable to return Products 
     */
    public static function getProducts() {

        $content = View::render('pages/products', [
            'itens' => self::GetProductsItens()
        ]);

        return parent::getPage('Products > GbernyPDv', $content);
    }

}