<?php
    //clase para conectarse a l base de datos y ejecutar consultas PDO
    //razones
    //mayor seguridad
    //conectarse a diferentes motores de base de datos
    //
    class Base{
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $database = DB_DATABASE;

        //database handler
        private $dbh;
        //statement
        private $stmt;
        //errores
        private $error;

        public function __construct(){
            //configurar la conexión
            $dsn = "mysql:host=".$this->host.";dbname=".$this->database;
            //opciones que se agregaran a la conexion mysql
            //PDO::ATTR_PERSISTENT - la conexion con pdo será persistente, optimizara los recursos del servidor

            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION
            );

            //creamos una instancia de PDO
            //lo insertamos en una excepcion
            try{
                $this->dbh = new PDO($dsn,$this->user,$this->pass,$options);
                //con la siguiente instrucción controlamos el return de caracteres extraños que no puede interpretar la db
                $this->dbh->exec('set names utf8');

            }catch(PDOException $e){
                $this->error = $e->getMessage();
                echo "Excepcion: ".$this->error;
            }
        }

        //funcion que recibe la consulta sql
        public function query($sql){
            $this->stmt = $this->dbh->prepare($sql);
        }

        //función que vinculará la sentencia sql
        public function bind($parameter,$value,$type=null){
            //verificamos si es null con la funcion de php
            if(is_null($type)){
                switch (true) {

                  case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                  case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                  case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                  default:
                    $type = PDO::PARAM_STR;
                    break;
                }
            }else{

            }
            $this->stmt->bindValue($parameter,$value,$type);
        }

        //funcion que ejecutara la sql
        public function execute(){
            return $this->stmt->execute();
        }

        //obtener todos los registros
        public function registros(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        //obtener ssolo 1 registro
        public function registro(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        //obtener cantidad de filas con el metodo row_count
        public function rowCount(){
            return $this->stmt->rowCount();
        }
    }
?>
