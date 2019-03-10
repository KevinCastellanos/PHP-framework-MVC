<?php
    //echo "hola desde load.php";

    //Cargamos las librerias
    require_once 'config/config.php';

    //require_once 'lib/Base.php';
    //require_once 'lib/Controller.php';
    //require_once 'lib/Core.php';

    //funcion de php que nos servirá de autolad para no estar llamando en todo
    //los archivos, las librerias
    //la función php detecta las funciones y las importa para hacerlo automatico
    spl_autoload_register(function($class){
        require_once 'lib/'.$class.'.php';
    });
?>
