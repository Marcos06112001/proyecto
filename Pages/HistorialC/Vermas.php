
<?php
    $tituloPagina = "Creaciones Mari - Ver Encargo";
    session_start();
    include "../../include/templates/headerPaginas.php";
    require_once "../../include/functions/recoge.php";
    try{
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once "../../DAL/encargos.php";
            $codEncargo = recogeGet("codEncargo");
            $Correo = $_SESSION['correoGlobal'];
    
            $encargos = ObtenerUnEncargos($Correo);

            $encargo = null;

            foreach ($encargos as $e) {
                if ($e['COD_ENCARGO'] == $codEncargo) {
                    $encargo = $e;
                    break; 
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
                        text: 'Ocurrio un error al obtener el usuario. Error tecnico:$th',
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
            <form method="GET" action="" class="was-validated" enctype="multipart/form-data">
                <input type="hidden" name="codEncargo" value="<?php echo $encargo['COD_ENCARGO']; ?>"/>
                <input type="hidden" name="rutaImagen" value="<?php echo $encargo['RUTA_IMAGEN']; ?>"/>
                <div class="row row-Card">
                    <div class="col col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card card-Proyecto">
                            <div class="card-header card-header-Proyecto">
                                <div class="row">
                                    <div class="col-2">
                                        <a class="text-white" href="../HistorialC/Index.php" style="font-size: 32px;"><i class="fa-solid fa-backward"></i></a>
                                    </div>
                                    <div class="col-10">
                                        <h2 class="text-black font-weight-bold" style="padding-left: 20%">Detalles Pedido de <?php echo $encargo['NOM_DISENO']; ?></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body card-body-Proyecto">
                                <div class="row col-12 mb-3">
                                    <label for="nomDiseno">Nombre</label>
                                    <input type="text" class="form-control" name="nomDiseno" value="<?php echo $encargo['NOM_DISENO']; ?>" readonly="readonly"/>
                                </div>
                                <div class="row col-12 mb-3">
                                    <label for="desDiseno">Descripción</label>
                                    <textarea class="form-control" name="desDiseno" readonly="readonly"><?php echo $encargo['DES_DISENO']; ?></textarea>
                                </div>
                                <div class="row col-12 mb-3">
                                    <label for="tamDiseno">Tamaño</label>
                                    <?php
                                        $tamDiseno = $encargo['TAM_DISENO'];
                                        switch ($tamDiseno) {
                                            case '0':
                                                echo '5 a 15 cm';
                                                break;
                                            case '1':
                                                echo '15 a 25';
                                                break;
                                            case '2':
                                                echo '25 a 35';
                                                break;
                                            case '3':
                                                echo '35+';
                                                break;
                                        }
                                    ?>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 aling-content-start">
                                        <label for="rutaImagen">Ejemplo</label>
                                        <br/>
                                        <img src="<?php echo $encargo['RUTA_IMAGEN']; ?>" alt="RutImagen" id="rutaImagen" height="350" width="350"/>
                                    </div>
                                    <div class="col-6 aling-content-end">
                                        <label for="googleMapsFrame">Direccion de Entrega:</label>
                                        <br/>
                                        <iframe id="googleMapsFrame" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15719.048169091202!2d-84.04027628395998!3d9.953745916310238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0e46fb1e4c2dd%3A0xa8ea851c3ab1d546!2sAuto%20Mercado%20%E2%80%A2%20Goicoechea!5e0!3m2!1ses!2scr!4v1702598969863!5m2!1ses!2scr" width="400" height="300" style="border:0;" allowfullscreen="" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 aling-content-start">
                                        <label for="precioDiseno">Precio</label>
                                        <input type="text" class="form-control" name="precioDiseno" value="<?php echo $encargo['PRECIO_DISENO']; ?>" readonly="readonly"/>
                                    </div>
                                    <div class="col-6 aling-content-end">
                                        <br/>
                                        <span>
                                            <?php
                                                $indPagado = $encargo['IND_PAGADO'];
                                                if ($indPagado == 'N') {
                                                    echo '<a href="/PagosM/Index.php?codEncargo=' . $encargo['COD_ENCARGO'] . '" class="btn btn-Proyecto">Pagos</a>';
                                                } else {
                                                    echo '<button class="btn btn-Proyecto" disabled="disabled">Pagos</button>';
                                                }
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
<?php
    include "../../include/templates/footer.php";
?>
