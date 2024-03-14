
<?php
    $tituloPagina = "Creaciones Mari - Menu Principal";
    session_start();
    include "../../include/templates/headerPaginas.php";
    require_once "../../include/functions/recoge.php";
    
    include "Fragmentos.php";

    try{

        if($_SERVER['REQUEST_METHOD'] == 'GET') 
        {
            require_once "../../include/functions/recoge.php";
            $estado = recogeGet("estado");
            if($estado == 1)
            {
                echo "<script>
                        Swal.fire({
                            title: 'Usuario Modificado',
                            text: 'Se modifico correctamente su usuario!',
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        });
                    </script>"; 
            }
        }
    }
    catch(Exception $e){
        error_log($e->getMessage());
    }


    contenedorPrincipal();       
    include "../../include/templates/footer.php";
?>