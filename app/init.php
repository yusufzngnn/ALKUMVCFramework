<?php
require_once 'config/config.php';
require_once 'helpers/helpers.php';



// Autoload Core Libraries
spl_autoload_register(function($className){
    $directories = ['libraries'];
    $parts = explode('\\', $className);
    $className = array_pop($parts);
    $nameSpacePath = implode(DIRECTORY_SEPARATOR, $parts);

    foreach ($directories as $directory)
    {
        $filePath = __DIR__ . "/$directory/" . ($nameSpacePath ? $nameSpacePath . '/' : '') . "$className.php";

        if(file_exists($filePath))
        {
            require_once $filePath;
            return;
        }
    }

    trigger_error("'$filePath' not found", E_USER_ERROR);

});