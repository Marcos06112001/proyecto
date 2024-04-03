
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
            require_once "../../DAL/usuarios.php";
    
            $nombre = recogePost("NOMBRE");
            $ape1 = recogePost("APELLIDO_1");
            $ape2 = recogePost("APELLIDO_2");
            $contra = recogePost("txtContra");
            $passwordHash = password_hash($contra, PASSWORD_BCRYPT);

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
                        $update = UpdateUsuarios($correo,$passwordHash,$nombre,$ape1,$ape2,$rutaImagen);

                        if ($update) {
                            header("Location: Index.php?estado=1");

                        } else {
                            echo "<script>
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Ha ocurrido un error al modificar el usuario',
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
                
                $update = UpdateUsuarios($correo,$passwordHash,$nombre,$ape1,$ape2,null);

                if ($update) {
                    header("Location: Index.php?estado=1");
                } else {
                    echo "<script>
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Ha ocurrido un error al modificar el usuario',
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


    editarPerfil();       
    include "../../include/templates/footer.php";
?>
