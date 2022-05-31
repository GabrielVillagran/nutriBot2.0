<?php
session_start();
require_once "CAD.php";
//              nombre                     review
if(isset($_POST['nombre']) && isset($_POST['review']) )
{
    $name = $_POST['nombre'];
    $review = $_POST['review'];
    $cad = new CAD();
    $cad->agregaReview($name,$review,  $_SESSION['id_usuario']);
}
else
{
    // echo '<script> alert("Error al agregar comentario") </script>';
}
unset($_POST['nombre']);
unset($_POST['review']);
?>
<!-- html -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/styleReview.CSS" rel="stylesheet" type="text/css">
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
                <!-- <button class="bttn menu" onclick="location.href='info.html'">Quienes somos</button> -->
                <button class="bttn menu " onclick="location.href='index.php'">Buscar Receta</button>
                <button class="bttn menu " onclick="location.href='reviews.php'">Reviews de Nutribot</button>
                <button class="bttn menu " onclick="location.href='logout.php'">Cerrar Sesion</button>
            </div>
        </div>
        <!-- Formulario de reviews -->
        <div class="formularioReview">
            <div class="formTitle">Ingrese sus comentario para la plataforma</div>
            <form action="reviews.php" method="POST">
                <input class="textoForm" type="text" name= "nombre"  placeholder="Escribe tu nombre">
                <br><br>
            
                <div class="txtArea">
                    <textarea rows = "10" cols = "80" name = "review"></textarea>
                </div>
                <input class="bttnReview" type="submit" value ="Enviar">
                <input class="bttnReview2" type="reset" value ="Borrar">
            </form>
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
</html>