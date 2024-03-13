<?php echo '<!DOCTYPE html>'; ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>TechShop</title>
</head>
<body>
    <!-- 1 Sección principal para mostrar la informaccion de las categorias -->
    <section id="categorias">
        <div class="row py-4">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/pruebas/listado">Todas</a>
                </li>
                <?php foreach ($categorias as $categoria): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/pruebas/listado/<?php echo $categoria->idCategoria; ?>">
                            <?php echo $categoria->descripcion; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <?php foreach ($productos as $p): ?>
    <div class="col-4 mb-3">
        <div class="card p-2 m-2">
            <figure>
                <?php
                // Obtener el contenido de la imagen en base64
                $imagenCodificada = base64_encode(file_get_contents($p->rutaImagen));
                ?>
                <img src="data:image/jpeg;base64,<?php echo $imagenCodificada; ?>" class="card-img-top content-center" alt="..." height="400px" style="width: 100%;"/>          
                <figcaption>
                    <?php
                    switch ($p->tipoDiseno) {
                        case 'A':
                            echo '<span class="text-success">Amigurumis</span>';
                            break;
                        case 'B':
                            echo '<span class="text-success">Bisuteria</span>';
                            break;
                    }
                    ?>
                </figcaption>
            </figure>
            <div class="card-header">
                <h4 class="card-title"><?php echo $p->nomDiseno; ?></h4>
            </div>
            <div class="card-body">
                <p class="card-text"><?php echo $p->desDiseno; ?></p>
            </div> 
        </div>
    </div>
<?php endforeach; ?>
