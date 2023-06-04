<?php

namespace App\Controller\Pages;

use \App\Utils\View;

class Products extends Page{
    /**
     * Metod responsable to return Products 
     */
    public static function getProducts() {

        $content = View::render('pages/products', [
        ]);

        return parent::getPage('Products > GbernyPDv', $content);
    }

}