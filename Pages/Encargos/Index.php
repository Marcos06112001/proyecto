<?php
    $tituloPagina = "Creaciones Mari - Menu Principal";
    session_start();
    include "../../include/templates/headerPaginas.php";
    require_once "../../include/functions/recoge.php";
    
    include "Fragmentos.php";

    try{
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $correo = $_SESSION["correoGlobal"];
            require_once "../../include/functions/recoge.php";
            require_once "../../DAL/encargos.php";
    
            $nomDiseno = recogePost("nombre");
            $desDiseno = recogePost("desc");
            $tamano = recogePost("tamano");

            // Obtener información de la imagen
            $nombreImg = $_FILES["imagen"]["name"];
            $tempNombre = $_FILES["imagen"]["tmp_name"];
            $errorImg = $_FILES["imagen"]["error"];

            // Directorio de destino para la imagen
            $destino = "../..//ejEncargos/";

            // Generar un nombre único para la imagen
            $nomGuardar = uniqid('', true) . '_' . $nombreImg;

            // Mover la imagen al directorio de destino
            if ($errorImg === UPLOAD_ERR_OK) {
                if (move_uploaded_file($tempNombre, $destino . $nomGuardar)) {
                    // La imagen se ha movido correctamente, ahora actualiza la base de datos con la ruta de la imagen
                    $rutaImagen = $destino . $nomGuardar;
                    $insert = InsertarEncargo($correo, $nomDiseno, $desDiseno, $tamano, "", $rutaImagen, 0);

                    if ($insert) {
                        echo "<script>
                            Swal.fire({
                                title: 'Se realizó correctamente el encargo',
                                text: 'Se ha hecho el encargo correctamente! Pronto se va a visualizar en su historial',
                                icon: 'success',
                                confirmButtonText: 'Ok'
                            });
                        </script>";
                    } else {
                        echo "<script>alert('Error al insertar el encargo');</script>";
                    }
                } else {
                    echo "<script>alert('Error al mover la imagen');</script>";
                }
            } else {
                echo "<script>alert('Error al cargar la imagen');</script>";
            }
        }
    }
    catch(Exception $e){
        error_log($e->getMessage());
    }
    contenedorPrincipal();       
    include "../../include/templates/footer.php";
?>