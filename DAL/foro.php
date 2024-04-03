<?php
require_once "conexion.php";

function ObtenerComentariosForo(){
    try {
        $oConexion = Conecta();

        // formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")){

            $query = "SELECT f.CORREO, f.COD_COMENTARIO, f.COMENTARIO, CONCAT(u.NOMBRE, ' ', u.APELLIDO_1, ' ', u.APELLIDO_2) AS NOMBRE_COMPLETO 
                        FROM TAB_FORO f 
                        INNER JOIN TAB_USUARIOS u ON f.CORREO = u.CORREO";
            if(!$result = mysqli_query($oConexion, $query)) die();  
            $retorno = array();

            while ($row = mysqli_fetch_array($result)) {
                $retorno[] = $row;
            }
        }

    } catch (\Throwable $th) {
        error_log($th);
        echo "<script>
                Swal.fire({
                    title: 'Error al obtener comentarios del foro',
                    text: 'Ha ocurrido un error al obtener los comentarios del foro: " . $th->getMessage() . "',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
            </script>";
    }finally{
        Desconectar($oConexion);
    }

    return $retorno;
}

function InsertarComentarioForo($pCorreo, $pComentario) {
    $retorno = false;

    try {
        $oConexion = Conecta();

        // Formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")) {
            $stmt = $oConexion->prepare("INSERT INTO TAB_FORO (CORREO, COMENTARIO) VALUES (?, ?)");
            $stmt->bind_param("ss", $iCorreo, $iComentario);

            // Establecer parámetros y luego ejecutar
            $iCorreo = $pCorreo;
            $iComentario = $pComentario;

            if ($stmt->execute()) {
                $retorno = true;
            }
        }

    } catch (\Throwable $th) {
        error_log($th);
        echo "<script>
                Swal.fire({
                    title: 'Error al insertar comentario en el foro',
                    text: 'Ha ocurrido un error al insertar el comentario en el foro: " . $th->getMessage() . "',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
            </script>";
        return $th;
    } finally {
        Desconectar($oConexion);
    }

    return $retorno;
}
?>
