<?php


function Conecta(){
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $database = "DB_PROYECTO_DWP_2";
    try{
        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $database);

        // Verificar conexión
        if ($conn->connect_error) {
            echo "Ocurrió un error al establecer la conexión " . mysqli_connect_error();
            die("Error de conexión: " . $conn->connect_error);
            
        }
        return $conn;

    }
    catch(\Throwable $ex)
    {
        echo $ex;
        error_log($ex);
    }  
}

function Desconectar($conexion) {
    mysqli_close($conexion);
}



