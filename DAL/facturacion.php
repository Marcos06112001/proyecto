<?php
require_once "conexion.php";
function InsertarFacturacion($pCorreo, $pNumTarjeta, $pPais, $pCodPostal, $pTelefono, $pCorreoDest) {
    $retorno = false;

    try {
        $oConexion = Conecta();

        // Formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")) {
            $stmt = $oConexion->prepare("INSERT INTO TAB_FACTURACION (CORREO, NUM_TARJETA, PAIS, COD_POSTAL, TELEFONO, CORREO_DEST) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $iCorreo, $iNumTarjeta, $iPais, $iCodPostal, $iTelefono, $iCorreoDest);

            // Set parametros y luego ejecutar
            $iCorreo = $pCorreo;
            $iNumTarjeta = $pNumTarjeta;
            $iPais = $pPais;
            $iCodPostal = $pCodPostal;
            $iTelefono = $pTelefono;
            $iCorreoDest = $pCorreoDest;

            if ($stmt->execute()) {
                $retorno = true;
            }
        }

    } catch (\Throwable $th) {
        error_log($th);
        echo "<script>
                Swal.fire({
                    title: 'Error al insertar facturación',
                    text: 'Ha ocurrido un error al insertar la facturación: " . $th->getMessage() . "',
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

function EliminarFacturacion($pCorreo, $pNumTarjeta) {
    $retorno = false;

    try {
        $oConexion = Conecta();

        // Formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")) {
            $stmt = $oConexion->prepare("DELETE FROM TAB_FACTURACION WHERE CORREO = ? AND NUM_TARJETA = ?");
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
                    title: 'Error al eliminar facturación',
                    text: 'Ha ocurrido un error al eliminar la facturación: " . $th->getMessage() . "',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
        </script>";
    } finally {
        Desconectar($oConexion);
    }

    return $retorno;
}
