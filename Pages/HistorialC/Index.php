
<?php
    $tituloPagina = "Creaciones Mari - Historial";
    session_start();
    include "../../include/templates/headerPaginas.php";
    require_once "../../include/functions/recoge.php";
    try{
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once "../../DAL/encargos.php";
            $Correo = $_SESSION['correoGlobal'];
    
            $encargos = ObtenerUnEncargos($Correo);

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
    <section>
        <div class="container">
            <div class="row row-Card">
                <div class="col col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card card-Proyecto">
                        <div class="card-header card-header-Proyecto">
                            <h2 class="text-black font-weight-bold text-center">Historial</h2>
                        </div>
                        <div class="card-body card-body-Proyecto" style="overflow-y: auto">
                            <?php if (empty($encargos)): ?>
                                <div class="row bubble-row p-2">
                                    <div class="col">
                                        <p>No hay encargos realizados.</p>
                                    </div>
                                </div>
                            <?php else: ?>
                                <?php foreach ($encargos as $e): ?>
                                    <div class="row bubble-row p-2">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-2">
                                                    <img src="<?php echo $e['RUTA_IMAGEN']; ?>" class="card-img-top" alt="RutImagen" />
                                                </div>
                                                <div class="col-8">
                                                    <div class="row col-12 p-1">
                                                        <h5 class="card-title"><?php echo $e['NOM_DISENO']; ?></h5>
                                                    </div>
                                                    <div class="row col-12 p-1">
                                                        <p class="card-text"><?php echo $e['DES_DISENO']; ?></p>
                                                    </div>
                                                    <div class="row mt-5">
                                                        <div class="col-4">
                                                            <p class="card-text">
                                                                <?php if ($e['IND_ESTADO'] === 'N'): ?>
                                                                    <span class="text-warning">Sin Entregar</span>
                                                                <?php elseif ($e['IND_ESTADO'] === 'S'): ?>
                                                                    <span class="text-success">Entregado</span>
                                                                <?php endif; ?>
                                                            </p>
                                                        </div>
                                                        <div class="col-4">
                                                            <p class="card-text">
                                                                <?php if ($e['IND_PAGADO'] === 'N'): ?>
                                                                    <span class="text-warning">Pendiente de pago</span>
                                                                <?php elseif ($e['IND_PAGADO'] === 'S'): ?>
                                                                    <span class="text-success">Pagado</span>
                                                                <?php endif; ?>
                                                            </p>
                                                        </div>
                                                        <div class="col-4">
                                                            <p class="card-text">
                                                                <?php if ($e['IND_EXPRESS'] === 'S'): ?>
                                                                    <span class="text-warning">Entrega Domicilio</span>
                                                                <?php elseif ($e['IND_EXPRESS'] === 'N'): ?>
                                                                    <span class="text-success">Retira pedido</span>
                                                                <?php endif; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="row col-12 p-3">
                                                        <?php if ($e['IND_PAGADO'] === 'N'): ?>
                                                            <a href="/PagosM/Index.php?codEncargo=<?php echo $e['COD_ENCARGO']; ?>" class="btn btn-Proyecto">Pagos</a>
                                                        <?php elseif ($e['IND_PAGADO'] === 'S'): ?>
                                                            <button class="btn btn-Proyecto" disabled="disabled">Pagos</button>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="row col-12 p-3">
                                                        <a href="/HistorialC/Vermas.php?codEncargo=<?php echo $e['COD_ENCARGO']; ?>" class="btn btn-Secon-Proyecto">Ver más</a>
                                                    </div>
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