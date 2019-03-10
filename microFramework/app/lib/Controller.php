<?php
    //clase controlador principal
    //se encargara de cargar los modelos y vistas
    class Controller{

      //cargar modelos
      public function model( $model ){
        require_once '../app/models/'.$model.'.php';
        //instanciar el modelo
        return new $model();
      }

      //cargar vistas
      public function view( $view , $data = array()){

        //chequear si el archivo vista existe
        if(file_exists('../app/views/'.$view.'.php')){
            require_once '../app/views/'.$view.'.php';
        }else{
            //si el archivo no existe devolver una advertencia
            die('La vista no existe');

        }
      }


    }

?>
