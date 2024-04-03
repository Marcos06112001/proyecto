<?php
require_once "conexion.php";

function ObtenerMetodosPago($pCorreo){
    try {
        $oConexion = Conecta();

        // formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")){

            if(!$result = mysqli_query($oConexion, "SELECT CORREO, NUM_TARJETA, NOMBRE_TITULAR, FEC_VENCIMIENTO, COD_SEGURIDAD, IND_ESTADO FROM TAB_METODOS_PAG_USUARIO WHERE CORREO = '".$pCorreo."'")) die();  
                $retorno = array();

            while ($row = mysqli_fetch_array($result)) {
                $retorno[] = $row;
            }
        }

    } catch (\Throwable $th) {
        echo "<script>
                Swal.fire({
                    title: 'Error al obtener metodos de pago',
                    text: 'Ha ocurrido un error al obtener el metodos de pago: " . $th->getMessage() . "',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
            </script>";

        error_log($th);
    }finally{
        Desconectar($oConexion);
    }

    return $retorno;
}


function ObtenerUnMetodoPago($pCorreo, $pNumTarjeta){
    try {
        $oConexion = Conecta();

        // formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")){

            if(!$result = mysqli_query($oConexion, "SELECT CORREO, NUM_TARJETA, NOMBRE_TITULAR, FEC_VENCIMIENTO, COD_SEGURIDAD, IND_ESTADO FROM TAB_METODOS_PAG_USUARIO WHERE CORREO = '".$pCorreo."' AND NUM_TARJETA = '".$pNumTarjeta."'")) die();  
                $retorno = array();

            while ($row = mysqli_fetch_array($result)) {
                $retorno = $row;
            }
        }

    } catch (\Throwable $th) {
        echo "<script>
                Swal.fire({
                    title: 'Error al obtener el método de pago',
                    text: 'Ha ocurrido un error al obtener el método de pago: " . $th->getMessage() . "',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
            </script>";

        error_log($th);
    }finally{
        Desconectar($oConexion);
    }

    return $retorno;
}

function InsertarMetodoPago($pCorreo, $pNumTarjeta, $pNombreTitular, $pFecVencimiento, $pCodSeguridad) {
    $retorno = false;

    try {
        $oConexion = Conecta();

        // Formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")) {
            $stmt = $oConexion->prepare("INSERT INTO TAB_METODOS_PAG_USUARIO (CORREO, NUM_TARJETA, NOMBRE_TITULAR, FEC_VENCIMIENTO, COD_SEGURIDAD, IND_ESTADO) VALUES (?, ?, ?, ?, ?, 'A')");
            $stmt->bind_param("sssis", $iCorreo, $iNumTarjeta, $iNombreTitular, $iFecVencimiento, $iCodSeguridad);

            // Set parametros y luego ejecutar
            $iCorreo = $pCorreo;
            $iNumTarjeta = $pNumTarjeta;
            $iNombreTitular = $pNombreTitular;
            $iFecVencimiento = $pFecVencimiento;
            $iCodSeguridad = $pCodSeguridad;

            if ($stmt->execute()) {
                $retorno = true;
            }
        }

    } catch (\Throwable $th) {
        error_log($th);
        echo "<script>
                Swal.fire({
                    title: 'Error al insertar método de pago',
                    text: 'Ha ocurrido un error al insertar el método de pago: " . $th->getMessage() . "',
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

function ActualizarMetodoPago($pCorreo, $pNumTarjeta, $pNombreTitular, $pFecVencimiento, $pCodSeguridad) {
    $retorno = false;

    try {
        $oConexion = Conecta();

        // Formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")) {
            $stmt = $oConexion->prepare("UPDATE TAB_METODOS_PAG_USUARIO SET NOMBRE_TITULAR = ?, FEC_VENCIMIENTO = ?, COD_SEGURIDAD = ? WHERE CORREO = ? AND NUM_TARJETA = ?");
            $stmt->bind_param("ssiss", $iNombreTitular, $iFecVencimiento, $iCodSeguridad, $iCorreo, $iNumTarjeta);

            // Set parametros y luego ejecutar
            $iCorreo = $pCorreo;
            $iNumTarjeta = $pNumTarjeta;
            $iNombreTitular = $pNombreTitular;
            $iFecVencimiento = $pFecVencimiento;
            $iCodSeguridad = $pCodSeguridad;

            if ($stmt->execute()) {
                $retorno = true;
            }
        }

    } catch (\Throwable $th) {
        error_log($th);
        echo "<script>
                Swal.fire({
                    title: 'Error al actualizar método de pago',
                    text: 'Ha ocurrido un error al actualizar el método de pago: " . $th->getMessage() . "',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
        </script>";
    } finally {
        Desconectar($oConexion);
    }

    return $retorno;
}

function EliminarMetodoPago($pCorreo, $pNumTarjeta) {
    $retorno = false;

    try {
        $oConexion = Conecta();

        // Formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")) {
            $stmt = $oConexion->prepare("DELETE FROM TAB_METODOS_PAG_USUARIO WHERE CORREO = ? AND NUM_TARJETA = ?");
            $stmt->bind_param("ss", $iCorreo, $iNumTarjeta);

            // Set parametros y luego ejecutar
            $iCorreo = $pCorreo;
            $iNumTarjeta = $pNumTarjeta;

            if ($stmt->execute()) {
                $retorno = true;
            }
        }

    } catch (\Throwable $th) {
        error_log($th);
        echo "<script>
                Swal.fire({
                    title: 'Error al eliminar método de pago',
                    text: 'Ha ocurrido un error al eliminar el método de pago: " . $th->getMessage() . "',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
        </script>";
    } finally {
        Desconectar($oConexion);
    }

    return $retorno;
}

function VerificaCodSeg($pCorreo, $pNumTarjeta, $pCodSeguridad) {
    $coincide = false;

    try {
        $oConexion = Conecta();

        // Formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")) {
            $stmt = $oConexion->prepare("SELECT 1 FROM TAB_METODOS_PAG_USUARIO WHERE CORREO = ? AND NUM_TARJETA = ? AND COD_SEGURIDAD = ?");
            $stmt->bind_param("sss", $iCorreo, $iNumTarjeta, $iCodSeguridad);

            // Set parametros y luego ejecutar
            $iCorreo = $pCorreo;
            $iNumTarjeta = $pNumTarjeta;
            $iCodSeguridad = $pCodSeguridad;

            if ($stmt->execute()) {
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    $coincide = true;
                }
            }
        }

    } catch (\Throwable $th) {
        error_log($th);
        echo "<script>
                Swal.fire({
                    title: 'Error al verificar código de seguridad',
                    text: 'Ha ocurrido un error al verificar el código de seguridad: " . $th->getMessage() . "',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
            </script>";
        return $th;
    } finally {
        Desconectar($oConexion);
    }

    return $coincide;
}


