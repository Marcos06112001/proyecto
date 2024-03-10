<?php
    $tituloPagina = "Creaciones Mari - Iniciar Sesion";
    session_start();
    include "../../include/templates/headerPaginas.php";
    require_once "../../include/functions/recoge.php";
    
?>
<main class="bg-Proyecto">
    <section th:fragment="contenedorVerMas" id="Foro" class="mt-5 mb-5">
        <th:block th:if="${comentarios.empty}">
            <div class="row" style="padding-left: 15%;">
                <div class="col-2">
                    <a class="text-dark" th:href="@{/foro}" style="font-size: 20px;"><i class="fa-solid fa-backward"></i></a>
                </div>
            </div>
            <div class="alert alert-info text-center" role="alert">
                No hay comentarios
            </div>
        </th:block>
        <th:block th:unless="${comentarios.empty}">

            <div class="row" style="padding-left: 15%;">
                <div class="col-2">
                    <a class="text-dark" th:href="@{/foro}" style="font-size: 32px;"><i class="fa-solid fa-backward"></i></a>
                </div>

                <div class="col-10">
                    <h2 class="text-black font-weight-bold" style="padding-left: 15%">Foro - Todos los Comentarios</h2>
                </div>
            </div>

            <div class="row "  style="padding-left: 15%;padding-right: 15%">
                <div class="col-6 mb-3" th:each="c : ${comentarios}">
                    <div class="card p-2 m-2" >
                        <div class="mt-3" style="padding-left: 15%;padding-right: 15%">
                            <div class="mb-3">
                                <label  for="txtNombre">Nombre que comenta:</label>
                                <input type="text" readonly="readonly" class="form-control" name="txtNombre" th:value="${c.usuarios.nombre  + ' ' + c.usuarios.apellido1  + ' ' + c.usuarios.apellido2 }" style="border-radius: 20px;"/>
                            </div>
                            <div class="mb-3">
                                <label for="txtDesc">Descripcion del Comentario:</label>
                                <textarea class="form-control" readonly="readonly" name="txtDesc" rows="10" style="border-radius: 20px; height: 350px">[[${c.comentario}]] </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </th:block>   
    </section>
</main>
<?php
    include "../../include/templates/footer.php";
?>