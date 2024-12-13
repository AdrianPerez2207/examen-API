<?php

    namespace Examen\vistas;

    class VistaNuevaCiudad{

        public static function renderNuevaCiudad() {

            include("cabecera.php");
            ?>
            <main class="p-3">
                <form class="w-25 p-5 mb-5 bg-light rounded-3 m-auto d-grid gap-3" action="index.php" method="post">
                    <div class="form-floating">
                        <input name="nombreCiudad" type="text" class="form-control">
                        <label for="floatingInput">Nombre Ciudad</label>
                    </div>
                    <div class="form-floating">
                        <div class="form-floating">
                            <input name="pais" type="text" class="form-control">
                            <label for="floatingInput">País</label>
                        </div>
                    </div>
                    <div class="form-floating">
                        <div class="form-floating">
                            <input name="latitud" type="text" class="form-control">
                            <label for="floatingInput">Latitud</label>
                        </div>
                    </div>
                    <div class="form-floating">
                        <div class="form-floating">
                            <input name="longitud" type="text" class="form-control">
                            <label for="floatingInput">Longitud</label>
                        </div>
                    </div>
                    <button class="btn btn-primary w-100 py-2" type="submit" name="insertar">Añadir</button>
                </form>
            </main>
            <?php
            include('pie.php');
        }
    }
?>

    }