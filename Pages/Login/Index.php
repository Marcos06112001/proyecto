

<?php
    $tituloPagina = "Creaciones Mari - Iniciar Sesion";
    session_start();
    unset($_SESSION['correoGlobal']);
    include "../../include/templates/headerLogin.php";
    require_once "../../include/functions/recoge.php";
    
    try{
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require_once "../../DAL/usuarios.php";

            $Correo = recogePost("correo");
            $Pass = recogePost("pass");

            //$passwordHash = password_hash($Pass, PASSWORD_BCRYPT);

            $User = ObtenerUnUsuarios($Correo);
            

            if($User == false)
            {
                echo "<script>
                        Swal.fire({
                            title: 'Credenciales Inválidos',
                            text: 'No existe un usuario con el correo digitado',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                    </script>";
            }else 
            {
                $auth = password_verify($Pass, $User['CONTRASENA']);
                if($auth)
                {
                    $_SESSION['correoGlobal'] = $Correo;
                    header("Location: ../MenuPrincipal/Index.php");
                }
                else{
                    echo "<script>
                        Swal.fire({
                            title: 'Credenciales Inválidos',
                            text: 'Los credenciales no coinciden',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                    </script>";
                }
                    

            }
        }
        else if ($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            $estado = recogeGet("estado");
            if($estado == 1)
            {
                echo "<script>
                        Swal.fire({
                            title: 'Usuario Registrado',
                            text: 'Se registró correctamente, proceda a Iniciar Sesión!',
                            icon: 'success',
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
                                <h2 class="text-black font-weight-bold text-center">Iniciar Sesión</h2>
                            </div>
                            <div class="card-body card-body-Proyecto">
                                <form method="post">
                                    <div class="row col-12 p-4">
                                        <img src="../../img/logo.png" alt="Logo" class="logo-img-Login" />
                                    </div>
                                    <div class="row col-12 p-4">
                                        <label for="correo">Correo:</label>
                                        <input type="email" id="correo" name="correo" class="form-control" required="required" />
                                    </div>
                                    <div class="row col-12 p-4">
                                        <label for="contrasenna">Contraseña:</label>
                                        <input type="password" id="pass" name="pass" class="form-control" required="required" />
                                    </div>
                                    <div class="row col-12 text-center p-5">
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-Proyecto mx-auto">Iniciar Sesión</button>
                                        </div>
                                        <div class="col-6">
                                            <a href="Registrarse.php" class="btn btn-Secon-Proyecto mx-auto">Registrarse</a>
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