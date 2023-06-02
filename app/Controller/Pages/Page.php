<?php

namespace App\Controller\Pages;

use \App\Utils\View;

class Page {

    /**
     * Metod responsable to render header of page
     * @return string
     */
    private static function getHeader() {
        return View::render('pages/header');
    }

    /**
     * Metod responsable to render header of page
     * @return string
     */
    private static function getFooter() {
        return View::render('pages/footer');
    }

    /**
     * Metod responsable to return content (view) to generic page
     */
    public static function getPage($title, $content) {
        return View::render('pages/page', [
            'title' => $title,
            'header' => self::getHeader(),
            'footer' => self::getFooter(),
            'content' => $content
        ]);
    }

}