<?php

namespace App\Controller\Pages;
use \App\Model\Entity\Products as EntityProducts;
use \WilliamCosta\DatabaseManager\Pagination;


use \App\Utils\View;

class Products extends Page{
    /**
     * Method to renderize products to page
     */
    private static function getProductsItens($request, &$obPagination) {
        $itens = '';

        $amountItens = EntityProducts::getProducts(null,null,null, 'COUNT(*) as amount')->fetchObject()->amount;
        
        $queryParams = $request->getQueryParams();
        $page = $queryParams['page'] ?? 1;

        $obPagination = new Pagination($amountItens, $page, 3);
        
        $results = (new EntityProducts())->getProducts(null, 'idProduct DESC', $obPagination->getLimit());

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
    public static function getProducts($request) {

        $content = View::render('pages/products', [
            'itens' => self::GetProductsItens($request, $obPagination),
            'pagination' => parent::getPagination($request,$obPagination)
        ]);

        return parent::getPage('Products > GbernyPDv', $content);
    }

}