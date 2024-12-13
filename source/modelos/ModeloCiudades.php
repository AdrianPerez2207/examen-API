<?php

namespace Examen\modelos;

use MongoDB\BSON\ObjectId;

class ModeloCiudades
{

    /**Buscamos todas las ciudades en la base de datos, cómo me devuelve un Json, paso cada una de ellas a una clase Ciudad.
     * @return array de Ciudades
     */
    public static function mostrarCiudades(){
        $conexion = new ConexionBD();
        $ciudadesJson = $conexion->getConexion()->ciudades->find();
        $ciudades = array();
        foreach ($ciudadesJson as $ciudad){
            $ciudades[] = new Ciudad($ciudad['_id'], $ciudad['nombre'], $ciudad['pais'], $ciudad['latitud'], $ciudad['longitud']);
        }
        $conexion->cerrarSesion();
        return $ciudades;
    }

    /**Añadimos una nueva ciudad.
     * Le pasamos un objeto ciudad, primero comprobamos que la ciudad no exista en la base de datos, si existe, termina la función.
     * Si no existe, insertamos la ciudad en la base de datos.
     * @param $ciudad
     * @return void
     */
    public static function insertarCiudad($ciudad){
        $conexion = new ConexionBD();
        $stmt = $conexion->getConexion()->ciudades->findOne(['nombre' => $ciudad->getNombre()]);
        if ($stmt == null){
            $conexion->getConexion()->ciudades->insertOne(['nombre' => $ciudad->getNombre(),
                'pais' => $ciudad->getPais(), 'latitud' => $ciudad->getLatitud(), 'longitud' => $ciudad->getLongitud()]);
        } else {
            $conexion->cerrarSesion();
        }
        $conexion->cerrarSesion();
    }

    /**Para eliminar una ciudad, recogemos el id, lo pasamos como new ObjectId($id) y lo eliminamos.
     * @param $id
     * @return void
     */
    public static function eliminarCiudad($id){
        $conexion = new ConexionBD();
        $conexion->getConexion()->ciudades->deleteOne(['_id' => new ObjectId($id)]);
        $conexion->cerrarSesion();
    }
}