<?php

  class Pages extends Controller{

    public function __construct(){
        //echo "| Constructor Pages |";
        //$this->articuloModel = $this->model('Articulo');
    }

    public function index(){

      //$articulos = $this->articuloModel->obtenerArticulos();
      //echo "sino se le pasa parametros entra al metodo index por defecto";
      //$this->view('pages/start');
      //$array = array('clave'=>valor); --formato de php < 5.4 y php >=5.4 será $array =['clave'=>valor];
      $data = array(
        'titulo' =>'Bienvenidos a MVC',
        'articulos' => $articulos
      );

      $this->view('pages/start',$data);
    }

    /*
    public function articulo(){
      echo "Entro al metodo de articulos";
      $this->view('pages/start');
    }

    //sino se le pasa el parametro, devuelve una advertencia
    public function actualizar($cod){
        echo $cod;
    }*/

  }

?>
