
<?php
    $tituloPagina = "Creaciones Mari - Metodos de Pago";
    session_start();
    include "../../include/templates/headerPaginas.php";
    require_once "../../include/functions/recoge.php";
    try{
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once "../../DAL/metodosPago.php";
            $codEncargo = recogerGet("codEncargo");
            $Correo = $_SESSION['correoGlobal'];
            $metodos = ObtenerMetodosPago($Correo);
        }
    }
    catch(\Throwable $th)
    {
        error_log($th);
        echo "<script>
                    Swal.fire({
                        title: 'Aviso',
                        text: 'Ocurrio un error al obtener el usuario. Error tecnico:$th',
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    });
                </script>";
    }
?>
<main class="bg-Proyecto">
    <section th:fragment="ListaMetodosP">
        <div class="container">
            <div class="row row-Card">
                <div class="col col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card card-Proyecto">
                        <div class="card-header card-header-Proyecto">
                            <div class="row">
                                <div class="col-2">
                                    <a class="text-white" href="/HistorialC/Index.php" style="font-size: 32px;"><i class="fa-solid fa-backward"></i></a>
                                </div>
                                <div class="col-10">
                                    <h2 class="text-black font-weight-bold" style="padding-left: 20%">Metodos de Pago</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body card-body-Proyecto" style="overflow-y: auto">
                            <?php if (empty($metodos)): ?>
                                <div class="row bubble-row p-2">
                                    <div class="col">
                                        <p>No hay métodos de pago registrados.</p>
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
                                            <form action="/pagos/pay/<?php echo $m['NUM_TARJETA']; ?>" method="post">
                                                <div class="row col-12 p-1">
                                                    <label for="codSeguridad">Código de Seguridad:</label>
                                                    <input type="number" id="codSeguridad" name="codSeguridad" class="form-control" required />
                                                </div>
                                                <div class="row p-3">
                                                    <div class="col-6">
                                                        <button type="submit" class="btn btn-Proyecto">Pagar</button>
                                                    </div>
                                            </form>
                                                <div class="col-6">
                                                    <form action="/pagos/delete/<?php echo $m['NUM_TARJETA']; ?>" method="post">
                                                        <button type="submit" class="btn btn-Secon-Proyecto">Eliminar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <div class="card-footer">
                            <img th:src="@{/img/bannerH.png}" alt="BannerHorizontal" class="bannerH-img"/>
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
