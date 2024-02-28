<?php
function IniciarSesion()
{
?>
        <section>
            <div class="container">
                <div class="row row-Card">
                    <div class="col col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card card-Proyecto">
                            <div class="card-header card-header-Proyecto">
                                <h2 class="text-black font-weight-bold text-center">Iniciar Sesión</h2>
                            </div>
                            <div class="card-body card-body-Proyecto">
                                <form th:action="@{/login}" method="post">
                                    <div class="row col-12 p-4">
                                        <img th:src="@{/img/logo.png}" alt="Logo" class="logo-img-Login" />
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
                                            <a th:href="@{/registrar}" class="btn btn-Secon-Proyecto mx-auto">Registrarse</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <img th:src="@{/img/bannerH.png}" alt="BannerHorizontal" class="bannerH-img"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
}  
  
function Registrar(){
    ?>      
        <section>
            <div class="container">
                <div class="row row-Card">
                    <div class="col col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card card-Proyecto">
                            <div class="card-header card-header-Proyecto">
                                <h2 class="text-black font-weight-bold text-center">Registrarse</h2>
                            </div>
                            <div class="card-body card-body-Proyecto">
                                <form th:action="@{/register}" method="post">
                                    <div class="row col-12 mb-3">
                                        <img th:src="@{/img/logo.png}" alt="Logo" class="logo-img-Login" />
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
                                            <a th:href="@{/}" class="btn btn-Secon-Proyecto mx-auto">Regresar</a>
                                        </div>
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-Proyecto mx-auto">Registrarse</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <img th:src="@{/img/bannerH.png}" alt="BannerHorizontal" class="bannerH-img"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
}
?>