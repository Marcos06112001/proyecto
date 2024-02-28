<?php
    $tituloPagina = "Creaciones Mari - Registrarse";
    session_start();
    unset($_SESSION['correoGlobal']);
    include "../../include/templates/headerLogin.php";
    require_once "../../include/functions/recoge.php";
    
    try{
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require_once "../../DAL/usuarios.php";

            $Correo = recogePost("correoR");
            $Pass = recogePost("contrasenna");
            $PassR = recogePost("contrasennaR");
            $Nom = recogePost("nombre");
            $Ape1 = recogePost("apellido1");
            $Ape2 = recogePost("apellido2");
            
            if($Pass == $PassR){
                $passwordHash = password_hash($Pass, PASSWORD_BCRYPT);
                $result = InsertarUsuarios($Correo,$passwordHash,$Nom,$Ape1,$Ape2);
                if(!result){
                    echo "<script>
                            Swal.fire({
                                title: 'Error',
                                text: 'Hubo un error al insertar el Usuario',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            });
                        </script>";
                }
                else{
                    header("Location: Index.php");  
                }
            }
            else
            {
                echo "<script>
                    Swal.fire({
                        title: 'Contraseñas no coinciden',
                        text: 'Las contraseñas no coinciden. Intente de nuevo',
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    });
                </script>";
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
    <br/>
    <section>
        <div class="container">
            <div class="row row-Card">
                <div class="col col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card card-Proyecto">
                        <div class="card-header card-header-Proyecto">
                            <h2 class="text-black font-weight-bold text-center">Registrarse</h2>
                        </div>
                        <div class="card-body card-body-Proyecto">
                            <form method="post" id="formRegistrarse">
                                <div class="row col-12 mb-3">
                                    <img src="../../img/logo.png" alt="Logo" class="logo-img-Login" />
                                </div>
                                <div class="row col-12 mb-3">
                                    <label for="correo">Correo:</label>
                                    <input type="email" id="correoR" name="correoR" class="form-control" required="required" />
                                </div>
                                <div class="row col-12 mb-3">
                                    <label for="contrasenna">Contraseña:</label>
                                    <input type="password" id="contrasenna" name="contrasenna" class="form-control" required="required" />
                                </div>
                                <div class="row col-12 mb-3">
                                    <label for="contrasennaR">Repetir Contraseña:</label>
                                    <input type="password" id="contrasennaR" name="contrasennaR" class="form-control" required="required" />
                                </div>
                                <div class="row col-12 mb-3">
                                    <div class="col-4">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control" required="required" />
                                    </div>
                                    <div class="col-4">
                                    <label for="apellido1">Primer Apellido</label>
                                    <input type="text" id="apellido1" name="apellido1" class="form-control" required="required" />
                                    </div>
                                    <div class="col-4">
                                    <label for="apellido2">Segundo Apellido</label>
                                    <input type="text" id="apellido2" name="apellido2" class="form-control" required="required" />
                                    </div>
                                </div>
                                <br/>
                                <br/>
                                <div class="row col-12 text-center mb-4">
                                    <div class="col-6">
                                        <a href="Index.php" class="btn btn-Secon-Proyecto mx-auto">Regresar</a>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-Proyecto mx-auto">Registrarse</button>
                                    </div>
                                </div>
                            </form>
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
