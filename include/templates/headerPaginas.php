<!DOCTYPE html>
<!--
-->
<html>
    <head>
        <title><?=$tituloPagina?></title>
        <meta charset="UTF-8"/>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <link href="../../img/favicon.png" type="image/png" rel="icon"/> 
        <link href="../../css/MainCSS.css" rel="stylesheet"/>

        <script src="https://kit.fontawesome.com/93180eb977.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="../../js/MainJS.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    </head>
    <body>
        <header class="header">
            <nav class="navbar navbar-expand-sm navbar-dark bg-Header-Proyecto p-0">
                <div class="container">
                    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <ul class="navbar-nav">
                            <li class="nav-item px-5"><a class="nav-menu-link nav-link" href="../../Pages/MenuPrincipal/Index.php">Inicio</a></li>
                            <li class="nav-item px-5"><a class="nav-menu-link nav-link" href="../../Pages/Galeria/Index.php">Galeria</a></li>
                            <li class="nav-item px-5"><a class="nav-menu-link nav-link" href="../../Pages/Foro/Index.php">Foro</a></li>
                            <li class="nav-item px-5">
                                <a class="nav-menu-link nav-link" href="../../Pages/MenuPrincipal/Index.php">
                                    <img src="../../img/logo.png" alt="Logo" class="logo-img" />
                                </a>
                            </li>
                            <li class="nav-item px-5"><a class="nav-menu-link nav-link" href="../../Pages/Encargos/Index.php">Encargos</a></li>
                            <li class="nav-item px-5"><a class="nav-menu-link nav-link" href="../../Pages/HistorialC/Index.php">Historial</a></li>
                            <li class="nav-item px-5">
                                <a class="nav-menu-link nav-link" href="../../Pages/Perfil/Index.php">
                                    <img src="https://firebasestorage.googleapis.com/v0/b/techshop-7645b.appspot.com/o/techshop%2Fusuarios%2Fimg0000000000000000004perfil1.jpg?alt=media&token=e67dfd3b-85d8-4d4e-8dc0-cdf182826b96" alt="Foto de Perfil" class="perfil-img" />
                                </a>
                            </li>
                            <li class="nav-item px-5">
                                <a class="nav-menu-link nav-link" href="../../Pages/Login/Index.php">
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        