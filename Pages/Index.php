<?php
    $tituloPagina = "Creaciones Mari - Iniciar Sesion";
    include "../include/templates/header.php";
    require_once "include/functions/recoge.php";
?>

<main class="bg-Proyecto">
    <br/>
    <?= IniciarSesion() ?>
</main>
        




<?php
    include "../include/templates/footer.php";
?>