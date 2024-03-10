
<?php
    $tituloPagina = "Creaciones Mari - Iniciar Sesion";
    session_start();
    include "../../include/templates/headerPaginas.php";
    require_once "../../include/functions/recoge.php";
    
?>
<main class="bg-Proyecto">
    <section id="Foro" class="mt-5 mb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 pr-0">
                            <div class="card" style="height: 100%;" >
                                <div class="card-header text-center" style="background-color: #FFD5BB;">
                                    <h4>Comentarios Anteriores</h4>
                                </div>
                                <div class="card-body" >

                                    <div class="mt-5" style="padding-left: 15%;padding-right: 15%">

                                        <th:block th:if="${comentarios.empty}">
                                            <div class="alert alert-info text-center" role="alert">
                                                No hay comentarios
                                            </div>
                                        </th:block>
                                        <th:block th:unless="${comentarios.empty}">
                                            <div class="mb-3">
                                                <label  for="txtNombre">Nombre que comenta:</label>
                                                <input type="text" readonly="readonly" class="form-control" name="txtNombre" th:value="${usuario.nombre + ' ' + usuario.apellido1 + ' ' + usuario.apellido2}" style="border-radius: 20px;"/>
                                            </div>
                                            <div class="mb-3">
                                                <label for="txtDesc">Descripcion del Comentario:</label>
                                                <textarea class="form-control" readonly="readonly" name="txtDesc" rows="10" style="border-radius: 20px; height: 350px">[[${comentarios[0].comentario}]] </textarea>
                                            </div>
                                            <div class="text-center">
                                                <a href="VerMasComentarios.php" class="btn-Proyecto btn-success btn">
                                                    <i class="fas fa-angle-double-right "></i> Ver mas</a>
                                            </div>
                                        </th:block>


                                    </div>

                                </div>


                            </div>
                        </div>
                        <div class="col-6 pl-0">
                            <div class="card" >
                                <div class="card-header text-center" style="background-color: #FFD5BB;">
                                    <h4>Deseas agregar un nuevo comentario?</h4>
                                </div>
                                <form th:action="@{/foro/guardar}" th:object="${foro}"
                                    method="POST" class="was-validated" enctype="multipart/form-data">
                                    <div class="card-body">

                                        <div class="m-5">
                                            <div class="mb-3">
                                                <label  for="txtNombre">Nombre que comenta:</label>
                                                <input type="text" disabled="disabled" class="form-control" th:value="${usuarioActual.nombre + ' ' + usuarioActual.apellido1 + ' ' + usuarioActual.apellido2}" name="correo" style="border-radius: 20px;"/>
                                            </div>
                                            <div class="mb-3">
                                                <label for="txtDesc">Descripcion del Comentario:</label>
                                                <textarea class="form-control" name="comentario" style="border-radius: 20px; height: 350px"> </textarea>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button class="btn-Proyecto btn-success btn" type="submit"> <i class="fas fa-add"></i>  Guardar</button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</main>
<?php
    include "../../include/templates/footer.php";
?>