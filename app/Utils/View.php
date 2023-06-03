<?php

namespace App\Utils;

class View {
    /**
     * Default variable
     */
    private static $vars = [];

    /**
     * Method responsable to define the initial data of that class
     */
    public static function init($vars = []) {
        self::$vars = $vars;
    }
    /** 
     * Metod responsable to return content of view
     * @param string $view
     * @return string 
     */
    private static function getContentView($view) {
        $file = __DIR__.'/../../resources/view/'.$view.'.html';
        return file_exists($file) ? file_get_contents($file) : '';
    }


    /**
     * Metod responsable to return the render content of view
     * @param string $view
     * @param array $vars (string/numeric)
     * @return string
     */
    public static function render($view, $vars = []) {
        //content of view
        $contentView = self::getContentView($view);

        //Merge Vars of View
        $vars = array_merge(self::$vars, $vars);

        $keys = array_keys($vars);
        $keys = array_map(function($item){
            return '{{'.$item.'}}';
        }, $keys);

        //return the render content
        return str_replace($keys, array_values($vars), $contentView);
    }
}