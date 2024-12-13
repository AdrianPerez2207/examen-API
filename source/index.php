<?php

    namespace Examen;

    use Examen\controladores\ControladorCiudades;

    session_start();
    /**
     * AUTOLOAD
     */
    spl_autoload_register(function ($class) {
        //echo $class."<br>";
        //echo substr($class, strpos($class,"\\")+1);
        $ruta = substr($class, strpos($class,"\\")+1);
        $ruta = str_replace("\\", "/", $ruta);
        include_once "./" . $ruta . ".php";
    });

    //Tratamiento de botones, links
    if (isset($_REQUEST["accion"])) {
        if ($_REQUEST["accion"] == "aniadirCiudad") {
            ControladorCiudades::renderNuevaCiudad();
        }
        if ($_REQUEST["accion"] == "verMisCiudades") {
            ControladorCiudades::mostrarCiudades();
        }
        if ($_REQUEST["accion"] == "eliminarCiudad") {
            ControladorCiudades::eliminarCiudad($_REQUEST["id"]);
        }
        if ($_REQUEST["accion"] == "renderCiudades") {
            ControladorCiudades::renderCiudades();
        }
        if ($_REQUEST["accion"] == "ciudadAPI") {
            ControladorCiudades::insertarCiudad($_REQUEST["nombre"], $_REQUEST["pais"], $_REQUEST["latitud"], $_REQUEST["longitud"]);
        }
        if ($_REQUEST["accion"] == "renderWeather") {
            ControladorCiudades::renderWeather();
        }
    } else if ($_POST != null) {
        if (isset($_POST["insertar"])) {
            ControladorCiudades::insertarCiudad($_REQUEST["nombreCiudad"], $_REQUEST["pais"], $_REQUEST["latitud"], $_REQUEST["longitud"]);
        }
    } else {
        //Página de inicio
        ControladorCiudades::mostrarCiudades();
    }

