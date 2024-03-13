
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
    
            $nombre = recogePost("nombre");
            $ape1 = recogePost("apellido_1");
            $ape_2 = recogePost("apellido_2");
            $contra = recogePost("txtContra");
            $passwordHash = password_hash($Pass, PASSWORD_BCRYPT);
            $result = InsertarUsuarios($Correo,$passwordHash,$Nom,$Ape1,$Ape2);

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
                        $insert = UpdateUsuarios($correo,$passwordHash,$nombre,$ape1,$ape2,$rutaImagen);

                        if ($insert) {
                            
                            echo "<script>
                                Swal.fire({
                                    title: 'Se modifico correctamente su usuario',
                                    text: 'Se ha modificado correctamente su usuario!',
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
            else //no hay imagen
            {
                
                $insert = InsertarEncargo($correo, $nomDiseno, $desDiseno, $tamano, "", null , 0);

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
            }


            

            
        }
    }
    catch(Exception $e){
        error_log($e->getMessage());
    }


    editarPerfil();       
    include "../../include/templates/footer.php";
?>
