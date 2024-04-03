<?php
    require_once "../../include/functions/recoge.php";
    require_once "../../DAL/usuarios.php";    

function contenedorPrincipal()
{ 
    $correo = $_SESSION["correoGlobal"];
    try{
        $usuario = ObtenerUnUsuarios($correo);
    }catch(Exception $e){
        $usuario = null;

    }
       
    ?>
    <section id="contenedorPrincipal">
        <div class="container">
            <form method="GET" action="Modifica.php" class="was-validated" enctype="multipart/form-data">
                <div class="row row-Card">
                    <div class="col col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card card-Proyecto">
                            <div class="card-header card-header-Proyecto">
                                <h2 class="text-black font-weight-bold text-center">Perfil</h2>
                            </div>
                            <div class="card-body card-body-Proyecto">
                                <div class="row col-12 mb-4">
                                    <?php if ($usuario['RUTA_IMAGEN'] == null) { ?>
                                        <img src="/img/perf.png" alt="FotoPerfil" class="img-fluid rounded-circle p-1" style="max-width: 150px; margin-left: 45%;"/>
                                    <?php } else { ?>
                                        <img src="<?php echo $usuario['RUTA_IMAGEN']; ?>" alt="FotoPerfil" class="img-fluid rounded-circle p-1" style="max-width: 150px; margin-left: 45%;"/>
                                    <?php } ?>
                                </div>
                                <div class="row col-12 mb-5">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" class="form-control" name="NOMBRE" value="<?php echo $usuario['NOMBRE']; ?>" style="border-radius: 20px;" readonly="readonly"/>
                                </div>
                                <div class="row col-12 mb-5">
                                    <label for="apellidos1">Primer Apellido:</label>
                                    <input type="text" class="form-control" name="APELLIDO_1" value="<?php echo $usuario['APELLIDO_1']; ?>" style="border-radius: 20px;" readonly="readonly"/>
                                </div>
                                <div class="row col-12 mb-5">
                                    <label for="apellido2">Segundo Apellido:</label>
                                    <input type="text" class="form-control" name="APELLIDO_2" value="<?php echo $usuario['APELLIDO_2']; ?>" style="border-radius: 20px;" readonly="readonly"/>
                                </div>
                                <div class="row col-12 mb-5">
                                    <label for="correo">Correo Electronico:</label>
                                    <input type="text" class="form-control" name="CORREO" value="<?php echo $usuario['CORREO']; ?>" style="border-radius: 20px;" readonly="readonly"/>
                                </div>
                                <div class="row col-12 text-center">
                                    <a href="Modifica.php" class="btn btn-Proyecto">
                                        <i class="fas fa-pencil"></i> Editar</a>
                                </div>
                            </div>
                            <div class="card-footer">
                                <img src="../../img/bannerH.png" alt="BannerHorizontal" class="bannerH-img"/>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
<?php }

function editarPerfil()
{
    
    $correo = $_SESSION["correoGlobal"];
    try{
        $usuario = ObtenerUnUsuarios($correo);
    }catch(Exception $e){
        $usuario = null;

    }
    ?>
    <section id="editarPerfil">
        <div class="container">
            <form method="POST" action="Modifica.php" class="was-validated" enctype="multipart/form-data">
                <input type="hidden" name="correo" value="<?php echo $usuario['CORREO']; ?>"/>
                <div id="details">
                    <div class="row row-Card">
                        <div class="col col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card card-Proyecto">
                                <div class="card-header card-header-Proyecto">
                                    <h2 class="text-black font-weight-bold text-center">Editar Perfil</h2>
                                </div>
                                <div class="card-body card-body-Proyecto" style="background: linear-gradient(to left, #F5BB97, white);">
                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="text-center">Editar Informacion de Perfil</h4>
                                            <div class="row col-12 mb-5">
                                                <label for="nombre">Nombre:</label>
                                                <input type="text" class="form-control" name="NOMBRE" value="<?php echo $usuario['NOMBRE']; ?>" style="border-radius: 20px;"/>
                                            </div>
                                            <div class="row col-12 mb-5">
                                                <label for="apellidos1">Primer Apellido:</label>
                                                <input type="text" class="form-control" name="APELLIDO_1" value="<?php echo $usuario['APELLIDO_1']; ?>" style="border-radius: 20px;"/>
                                            </div>
                                            <div class="row col-12 mb-5">
                                                <label for="apellido2">Segundo Apellido:</label>
                                                <input type="text" class="form-control" name="APELLIDO_2" value="<?php echo $usuario['APELLIDO_2']; ?>" style="border-radius: 20px;"/>
                                            </div>
                                            <div class="row col-12 mb-3">
                                                <label for="txtCorreo">Correo Electronico:</label>
                                                <input type="text" class="form-control" name="CORREO" value="<?php echo $usuario['CORREO']; ?>" disabled="disabled" required="true" style="border-radius: 20px;"/>
                                            </div>
                                            <div class="mb-3">
                                                <label for="txtContra">Contraseña:</label>
                                                <input type="password" class="form-control" name="txtContra" required="true" style="border-radius: 20px;"/>
                                            </div>
                                        </div>
                                        <div class="col-6 text-center">
                                            <div class="row col-12 mb-5">
                                                <h4>Agregar Imagen</h4>
                                                <div class="p-5">
                                                <center>
                                                        <label for="inputImagen" id="lblImg" class="agregarFotoPerf" style="cursor: pointer; display: block; background-size: cover; width: 150px; height: 133px;background-image: url('../../img/agregarImg.png');"></label>
                                                        <input type="file" onchange="readURL(this);" id="inputImagen" name="imagen" style="display:none;" />
                                                        <img id="blah" style="display: none;" />
                                                </center>
                                                </div>
                                            </div>
                                            <div class="row col-12">
                                                <div class="col-md-4 d-grid">
                                                    <a href="Index.php" class="btn btn-primary">
                                                        <i class="fas fa-arrow-left"></i> Cancelar
                                                    </a>
                                                </div>
                                                <div class="col-md-4 d-grid">

                                                </div>
                                                <div class="col-md-4 d-grid">
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fas fa-check"></i> Guardar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
<?php } ?>
