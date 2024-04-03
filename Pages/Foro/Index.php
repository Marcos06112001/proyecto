<?php
    $tituloPagina = "Creaciones Mari - Foro";
    session_start();
    include "../../include/templates/headerPaginas.php";
    require_once "../../include/functions/recoge.php";
    require_once "../../DAL/foro.php";

    try {
        if (isset($_SESSION['success_message'])) {
            echo "<script>
                    Swal.fire({
                        title: 'Se realizó correctamente el encargo',
                        text: '" . $_SESSION['success_message'] . "',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                  </script>";
            // Eliminar el mensaje de éxito después de mostrarlo
            unset($_SESSION['success_message']);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $comentarios = ObtenerComentariosForo();
            if (!empty($comentarios)) {
                $ultimoComentario = $comentarios[count($comentarios) - 1];
            }
    
            require_once "../../DAL/usuarios.php";
            $Correo = $_SESSION['correoGlobal'];
            $usuarioActual = ObtenerUnUsuarios($Correo);
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $pComentario = recogePost("comentario");
            $pCorreo = $_SESSION['correoGlobal'];
            $insert = InsertarComentarioForo($pCorreo, $pComentario);
            if ($insert) {
                $_SESSION['success_message'] = "Se ha comentado correctamente! Pronto se va a visualizar en el foro.";
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            } else {
                echo "<script>alert('Error al insertar el comentario');</script>";
            }
        }
    } catch (\Throwable $th) {
        error_log($th);
    }
?>
<main class="bg-Proyecto">
    <div class="container"> 
        <div class="row py-2">
            <div class="col-md  -6 pr-0">
                <div class="card" style="height: 100%;">
                    <div class="card-header text-center" style="background-color: #FFD5BB;">
                        <h4>Comentarios Anteriores</h4>
                    </div>
                    <div class="card-body">
                        <div class="mt-5" style="padding-left: 15%;padding-right: 15%">
                            <?php if (empty($comentarios)): ?>
                                <div class="alert alert-info text-center" role="alert">
                                    No hay comentarios
                                </div>
                            <?php else: ?>
                                <div class="mb-3">
                                    <label for="txtNombre">Nombre que comenta:</label>
                                    <input type="text" readonly="readonly" class="form-control" value="<?php echo $ultimoComentario['NOMBRE_COMPLETO']; ?>" style="border-radius: 20px;">
                                </div>
                                <div class="mb-3">
                                    <label for="txtDesc">Descripcion del Comentario:</label>
                                    <textarea class="form-control" readonly="readonly" rows="10" style="border-radius: 20px; height: 350px"><?php echo $ultimoComentario['COMENTARIO']; ?></textarea>
                                </div>
                                <div class="text-center">
                                    <a href="../Foro/VerMasComentarios.php" class="btn-Proyecto btn-success btn">
                                        <i class="fas fa-angle-double-right "></i> Ver mas
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 pl-0">
                <div class="card">
                    <div class="card-header text-center" style="background-color: #FFD5BB;">
                        <h4>Deseas agregar un nuevo comentario?</h4>
                    </div>
                    <form method="POST" class="was-validated" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="m-5">
                                <div class="mb-3">
                                    <label for="txtNombre">Nombre que comenta:</label>
                                    <input type="text" disabled="disabled" class="form-control" value="<?php echo $usuarioActual['NOMBRE'] . ' ' . $usuarioActual['APELLIDO_1'] . ' ' . $usuarioActual['APELLIDO_2']; ?>" style="border-radius: 20px;">
                                </div>
                                <div class="mb-3">
                                    <label for="txtDesc">Descripcion del Comentario:</label>
                                    <textarea class="form-control" name="comentario" style="border-radius: 20px; height: 350px"></textarea>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn-Proyecto btn-success btn" type="submit">
                                    <i class="fas fa-add"></i> Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
    include "../../include/templates/footer.php";
?>  