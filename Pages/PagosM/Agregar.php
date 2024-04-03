
<?php
    $tituloPagina = "Creaciones Mari - Agregar Metodos de Pago";
    session_start();
    include "../../include/templates/headerPaginas.php";
    require_once "../../include/functions/recoge.php";
    require_once "../../DAL/metodosPago.php";
    require_once "../../DAL/facturacion.php";
    require_once "../../DAL/encargos.php";
    try{
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $indEntrega = isset($_POST['guardarInfo']) ? 'S' : 'N';
            $codEncargo = $_SESSION['codEncargo'];
            $Correo = $_SESSION['correoGlobal'];

            if($indEntrega=="N")
            {
                $pago = PagarEncargo($codEncargo);
                header("Location: ../HistorialC/Index.php");
            }
            else
            {
                $numTarjeta = recogePost("numTarjeta");
                $longitud = strlen($numTarjeta);
                $numTarjeta = substr($numTarjeta, 0, 1) . str_repeat('*', $longitud - 5) . substr($numTarjeta, -4);

                $caducidad1 = recogePost("caducidad_1");
                $caducidad2 = recogePost("caducidad_2");
                $fecVencimiento = "20".$caducidad2 . "/" . $caducidad1 . "/01";

                $codSeguridad = recogePost("codSeguridad");
                $nombre = recogePost("nombre");
                $apellidos = recogePost("apellidos");
                $nomTitular = $nombre . " " . $apellidos;

                $retorno = InsertarMetodoPago($Correo,$numTarjeta,$nomTitular,$fecVencimiento,$codSeguridad);
                if(!$retorno){
                    echo "<script>
                            Swal.fire({
                                title: 'Error',
                                text: 'Error al agregar el metodo de pago',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            });
                        </script>";
                }
                
                $email = recogePost("email");
                $pais = recogePost("pais");
                $localidad = recogePost("localidad");
                $codPostal = recogePost("codPostal");
                $telefono = recogePost("telefono");

                $retorn2 = InsertarFacturacion($Correo,$numTarjeta, $pais,$codPostal,$telefono,$email);
                if(!$retorno){
                    echo "<script>
                            Swal.fire({
                                title: 'Error',
                                text: 'Error al agregar la facturacion',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            });
                        </script>";
                }

                $pago = PagarEncargo($codEncargo);
                if(!$pago){
                    echo "<script>
                            Swal.fire({
                                title: 'Error',
                                text: 'Error al cambiar el estado de pago',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            });
                        </script>";
                }

                header("Location: ../HistorialC/Index.php");
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
    <div class="container">
            <div class="row row-Card">
                <div class="col col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card card-Proyecto">
                        <div class="card-header card-header-Proyecto">
                            <div class="row">
                                <div class="col-2">
                                    <a class="text-white" href="../PagosM/Index.php" style="font-size: 32px;"><i class="fa-solid fa-backward"></i></a>
                                </div>
                                <div class="col-8">
                                    <h2 class="text-black font-weight-bold text-center">Agregar Metodo de Pago</h2>
                                </div>
                            </div>
                        </div>
                        <form method="post">
                        
                            <div class="card-body card-body-Proyecto" style="overflow-y: auto">
                                <div class="container">
                                    <div class="row mb-2">
                                        <div class="col-4">
                                            <label for="numTarjeta"  class="ml-2" >Numero de Tarjeta       </label>
                                            <input type="number" required style="width: 100%;" class="m-1" name="numTarjeta" id="numTarjeta" onchange="checkFirstDigit()"> 
                                        </div>    
                                        <div class="col-3">
                                            <label >Fecha de Caducidad</label>
                                            <input type="number" required class="m-1" style="width: 40%;" oninput="validarLongitud(this, 2)"  name="caducidad_1" placeholder="Mes"> 
                                            <input type="number" required class="m-1" style="width: 40%;" oninput="validarLongitud(this, 2)" name="caducidad_2" placeholder="Año"> 
                                        </div> 
                                        <div class="col-3">
                                            <label for="codSeguridad">Codigo de Seguridad</label>
                                            <input type="number" required class="m-1" style="width: 40%;" oninput="validarLongitud(this, 4)" name="codSeguridad" > 
                                        </div>      
                                    </div>
                                    <div class="row text-center ">
                                        <div class="col-2">
                                            <button id="visaBtn" class="btn" disabled>Visa</button>
                                        </div> 
                                        <div class="col-2">
                                            <button id="mastercardBtn" class="btn" disabled>MasterCard</button>
                                        </div> 
                                        

                                    </div>
                                </div>
                                <br>
                                <div class="col-12">
                                    <h2 class="text-black font-weight-bold text-center">Informacion de Facturacion de la Tarjeta</h2>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row p-0 mb-2">
                                            <div class="col-5">
                                                <label for="nombre" >Nombre</label>
                                                <input type="text" required style="width: 100%;" class="m-1 " name="nombre" >
                                            </div>
                                            <div class="col-5">
                                                <label for="apellidos" >Apellidos</label>
                                                <input type="text" required style="width: 100%;" class="m-1" name="apellidos" > 
                                            </div>
                                        </div>
                                        <div class="row p-0 mb-2">
                                            <div class="row">
                                                <label for="email" >Direccion email de Facturacion</label>
                                                <input type="email" required style="width: 100%;" class="m-1" name="email" >
                                            </div>
                                            <div class="row">
                                                <label for="pais" >Pais</label>
                                                <input type="text" required style="width: 50%;" class="m-1" name="pais" > 
                                            </div>
                                            
                                            
                                        </div>
                                    </div> 
                                    <div class="col-4">
                                        <div>
                                            <label for="localidad" >Localidad</label>
                                            <input type="text" required style="width: 100%;" class="m-1" name="localidad" >
                                            <label for="codPostal" >Codigo postal o ZIP</label>
                                            <input type="text" required style="width: 100%;" class="m-1" name="codPostal" > 
                                            <label for="telefono" >Telefono</label>
                                            <input type="text" required style="width: 100%;" class="m-1" name="telefono" > 
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <label class="m-2">
                                    <input type="checkbox" class="m-2" id="guardarInfo" name="guardarInfo">Guardar mi informacion de pago para facilitar el proceso de pago la proxima vez
                                </label>
                            </div>
                            <div class="row">
                                <label class="m-2">
                                    Podras ver la informacion de tu compra antes de procesar
                                </label>
                            </div>
                            <div class="row align-content-right">
                                <div class="col-2">
                                    <button type="submit" class="btn btn-Proyecto" >Pagar</button>
                                </div>
                            </div>
                        </form>
                        <div class="card-footer">
                            <img src="../../img/bannerH.png" alt="BannerHorizontal" class="bannerH-img"/>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</main>
<?php
    include "../../include/templates/footer.php";
?>
