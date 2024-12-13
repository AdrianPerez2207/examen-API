<?php

    namespace Examen\vistas;

    class VistaCiudades
    {

        public static function renderWeather($ciudades){
            include("cabecera.php");
            echo '
                <div class="container">
                  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    ';
            foreach ($ciudades as $ciudad) {
                echo "
                    <input type='hidden' id='latitud' value='{$ciudad->getLatitud()}'>
                    <input type='hidden' id='longitud' value='{$ciudad->getLongitud()}'>
                ";
                echo "
                    <div id='weather'>
                        <div class='col'>
                            <div class='card shadow-sm'>
                                <div class='card-body text-center'>
                                    <p class='card-text fw-bold'>{$ciudad->getNombre()}</p>
                                    <p class='card-text'>Predicción actual: </p>
                                    <p id='temperatura' class='card-text'></p>
                                    <p id='humedad' class='card-text'></p>
                                    <p id='precipitacion' class='card-text'></p>
                                    <hr>
                                    <p class='card-text'>Predicción para 3 días</p>
                                    <p id='tMaxima' class='card-text'>Temperatura máxima</p>
                                    <p id='tM1' class='card-text'></p>
                                    <p id='tM2' class='card-text'></p>
                                    <p id='tM3' class='card-text'></p>
                                    <p id='hMaxima' class='card-text'>Temperatura mínima</p>
                                    <p id='tm1' class='card-text'></p>
                                    <p id='tm2' class='card-text'></p>
                                    <p id='tm3' class='card-text'></p>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    ";
            }
            echo "
              </div>
            </div>
                    ";

            include("pie.php");
            /*echo "<script src='script.js'></script>";*/
        }
        public static function render()
        {
            include("cabecera.php");
            echo "<div class=' w-50 mx-auto col-12 col-lg-auto' role='search'>
                            <input type='search' class='form-control' placeholder='Buscar Ciudad...' aria-label='Search' name='nombreCiudad' id='nombreCiudad'>
                            <button class='btn btn-primary mt-2' type='button' name='buscarCiudad' id='buscar'>Buscar</button>
                    </div>";
            echo '<div id="principal"></div>';

            include("pie.php");
            /*echo "<script src='script.js'></script>";*/
        }

        public static function renderCiudades($ciudades)
        {
            include("cabecera.php");
            echo "
                <h2 class='text-center'>Mis Ciudades</h2>
                <div class='table-responsive small'>
                    <table class='table table-striped table-sm w-50 mx-auto text-center'>
                        <thead>
                            <tr>
                                <th scope='col'>Nombre</th>
                                <th scope='col'>País</th>
                                <th scope='col'>Latitud</th>
                                <th scope='col'>Longitud</th>
                                <th scope='col'>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
            ";
            foreach ($ciudades as $ciudad){
                echo "
                    <tr>
                        <td class='w-25 align-middle fw-bold'>{$ciudad->getNombre()}</td>
                        <td class='w-25 align-middle'>{$ciudad->getPais()}</td>
                        <td class='w-25 align-middle'>{$ciudad->getLatitud()}</td>
                        <td class='w-25 align-middle'>{$ciudad->getLongitud()}</td>
                        <td class='w-25 align-middle'>
                            <a href='index.php?accion=eliminarCiudad&id={$ciudad->getId()}'
                             type='button' class='btn btn-sm btn-danger'>Eliminar</a>
                        </td>
                    </tr>
                ";
            }
            echo "
                        </tbody>
                    </table>
                    <div class='w-50 mx-auto'>
                        <a href='index.php?accion=aniadirCiudad' type='button' class='btn btn-sm btn-success '>Añadir</a>
                        <a href='index.php?accion=renderCiudades' type='button' class='btn btn-sm btn-secondary'>Buscar ciudades</a>
                        <a id='metereologia' href='index.php?accion=renderWeather' type='button' class='btn btn-sm btn-secondary'>Metereología</a>
                    </div>
                </div>
            ";


            include("pie.php");
        }
    }
