<?php
require_once "conexion.php";

function ObtenerEncargos(){
    try {
        $oConexion = Conecta();

        // formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")){

            if(!$result = mysqli_query($oConexion, "SELECT CORREO, COD_ENCARGO, NOM_DISENO, DES_DISENO, TAM_DISENO, PRECIO_DISENO, RUTA_IMAGEN, COD_DIRECCION_DEST, IND_ESTADO, IND_PAGADO, IND_EXPRESS FROM TAB_ENCARGOS")) die();  
                $retorno = array();

            while ($row = mysqli_fetch_array($result)) {
                $retorno[] = $row;
            }
        }

    } catch (\Throwable $th) {
        error_log($th);
        echo "<script>
                Swal.fire({
                    title: 'Error al obtener usuarios',
                    text: 'Ha ocurrido un error al obtener todos los usuarios: " . $th->getMessage() . "',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
            </script>";
    }finally{
        Desconectar($oConexion);
    }

    return $retorno;
}

function ObtenerUnEncargos($pCorreo){
    try {
        $oConexion = Conecta();

        // formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")){

            if(!$result = mysqli_query($oConexion, "SELECT CORREO, COD_ENCARGO, NOM_DISENO, DES_DISENO, TAM_DISENO, PRECIO_DISENO, RUTA_IMAGEN, COD_DIRECCION_DEST, IND_ESTADO, IND_PAGADO, IND_EXPRESS FROM TAB_ENCARGOS where CORREO = '".$pCorreo."'")) die();  
                $retorno = array();

            while ($row = mysqli_fetch_array($result)) {
                $retorno[] = $row;
            }
        }

    } catch (\Throwable $th) {
        echo "<script>
                Swal.fire({
                    title: 'Error al obtener usuario',
                    text: 'Ha ocurrido un error al obtener el usuario: " . $th->getMessage() . "',
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

function InsertarEncargo($pCorreo, $pNomDiseno, $pDesDiseno, $pTamDiseno, $pPrecioDiseno, $pRutaImagen, $pCodDireccionDest, $pIndExpress) {
    $retorno = false;

    try {
        $oConexion = Conecta();

        // Formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")) {
            $stmt = $oConexion->prepare("INSERT INTO TAB_ENCARGOS (CORREO, NOM_DISENO, DES_DISENO, TAM_DISENO, PRECIO_DISENO, RUTA_IMAGEN, COD_DIRECCION_DEST, IND_ESTADO, IND_PAGADO, IND_EXPRESS) VALUES (?, ?, ?, ?, ?, ?, ?, 'N','N',?)");
            $stmt->bind_param("ssssdsis", $iCorreo, $iNomDiseno, $iDesDiseno, $iTamDiseno, $iPrecioDiseno, $iRutaImagen, $iCodDireccionDest, $iIndExpress);

            // Set parametros y luego ejecutar
            $iCorreo = $pCorreo;
            $iNomDiseno = $pNomDiseno;
            $iDesDiseno = $pDesDiseno;
            $iTamDiseno = $pTamDiseno;
            $iPrecioDiseno = $pPrecioDiseno;
            $iRutaImagen = $pRutaImagen;
            $iCodDireccionDest = $pCodDireccionDest;
            $iIndExpress = $pIndExpress;

            if ($stmt->execute()) {
                $retorno = true;
            }
        }

    } catch (\Throwable $th) {
        error_log($th);
        echo "<script>
                Swal.fire({
                    title: 'Error al insertar encargo',
                    text: 'Ha ocurrido un error al insertar el encargo: " . $th->getMessage() . "',
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

function UpdateEncargo($pCorreo, $pNomDiseno, $pDesDiseno, $pTamDiseno, $pPrecioDiseno, $pRutaImagen, $pCodDireccionDest) {
    $retorno = false;

    try {
        $oConexion = Conecta();

        // Formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")) {
            $stmt = $oConexion->prepare("UPDATE TAB_ENCARGOS SET NOM_DISENO = ?, DES_DISENO = ?, TAM_DISENO = ?, PRECIO_DISENO = ?, RUTA_IMAGEN = ?, COD_DIRECCION_DEST = ? WHERE CORREO = ? AND COD_ENCARGO = ?");
            $stmt->bind_param("sssdsisi", $iNomDiseno, $iDesDiseno, $iTamDiseno, $iPrecioDiseno, $iRutaImagen, $iCodDireccionDest, $iCorreo, $iCodEncargo);

            // Set parametros y luego ejecutar
            $iCorreo = $pCorreo;
            $iNomDiseno = $pNomDiseno;
            $iDesDiseno = $pDesDiseno;
            $iTamDiseno = $pTamDiseno;
            $iPrecioDiseno = $pPrecioDiseno;
            $iRutaImagen = $pRutaImagen;
            $iCodDireccionDest = $pCodDireccionDest;

            if ($stmt->execute()) {
                $retorno = true;
            }
        }

    } catch (\Throwable $th) {
        error_log($th);
        echo "<script>
                Swal.fire({
                    title: 'Error al actualizar encargo',
                    text: 'Ha ocurrido un error al actualizar el encargo: " . $th->getMessage() . "',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
        </script>";
    } finally {
        Desconectar($oConexion);
    }

    return $retorno;
}

function PagarEncargo($pCodEncargo) {
    $retorno = false;

    try {
        $oConexion = Conecta();

        // Formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")) {
            $stmt = $oConexion->prepare("UPDATE TAB_ENCARGOS SET IND_PAGADO = 'S' WHERE COD_ENCARGO = ?");
            $stmt->bind_param("i", $iCodEncargo);

            $iCodEncargo = $pCodEncargo;

            if ($stmt->execute()) {
                $retorno = true;
            }
        }

    } catch (\Throwable $th) {
        error_log($th);
        echo "<script>
                Swal.fire({
                    title: 'Error al actualizar encargo',
                    text: 'Ha ocurrido un error al actualizar el encargo: " . $th->getMessage() . "',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
        </script>";
    } finally {
        Desconectar($oConexion);
    }

    return $retorno;
}
