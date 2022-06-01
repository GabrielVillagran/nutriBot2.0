<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/styleIndex.CSS" rel="stylesheet" type="text/css">
    <title>NutriBot</title>
</head>

<body>
    <div class="contenedorPrincicpal">
        <!-- Encabezado de pagina -->
        <div class="encabezadoPag">
            <!-- logo -->
            <div class="nutribot">
                <a href=#><img src="./img/logo.png" alt="imagen" width="200px" height="200px">
                </a>
            </div>
            <!-- botones de la pagina -->
            <div class="mainMenu">
                <button class="bttn menu" onclick="location.href='modifica.php'">Modifica Datos</button>
                <button class="bttn menu " onclick="location.href='index.php'">Buscar Receta</button>
                <button class="bttn menu " onclick="location.href='reviews.php'">Reviews de Nutribot</button>
                <button class="bttn menu " onclick="location.href='logout.php'">Cerrar Sesion</button>
            </div>
        </div>
            <!-- contenedor de recetarios -->
            <div class="container ">
             <header>
                    <form class="form ">
                        
                        <input
                         name="searchInput"
                         class="search-bar"
                         type="text"
                         autocomplete="off"
                         required
                     />
                      <button class="search-btn ">Search</button>
                      <!-- gif de preparacion -->
                      <div class="gifFood">
                        <img src="https://c.tenor.com/kwkIuLUZLUsAAAAi/cook-meal.gif"" alt="funny GIF" width="200px">
                      </div>
                   </form>
             </header>
             <!-- boton para realizar la busqueda -->
                <div class="recetarios"></div>
            </div>
        <!-- Pie de pagina -->
        <div class="piePag ">
            <!-- creador -->
            <div class="creador ">
                Villagran Saucedo Gabriel Aldair<br> a267572@alumnos.uaslp.mx
                <br> https://github.com/GabrielVillagran
            </div>
            <!-- profesor y materia -->
            <div class="asignatura ">
                Jose de Jesus Rodriguez Sanchez <br> <br> Fundamentos de Desarrollo Web
            </div>
            <!-- universidad -->
            <div class="university ">
                Universidad Autonoma de San Luis Potosi
            </div>
        </div>
    </div>
</body>
<footer>
    <script src="./JS/consultaAPI2.js "></script>
</footer>
</html>