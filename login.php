<!-- archivo que en conjunto con cad.php me permite realizar el log in de la pagina -->
<?php
require_once "cad.php";
session_start();

if (isset($_POST['nombre']) && isset($_POST['contra'])){
    $name = $_POST['nombre'];
    $password = $_POST['contra'];

    $cad = new CAD();

    if($cad->verificaUsuario($name, $password)){
        // variables de sesion para usuario y rol
        // autenticacion
        $_SESSION['nombre'] = $name;
        // autorizacion
        // 
        if(isset($_SESSION['rol'])){
            if( $_SESSION['rol'] == 1){
                header("location: admin.php");
            }
            else{
                header("location: index.php");
            }
        }
    }
}
unset($_POST['nombre']);
unset($_POST['contra']);
?>
<!-- estructura HTML -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriBot</title>
    <link href="CSS/style.CSS" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- contenedor principal -->
    <div class="container">
        <!-- Encabezado de pagina -->
        <div class="encabezadoPag">
            <!-- logo -->
            <div class="nutribot">
                <a href="./login.php"><img src="./img/logo.png" alt="imagen" width="200px" height="200px">
                </a>
            </div>
            <!-- botones de la pagina -->
            <div class="mainMenu">
                <button class="bttn menu" onclick="location.href='info.html'">Quienes somos</button>
                <!-- <button class="bttn menu">Buscar Receta</button> -->
                <!-- <button class="bttn menu">Reviews de Nutribot</button> -->
                <button class="bttn menu"  onclick="location.href='registros.php'">Crear Cuenta</button>

            </div>
        </div>
        <div class="loginContainer">
            <div class="formularios">
                <h1>Ingresa a nutribot</h1>
                <!-- inicio de sesion -->
                <form action="login.php" method="POST">
                    <input type="text" name= "nombre" placeholder="Escribe tu nombre de usuario">
                    <input type="password" name= "contra" placeholder="Escribe tu contraseña">
                    <input type="submit" value ="Inicia Sesion">
                </form>
            </div>
        </div>
        <!-- contenedor de recetas aleatorias -->
        <div class="contenedorRecetas">
            <div class="headerTxt">
                Bienvenido a nutribot, la aplicación de comida nutritivas que cambiara tu vida, prueba un menu distinto y nutritivo con solo un clic!!
            </div>
            <div class="descriptionTxt">
                Puedes probar nuestra aplicación sin necesidad de registrarte, da clic al boton para generar una receta proporcionada por uno de nuestros profesionales</div>
            <!-- boton que servira para hacer la consulta a la API -->
            <button class="buttonGetFood" id="get_meal">Obten tu receta ideal 🤖​🍔</button>
            <!-- por medio de query selector obtendremos acceso a los datos del API -->
            <!-- Nombre -->
            <div class="nombreComida">
                Nombre de platillo:
                <div mealName class="mealName"></div>
            </div>
            <!-- Pais o Area -->
            <div class="regionComida">
                Región del platillo:
                <div mealArea class="mealArea"></div>
            </div>
            <!-- category -->
            <div class="categoriaComida">
                Categoria de platillo:
                <div mealCategory class="mealCategory"></div>
            </div>
            <!-- tags -->
            <div class="tagsComida">
                Tags relacionados:
                <div mealTags class="mealTags"></div>
            </div>
            <!-- youtube video -->
            <div class="videoComida">
                Video tutorial:
                <div mealVideo class="mealVideo"></div>
            </div>
            <!-- imagen -->
            <div class="mealImg">
                <img src="https://cdn-icons-png.flaticon.com/512/1450/1450147.png" alt="imagen" id="mealImg" width="400px" height="400px">
            </div>
        </div>
        <!-- informacion nutrimental y su variacion de recetas -->
        <div class="contenedorInfo">
            <div class="titleSection">
                ¿Quieres probar algo diferente, pero sin perder tu receta original, echa un vistazo a las diferentes versiones de la receta?
            </div>
            <div class="recipes"></div>
        </div>
        <!-- Pie de pagina -->
        <div class="piePag">
            <!-- creador -->
            <div class="creador">
                Villagran Saucedo Gabriel Aldair<br> a267572@alumnos.uaslp.mx
                <br> https://github.com/GabrielVillagran
            </div>
            <!-- profesor y materia -->
            <div class="asignatura">
                Jose de Jesus Rodriguez Sanchez <br> <br> Fundamentos de Desarrollo Web
            </div>
            <!-- universidad -->
            <div class="university">
                Universidad Autonoma de San Luis Potosi
            </div>
        </div>
    </div>
</body>
<footer>
    <script src="./JS/consultaAPI1.js"></script>
</footer>
</html>
<!--  -->
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="login.php" method="POST">
    <span> Escribe tu nombre : </span>
    <input type="text" name= "nombre">
    <br>
    <span> Escribe tu contraseña </span>
    <input type="text" name= "contra">
    <br>
    <input type="submit" value ="Inicia Sesion">
    </form>
</body>
</html> -->
<!------------------------------------------------->