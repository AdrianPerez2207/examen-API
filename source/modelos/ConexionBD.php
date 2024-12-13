<?php

    namespace Examen\modelos;

    require_once './vendor/autoload.php';

    use Exception;
    use MongoDB\Client;

    class ConexionBD{
        private $conexion;

        public function __construct(){
            $host = 'mongodb://root:toor@mongodb_api_examen:27017'; //MongoDB en docker
            try {
                $this->conexion = (new Client($host))->selectDatabase('gestion');
            } catch (Exception $e){
                echo $e->getMessage();
            }
        }

        /**
         * Get the value of conexion
         */
        public function getConexion(){
            return $this->conexion;
        }

        public function cerrarSesion(){
            $this->conexion = null;
        }
    }
