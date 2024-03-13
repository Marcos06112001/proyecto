
<?php
    $tituloPagina = "Creaciones Mari - Agregar Metodos de Pago";
    session_start();
    include "../../include/templates/headerPaginas.php";
    require_once "../../include/functions/recoge.php";
    try{
        
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
    <section>
        
    </section>
</main>
<?php
    include "../../include/templates/footer.php";
?>
