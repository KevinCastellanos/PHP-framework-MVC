<?php

    //Mapear la url ingresada en el navegador
    //1- controlador
    //2- método
    //3- parámetro
    //Ejemplo: /articulos/actualizar/4
    class Core{
        protected $controladorActual = 'Pages';
        protected $metodoActual = 'index';
        protected $parametros = array();

        //constructor
        public function __construct(){
          //print_r($this->getUrl());
          $url = $this->getUrl();


          //echo '../app/controllers/Pages'.ucwords($url[0]).'.php';
          //buscar en controller si el controlador existe-----------------------
          if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
            //si existe se setea o configura como controlador por defecto
            //echo  son para probar el paso de parametros
            //echo "Controlador->".ucwords($url[0])."|";

            $this->controladorActual = ucwords($url[0]);

            //unset indice cero
            unset($url[0]);

          }
          //requerir el controlador
          require_once '../app/controllers/'.$this->controladorActual.'.php';
          //echo $this->controladorActual;
          $this->controladorActual = new $this->controladorActual;

          //chequear la segunda parte del url que seria el $metodo--------------
          if(isset($url[1])){

            if( method_exists($this->controladorActual, $url[1]) ){
              //chequeamos el metodo
              $this->metodoActual = $url[1];
              unset($url[1]);
            }

          }
          //sino existe el metodo en el controlador extrae el metodo por
          //defecto que es el index
          //echo  son para probar el paso de parametros
          //echo "metodo->".$this->metodoActual."|";

          //obtener los parametros----------------------------------------------
          $this->parametros = $url ? array_values($url) : array();

          //llamar callback con parametros array
          call_user_func_array(array($this->controladorActual,$this->metodoActual),$this->parametros);

        }

        public function getUrl(){
          //echo $_GET['url'];

          //verificamos que este seteada la url
          if(isset($_GET['url'])){
            //rtrim es para cortar la cadena de espacios en blanco a la derecha
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            return $url;
          }else{

          }
        }
    }


?>
