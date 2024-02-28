<?php
    $tituloPagina = "Creaciones Mari - Iniciar Sesion";
    session_start();
    include "../../include/templates/headerMain.php";
    require_once "../../include/functions/recoge.php";
    
?>

<main class="bg-Proyecto">
    <section th:fragment="SectionMP">
            <div class="container">
                <div class="row">
                    <div class="col col-sm-12 col-md-12 col-lg-5 col-xl-5">
                        <div class="row col-12 mb-5 mt-5 mr-5">
                            <div class="card card-Proyecto" style="padding-left: 0; padding-right: 0;">
                                <div class="card-header card-header-Proyecto">
                                    <h4 class="text-black font-weight-bold text-center">¿Quiénes Somos?</h4>
                                </div>
                                <div class="card-body card-body-Proyecto">
                                    <p class="card-text">Somos una PYME que tiene como objetivo vender manualidades a medida del cliente. Entre los trabajos que realizamos por encargo están:</p>
                                    <ul>
                                        <li>Amigurumis o muñecos tejidos a mano</li>
                                        <li>Aretes</li>
                                        <li>Pulseras / Brazaletes</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row col-12 mb-5 mt-5 mr-5">
                            <h5>Nuestros Trabajos</h5>
                            <a th:href="@{/galeria}" class="btn btn-Proyecto">Ver más</a>
                        </div>
                    </div>
                    <div class="col col-sm-12 col-md-12 col-lg-2 col-xl-2">
                        <img th:src="@{/img/bannerV.png}" alt="BannerVertical" class="bannerV-img"/>
                    </div>
                    <div class="col col-sm-12 col-md-12 col-lg-5 col-xl-5">
                        <div class="row col-12 m-5">
                            <h5>Primeros pasos crochet</h5>
                            <iframe width="400" 
                                    height="300" 
                                    src="https://www.youtube.com/embed/4wZS3_f6stE" 
                                    title="Crochet para principiantes: Primeros pasos, nudo de inicio y cadenas." 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"></iframe>
                        </div>
                        <div class="row col-12 pt-5 m-5">
                            <div class="card card-Proyecto" style="padding-left: 0; padding-right: 0;">
                                <div class="card-header card-header-Proyecto">
                                    <h4 class="text-black font-weight-bold text-center">¿Nuestra Visión?</h4>
                                    <h5 class="card-title"></h5>
                                </div>
                                <div class="card-body card-body-Proyecto">
                                    <p class="card-text">La visión de la empresa Creaciones Maricel es ser líder en la 
                                                                    creación de accesorios y peluches personalizados de alta 
                                                                    calidad, ofreciendo una amplia variedad de productos y un 
                                                                    servicio al cliente excepcional. Buscan ser reconocidos por 
                                                                    su creatividad, originalidad y excelencia en la producción de sus 
                                                                    productos, además de ser una marca preferida por los clientes 
                                                                    en el mercado nacional.</p>
                                    
                                </div>
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