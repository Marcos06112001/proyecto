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
            $indEntrega = isset($_POST['indEntrega']) ? 'S' : 'N';

            if(isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] === UPLOAD_ERR_OK) // si hay imagen
            {
                $nombreImg = $_FILES["imagen"]["name"];
                $tempNombre = $_FILES["imagen"]["tmp_name"];
                $errorImg = $_FILES["imagen"]["error"];
                $destino = "../../img/ejEncargos/";

                $nomGuardar = uniqid('', true) . '_' . $nombreImg;

                if ($errorImg === UPLOAD_ERR_OK) {
                    if (move_uploaded_file($tempNombre, $destino . $nomGuardar)) {
                        $rutaImagen = $destino . $nomGuardar;
                        $insert = InsertarEncargo($correo, $nomDiseno, $desDiseno, $tamano, "", $rutaImagen, 0,$indEntrega);

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
                            echo "<script>
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Ha ocurrido un error al insertar el encargo',
                                    icon: 'error',
                                    confirmButtonText: 'Ok'
                                });
                            </script>";
                        }
                    } else {
                        echo "<script>
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Ha ocurrido un error al guardar la imagen',
                                    icon: 'error',
                                    confirmButtonText: 'Ok'
                                });
                            </script>";
                    }
                } else {
                    echo "<script>
                        Swal.fire({
                            title: 'Error',
                            text: 'Ha ocurrido un error al cargar la imagen',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                    </script>";
                }
            }
            else //no hay imagen
            {
                
                $insert = InsertarEncargo($correo, $nomDiseno, $desDiseno, $tamano, "", null , 0,$indEntrega);

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
                    echo "<script>
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Ha ocurrido un error al insertar el encargo',
                                    icon: 'error',
                                    confirmButtonText: 'Ok'
                                });
                            </script>";
                }
            }
        }
    }
    catch(Exception $e){
        error_log($e->getMessage());
    }
    contenedorPrincipal();       
    include "../../include/templates/footer.php";
?>