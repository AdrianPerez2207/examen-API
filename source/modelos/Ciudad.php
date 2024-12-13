<?php

    namespace Examen\modelos;

    class Ciudad{

        private $id;
        private $nombre;
        private $pais;
        private $latitud;
        private $longitud;

        /**
         * @param $id
         * @param $nombre
         * @param $pais
         * @param $latitud
         * @param $longitud
         */
        public function __construct($id, $nombre, $pais, $latitud, $longitud)
        {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->pais = $pais;
            $this->latitud = $latitud;
            $this->longitud = $longitud;
        }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getNombre()
        {
            return $this->nombre;
        }

        /**
         * @param mixed $nombre
         */
        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }

        /**
         * @return mixed
         */
        public function getPais()
        {
            return $this->pais;
        }

        /**
         * @param mixed $pais
         */
        public function setPais($pais)
        {
            $this->pais = $pais;
        }

        /**
         * @return mixed
         */
        public function getLatitud()
        {
            return $this->latitud;
        }

        /**
         * @param mixed $latitud
         */
        public function setLatitud($latitud)
        {
            $this->latitud = $latitud;
        }

        /**
         * @return mixed
         */
        public function getLongitud()
        {
            return $this->longitud;
        }

        /**
         * @param mixed $longitud
         */
        public function setLongitud($longitud)
        {
            $this->longitud = $longitud;
        }




    }