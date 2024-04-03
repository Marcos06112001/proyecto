
<?php
    $tituloPagina = "Creaciones Mari - Agregar Metodos de Pago";
    session_start();
    include "../../include/templates/headerPaginas.php";
    require_once "../../include/functions/recoge.php";
    try{
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $indEntrega = isset($_POST['guardarInfo']) ? 'S' : 'N';
            $numTarjeta = recogePost("numTarjeta");
            $caducidad1 = recogePost("caducidad_1");
            $caducidad2 = recogePost("caducidad_2");
            $codSeguridad = recogePost("codSeguridad");
            $nombre = recogePost("nombre");
            $apellidos = recogePost("apellidos");
            $email = recogePost("email");
            $pais = recogePost("pais");
            $localidad = recogePost("localidad");
            $codPostal = recogePost("codPostal");
            $telefono = recogePost("telefono");

            $codEncargo = $_SESSION['codEncargo'];

            if($indEntrega=="N")
            {
                $pago = PagarEncargo($codEncargo);
                header("Location: ../HistorialC/Index.php");
            }
            else
            {

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
                                            <input type="number" required style="width: 100%;" class="m-1" id="numTarjeta" onchange="checkFirstDigit()"> 
                                        </div>    
                                        <div class="col-3">
                                            <label >Fecha de Caducidad</label>
                                            <input type="number" required class="m-1" style="width: 40%;" oninput="validarLongitud(this, 2)"  id="caducidad_1" > 
                                            <input type="number" required class="m-1" style="width: 40%;" oninput="validarLongitud(this, 2)" id="caducidad_2" > 
                                        </div> 
                                        <div class="col-3">
                                            <label for="codSeguridad">Codigo de Seguridad</label>
                                            <input type="number" required class="m-1" style="width: 40%;" oninput="validarLongitud(this, 4)" id="codSeguridad" > 
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
                                                <input type="text" required style="width: 100%;" class="m-1 " id="apellidos" >
                                            </div>
                                            <div class="col-5">
                                                <label for="apellidos" >Apellidos</label>
                                                <input type="text" required style="width: 100%;" class="m-1" id="apellidos" > 
                                            </div>
                                        </div>
                                        <div class="row p-0 mb-2">
                                            <div class="row">
                                                <label for="email" >Direccion email de Facturacion</label>
                                                <input type="email" required style="width: 100%;" class="m-1" id="email" >
                                            </div>
                                            <div class="row">
                                                <label for="pais" >Pais</label>
                                                <input type="text" required style="width: 50%;" class="m-1" id="pais" > 
                                            </div>
                                            
                                            
                                        </div>
                                    </div> 
                                    <div class="col-4">
                                        <div>
                                            <label for="localidad" >Localidad</label>
                                            <input type="text" required style="width: 100%;" class="m-1" id="localidad" >
                                            <label for="codPostal" >Codigo postal o ZIP</label>
                                            <input type="text" required style="width: 100%;" class="m-1" id="codPostal" > 
                                            <label for="telefono" >Telefono</label>
                                            <input type="text" required style="width: 100%;" class="m-1" id="telefono" > 
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
                            <div class="col-10"></div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-Proyecto" >Pagar</button>
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
