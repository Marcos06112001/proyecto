
<?php
    $tituloPagina = "Creaciones Mari - Metodos de Pago";
    session_start();
    include "../../include/templates/headerPaginas.php";
    require_once "../../include/functions/recoge.php";
    try{
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once "../../DAL/metodosPago.php";
            $codEncargo = recogeGet("codEncargo");
            $Correo = $_SESSION['correoGlobal'];
            $metodos = ObtenerMetodosPago($Correo);
        }
        elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $Correo = $_SESSION['correoGlobal'];
            $accion = recogePost("accion");
            $numTarjeta = recogePost("numTarjeta");
            if($accion == "pay"){
                $codSeguridad = recogePost("codSeguridad");
                $codEncargo = recogePost("codEncargo");

            }
            elseif ($accion == "delete"){
                $retorno = EliminarMetodoPago($Correo,$numTarjeta);
                if(!$retorno){
                    echo "<script>
                            Swal.fire({
                                title: 'Error',
                                text: 'Error al eliminar el metodo de pago',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            });
                        </script>";
                }
                else{
                    echo "<script>
                            Swal.fire({
                                title: 'Accion Completa',
                                text: 'Se elimino correctamente el metodo de pago',
                                icon: 'success',
                                confirmButtonText: 'Ok'
                            });
                        </script>";
                }
            }
        }
    }
    catch(\Throwable $th)
    {
        error_log($th);
        echo "<script>
                    Swal.fire({
                        title: 'Aviso',
                        text: 'Ocurrio un error al con el try catch php. Error tecnico:$th',
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    });
                </script>";
    }
?>
<main class="bg-Proyecto">
    <br>
    <br>
    <section>
        <div class="container">
            <div class="row row-Card">
                <div class="col col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card card-Proyecto">
                        <div class="card-header card-header-Proyecto">
                            <div class="row">
                                <div class="col-2">
                                    <a class="text-white" href="../HistorialC/Index.php" style="font-size: 32px;"><i class="fa-solid fa-backward"></i></a>
                                </div>
                                <div class="col-8">
                                    <h2 class="text-black font-weight-bold text-center">Metodos de Pago</h2>
                                </div>
                                <div class="col-2">
                                    <a class="text-white" href="../PagosM/Agregar.php" style="font-size: 32px; display: block; text-align: right;"><i class="fa-solid fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body card-body-Proyecto" style="overflow-y: auto">
                            <?php if (empty($metodos)): ?>
                                <div class="row bubble-row p-2">
                                    <div class="col">
                                        <p class="text-center">No hay métodos de pago registrados.</p>
                                    </div>
                                </div>
                            <?php else: ?>
                                <?php foreach ($metodos as $m): ?>
                                    <div class="row bubble-row p-2">
                                        <div class="col-3">
                                            <img src="<?php echo $m['RUTA_IMAGEN']; ?>" class="card-img-top" alt="RutImagen" />
                                        </div>
                                        <div class="col-6">
                                            <div class="row col-12 p-1">
                                                <p><?php echo $m['NOMBRE_TITULAR']; ?></p>
                                            </div>
                                            <div class="row col-12 p-1">
                                                <p><?php echo $m['NUM_TARJETA']; ?></p>
                                            </div>
                                            <div class="row col-12 p-1">
                                                <p><?php echo $m['FEC_VENCIMIENTO']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-3" >
                                            <form method="post">
                                                <input type="hidden" name="accion" value="pagar">
                                                <div class="row col-12 p-1">
                                                    <label for="codSeguridad">Código de Seguridad:</label>
                                                    <input type="number" id="codSeguridad" name="codSeguridad" class="form-control" required />
                                                    <input type="hidden" name="numTarjeta" value="<?php echo $m['NUM_TARJETA']; ?>">
                                                    <input type="hidden" name="accion" value="pay">
                                                    <input type="hidden" name="codEncargo" value="<?php echo $codEncargo; ?>">
                                                </div>
                                                <div class="row p-3">
                                                    <div class="col-6">
                                                        <button type="submit" class="btn btn-Proyecto">Pagar</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <form method="post">
                                                <input type="hidden" name="numTarjeta" value="<?php echo $m['NUM_TARJETA']; ?>">
                                                <input type="hidden" name="accion" value="delete">
                                                <div class="col-6">
                                                    <button type="submit" class="btn btn-Secon-Proyecto">Eliminar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <div class="card-footer">
                            <img src="../../img/bannerH.png" alt="BannerHorizontal" class="bannerH-img"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
    include "../../include/templates/footer.php";
?>
