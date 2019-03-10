<?php
    //configuración de acceso a la base de datos
    //credenciales de acceso
    define('DB_HOST','host de la base de datos');
    define('DB_USER','usuario');
    define('DB_PASS','password');
    define('DB_DATABASE','nombre de la base de datos');

    //ruta de la aplicación
    //define para crear constantes y __FILE__ estraer ruta completa
    //ruta padre app
    //se definiran constantes con mayusculas
    ///home/content/66/10937666/html/drivermetric/framework/app
    define ('ROUT_APP', dirname(dirname(__FILE__)));

    //Ruta url http://drivermetric.elsalvadoraps.com/framework/
    define ('ROUT_URL','http://drivermetric.elsalvadoraps.com/framework/');

    //nombre del sitio web
      define('NAMESITE','_NOM_SITIO');

?>
