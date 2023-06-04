<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\ProductNew as EntityProductNew;

class ProductNew extends Page{
    /**
     * Metod responsable to return Products 
     */
    public static function getProductNew() {

        $content = View::render('pages/productNew', [
        ]);
        
        return parent::getPage('New Product > GbernyPDv', $content);
    }

    /**
     * Metod responsable to Insert product
     */
    public static function insertProduct($request) {
        $postVars = $request->getPostVars();

        $obProduct              = new EntityProductNew();
        $obProduct->description = $postVars['description'];
        $obProduct->price       = $postVars['price'];
        $obProduct->taxes       = $postVars['taxes'];
        $obProduct->create();

        return Products::getProducts($request);
    }

}