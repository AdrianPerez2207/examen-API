<?php

namespace Examen\controladores;

use Examen\modelos\Ciudad;
use Examen\modelos\ModeloCiudades;
use Examen\vistas\VistaCiudades;
use Examen\vistas\VistaNuevaCiudad;

class ControladorCiudades
{

    public static function mostrarCiudades(){
        $ciudades = ModeloCiudades::mostrarCiudades();
        VistaCiudades::renderCiudades($ciudades);
    }

    public static function renderNuevaCiudad(){
        VistaNuevaCiudad::renderNuevaCiudad();
    }

    public static function insertarCiudad($nombreCiudad, $pais, $latitud, $longitud){
        $ciudad = new Ciudad(0, $nombreCiudad, $pais, $latitud, $longitud);
        ModeloCiudades::insertarCiudad($ciudad);
        header("Location: index.php?accion=verMisCiudades");
    }

    public static function eliminarCiudad($id){
        ModeloCiudades::eliminarCiudad($id);
        header("Location: index.php?accion=verMisCiudades");
    }

    public static function renderCiudades(){
        VistaCiudades::render();
    }

    public static function renderWeather(){
        $ciudades = ModeloCiudades::mostrarCiudades();
        VistaCiudades::renderWeather($ciudades);
    }
}