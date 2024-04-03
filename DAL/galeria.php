<?php
require_once 'conexion.php';

function ObtenerTodaGaleria(){
    try {
        $oConexion = Conecta();

        // formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")){

            if(!$result = mysqli_query($oConexion, "SELECT COD_DISENO, NOM_DISENO, DES_DISENO, RUTA_IMAGEN, TIPO_DISENO FROM TAB_GALERIA")) die();  
            $retorno = array();

            while ($row = mysqli_fetch_array($result)) {
                $retorno[] = $row;
            }
        }

    } catch (\Throwable $th) {
        error_log($th);
        echo "<script>
                Swal.fire({
                    title: 'Error al obtener diseños',
                    text: 'Ha ocurrido un error al obtener todos los diseños: " . $th->getMessage() . "',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
            </script>";
    }finally{
        Desconectar($oConexion);
    }

    return $retorno;
}

function FiltrarProductos($nombre = null, $tipo = null) {
    try {
        $oConexion = Conecta();

        if(mysqli_set_charset($oConexion, "utf8")) {
            $query = "SELECT * FROM TAB_GALERIA WHERE 1=1";
            if ($nombre !== null) {
                $query .= " AND NOM_DISENO LIKE '%$nombre%'";
            }
            if ($tipo !== null && $tipo !== 'T') {
                $query .= " AND TIPO_DISENO = '$tipo'";
            }
            $result = mysqli_query($oConexion, $query);
            $productos = [];
            while ($row = mysqli_fetch_array($result)) {
                $productos[] = $row;
            }
            return $productos;
        }
    } catch (\Throwable $th) {
        error_log($th);
        // Manejo de errores
    } finally {
        Desconectar($oConexion);
    }
    return [];
}
