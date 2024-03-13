<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:th="http://www.thymeleaf.org">
<head th:replace="~{Layout/_Layout :: head}">
    <title>Creaciones Mari - Menu Principal</title>
</head>
<body class="bg-Proyecto">
   <header th:replace="~{Layout/_Layout :: headerPaginas}"></header>
    <section th:replace="~{Galeria/Fragmentos :: filtros}"></section>
    <section th:replace="~{Galeria/fragmentos :: listadoGaleria}"></section>
    <footer th:replace="~{Layout/_Layout :: footer}"></footer>
</body>
</html>
