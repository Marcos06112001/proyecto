<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>TechShop</title>
</head>
<body>
    <!-- 1 Sección principal para mostrar la información de las categorías -->
    <section id="categorias">
        <div class="row py-4">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/pruebas/listado">Todas</a>
                </li>
                <li th:each="categoria : ${categorias}" class="nav-item">
                    <a class="nav-link" href="/pruebas/listado/" + ${categoria.idCategoria}>${categoria.descripcion}</a>
                </li>
            </ul>
        </div>
    </section>

    <!-- 2 Sección principal para mostrar la información de la entidad producto -->
    <section id="galeria">
        <div class="row">
            <div class="col-4 mb-3" th:each="p : ${productos}">
                <div class="card p-2 m-2">
                    <figure><img th:src="@{${p.rutaImagen}}" class="card-img-top content-center" alt="..." height="400px" style="width: 100%;"/>
                        <figcaption>
                            <span th:switch="${p.tipoDiseno}">
                                <span th:case="'A'" class="text-success">Amigurumis</span>
                                <span th:case="'B'" class="text-success">Bisuteria</span>
                            </span>
                        </figcaption>
                    </figure>
                    <div class="card-header">
                        <h4 class="card-title">${p.nomDiseno}</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">${p.desDiseno}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3 Sección para crear los filtros -->
    <section>
        <div class="row py-2">
            <div class="col-md-1"></div>
            <div class="col-md-3 col-lg-12 m-3">
                <form method="POST" action="/galeria/query2" class="was-validated">
                    <div class="row">
                        <div class="mb-3 col-5">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre"/>
                        </div>
                        <div class="mb-3 col-5">
                            <label for="tipo">Tipo</label>
                            <select class="form-control" id="slcTipo" name="tipo">
                                <option value="T">Todos</option>
                                <option value="A">Amigurumis</option>
                                <option value="B">Bisuteria</option>
                            </select>
                        </div>
                        <div class="col-2 text-center">
                            <button type="submit" class="btn btn-info mt-4">
                                <i class="fas fa-check"></i> Consultar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
