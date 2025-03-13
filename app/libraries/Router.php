<?php


class Router
{
    private static $prefix='';
    private static $layout='';
    private static $found=false;
    public static function group($prefix, $callback) : void
    {
        $previousPrefix=self::$prefix;
        self::$prefix=trim($previousPrefix . '/') . '/' . trim($prefix, '/');
        $callback();
        self::$prefix=$previousPrefix;
    }

    public static function layout($layout, $callback) : void
    {
        $previousLayout=self::$layout;
        self::$layout=$layout;
        $callback();
        self::$layout=$previousLayout;
    }

    public static function middleware($middleware, $callback, ...$params) : void
    {
        if($middleware)
        {
            $middleware::handle(...$params);
            $callback();
        }
    }

    public static function get($url, $callback) : void
    {
        if($_SERVER['REQUEST_METHOD'] === 'GET')
        {
            $fullUrl = trim(self::$prefix, '/') . '/' . trim($url, '/');
            if(trim($fullUrl, '/') === self::sanitizeUrl($_GET['url'] ?? ''))
            {
                self::$found=true;
                if(self::$layout)
                {
                    View::renderLayout(self::$layout, $callback);
                }else{
                    $callback();
                }
            }
        }
    }
    public static function post($url, $callback) : void
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $fullUrl = trim(self::$prefix, '/') . '/' . trim($url, '/');
            if(trim($fullUrl, '/') === self::sanitizeUrl($_GET['url'] ?? ''))
            {
                self::$found=true;
                if(self::$layout)
                {
                    View::renderLayout(self::$layout, $callback);
                }else{
                    $callback();
                }
            }
        }
    }
    public static function put($url, $callback) : void
    {
        if($_SERVER['REQUEST_METHOD'] === 'PUT')
        {
            $fullUrl = trim(self::$prefix, '/') . '/' . trim($url, '/');
            if(trim($fullUrl, '/') === self::sanitizeUrl($_GET['url'] ?? ''))
            {
                self::$found=true;
                if(self::$layout)
                {
                    View::renderLayout(self::$layout, $callback);
                }else{
                    $callback();
                }
            }
        }
    }
    public static function delete($url, $callback) : void
    {
        if($_SERVER['REQUEST_METHOD'] === 'DELETE')
        {
            $fullUrl = trim(self::$prefix, '/') . '/' . trim($url, '/');
            if(trim($fullUrl, '/') === self::sanitizeUrl($_GET['url'] ?? ''))
            {
                self::$found=true;
                if(self::$layout)
                {
                    View::renderLayout(self::$layout, $callback);
                }else{
                    $callback();
                }
            }
        }
    }
    public static function notFound($callback) : void
    {
        if(!self::$found)
        {
            http_response_code(404);
            $callback();
        }
    }
    private static function sanitizeUrl($url) : string
    {
        return filter_var($url, FILTER_SANITIZE_URL);
    }
    public static function getPrefix()
    {
    return self::$prefix;
    }
}