<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;

class Home extends Page{
    /**
     * Metod responsable to return home of project
     */
    public static function getHome() {
        $organization = new Organization();

        $content = View::render('pages/home', [
            'name' => $organization->name,
            'email' => $organization->email,
            'description' => $organization->description
        ]);

        return parent::getPage('GbernyPDv', $content);
    }

}