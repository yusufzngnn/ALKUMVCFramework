<?php

class View
{
    public static function render($view, $pageTitle = 'ALKUMVC', $data = []) : void
    {
        extract($data);
        require_once './views/' . $view . '.php';
    }

    public static function renderError($code) : void
    {
        require './views/_errors/' . $code . '.php';
    }

    public static function renderLayout($layout, $callback) : void
    {
        ob_start();
        $callback();
        $content = ob_get_clean();
        require './views/_layouts/' . $layout . '.php';
    }

    public static function renderErrorLayout($layout, $code) : void
    {
        ob_start();
        self::renderError($code);
        $content = ob_get_clean();
        require './views/_layouts/' . $layout . '.php';
    }

    public static function renderJson($data) : void
    {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}