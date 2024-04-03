<?php
require_once "conexion.php";

function ObtenerUsuarios(){
    try {
        $oConexion = Conecta();

        // formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")){

            if(!$result = mysqli_query($oConexion, "SELECT CORREO, CONTRASENA, NOMBRE, APELLIDO_1,APELLIDO_2, RUTA_IMAGEN, ESTADO FROM TAB_USUARIOS")) die();  
                $retorno = array();

            while ($row = mysqli_fetch_array($result)) {
                $retorno[] = $row;
            }
        }

    } catch (\Throwable $th) {
        error_log($th);
        echo $th;
    }finally{
        Desconectar($oConexion);
    }

    return $retorno;
}

function ObtenerUnUsuarios($pCorreo){
    try {
        $oConexion = Conecta();
        $retorno = false;

        // formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")){

            if(!$result = mysqli_query($oConexion, "SELECT CORREO, CONTRASENA, NOMBRE, APELLIDO_1,APELLIDO_2, RUTA_IMAGEN, IND_ESTADO FROM TAB_USUARIOS where CORREO = '".$pCorreo."'")) die();  
                $retorno = false;

            while ($row = mysqli_fetch_array($result)) {
                $retorno = $row;
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

function InsertarUsuarios($pCorreo,$pPass,$pNombre,$pApellido1,$pApellido2){
    $retorno = false;

    try {
        $oConexion = Conecta();

        // formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")){
            $stmt = $oConexion->prepare("INSERT INTO TAB_USUARIOS (CORREO, CONTRASENA, NOMBRE, APELLIDO_1,APELLIDO_2,IND_ESTADO) VALUES (?, ?, ?, ?, ?, 'A')");
            $stmt->bind_param("sssss", $iCorreo,$iPass,$iNombre,$iApellido1,$iApellido2);

            // set parametros y luego ejecutar
            $iCorreo = $pCorreo;
            $iPass = $pPass;
            $iNombre = $pNombre;
            $iApellido1 = $pApellido1;
            $iApellido2 = $pApellido2;

            if ($stmt->execute()){
                $retorno = true;
            }
        }

    } catch (\Throwable $th) {
        error_log($th);
        //echo $th;
        return $th;
    }finally{
        Desconectar($oConexion);
    }

    return $retorno;
}

function UpdateUsuarios($pCorreo,$pPass,$pNombre,$pApellido1,$pApellido2, $pImagen){
    $retorno = false;

    try {
        $oConexion = Conecta();

        // formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")){
            $stmt = $oConexion->prepare("UPDATE TAB_USUARIOS SET CONTRASENA = ?, NOMBRE = ?, APELLIDO_1 = ?, APELLIDO_2 = ?, RUTA_IMAGEN = ? WHERE CORREO = ? ");
            $stmt->bind_param("ssssss", $iPass,$iNombre,$iApellido1,$iApellido2,$iImagen,$iCorreo);

            // set parametros y luego ejecutar
            $iCorreo = $pCorreo;
            $iPass = $pPass;
            $iNombre = $pNombre;
            $iApellido1 = $pApellido1;
            $iApellido2 = $pApellido2;
            $iImagen = $pImagen;

            if ($stmt->execute()){
                $retorno = true;
            }
        }

    } catch (\Throwable $th) {
        error_log($th);
        echo $th;
    }finally{
        Desconectar($oConexion);
    }

    return $retorno;
}
