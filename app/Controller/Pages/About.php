<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;

class About extends Page{
    /**
     * Metod responsable to return About of project
     */
    public static function getAbout() {
        $organization = new Organization();

        $content = View::render('pages/about', [
            'name' => $organization->name,
            'email' => $organization->email,
            'description' => $organization->description
        ]);

        return parent::getPage('About > GbernyPDv', $content);
    }

}