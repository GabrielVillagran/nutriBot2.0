<?php
require_once "CAD.php";
//              nombre                     correo                   contra                      diabetes                hipertension                                peso                    estatura                       edad                     otra
if(isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['contra'])  && isset($_POST['diabetes'])  && isset($_POST['hipertension'])  && isset($_POST['peso'])  && isset($_POST['estatura']) && isset($_POST['edad'])  && isset($_POST['otra']))
{
    $name = $_POST['nombre'];
    $mail = $_POST['correo'];
    $password = $_POST['contra'];
    $diabetes = $_POST['diabetes'];
    $hipertension = $_POST['hipertension'];
    $peso = $_POST['peso'];
    $estatura = $_POST['estatura'];
    $edad = $_POST['edad'];
    $otra = $_POST['otra'];

    $cad = new CAD();
    $cad->agregaUsuario($name,$mail,$password,$diabetes,$hipertension,$peso, $estatura, $edad, $otra);
}
else
{
    echo "No pude ingresar";
}
unset($_POST['nombre']);
unset($_POST['correo']);
unset($_POST['contra']);
unset($_POST['diabetes']);
unset($_POST['hipertension']);
unset($_POST['peso']);
unset($_POST['estatura']);
unset($_POST['edad']);
unset($_POST['otra']);
?>
<!-- estructura html -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/styleRegistro.CSS" rel="stylesheet" type="text/css">
    <title>NutriBot</title>
</head>

<body>
    <div class="contenedorPrincicpal">
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
                <!-- <button class="bttn menu">Buscar Receta</button>
                <button class="bttn menu">Reviews de Nutribot</button> -->
                <button class="bttn menu" onclick="location.href='registros.php'">Crear Cuenta</button>
            </div>
        </div>
        <!-- contenedor de informacion -->
        <div class="formularioRegistro">
            <div class="formTitle">Ingrese sus datos para crear una cuenta</div>
            <form action="registros.php" method="POST">
                <input class="textoForm" type="text" name= "nombre"  placeholder="Escribe tu nombre completo">
                <br><br>
                <input class="textoForm" type="email" name= "correo"  placeholder="Escribe tu correo electronico">
                <br><br>
                <input class="textoForm" type="password" name= "contra" placeholder="Escribe tu contraseña">
                <br><br>
                <input class="textoForm" type="text" name= "hipertension" placeholder="Padece usted hipertension">
                <br><br>
                <input class="textoForm" type="text" name= "diabetes" placeholder="Padece usted diebetes y que tipo">
                <br><br>
                <input class="texto2Form" type="number" name= "peso" placeholder="Escribe tu peso">
                <br><br>
                <input class="texto2Form" type="number" name= "estatura" placeholder="Escribe tu estatura">
                <br><br>
                <input class="texto2Form" type="number" name= "edad" placeholder="Escribe tu edad">
                <br><br>
                <input class="texto2Form" type="text" name= "otra" placeholder="padece algun otra enfermedad">
                <br><br>
                <input class="bttnRegistro" type="submit" value ="Registrate">
                <input class="bttnRegistro2" type="reset" value ="Borra todos los datos">
            </form>
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

</html>