<?php
session_start();
require_once "CAD.php";
     
    $datosModificar='';
    $bandContra=false;
    $bandCorreo=false;
    $bandNombre=false;
    $bandDiabetes=false;
    $bandHipertension=false;
    $bandPeso=false;
    $bandEstatura=false;
    $bandEdad=false;
    $bandOtra=false;

    // El usuario quiso modificar la contraseña
    if(isset($_POST['contra']))
    {
        if($_POST['contra'] != '')
        {
            $contra = $_POST['contra'];
            $datosModificar = "contra= '$contra'";
            $bandContra =true;
        }
    }
    // El usuario quiso modificar el correo
    if(isset($_POST['correo']))
    {
        if($_POST['correo'] != '')
        {
            $correo = $_POST['correo'];
            if($bandContra)
            {
                $aux = $datosModificar;
                $datosModificar = "correo= '$correo',".$aux;
                
            }
            else
            {
                $datosModificar = "correo= '$correo'";
            }
            $bandCorreo =true;

        }
 
    }
    #El usuario quiso modificar el nombre
    if(isset($_POST['nombre']))
    {
        if($_POST['nombre'] != '')
        {
            $nombre = $_POST['nombre'];
            if($bandContra || $bandCorreo)
            {
                $aux = $datosModificar;
                $datosModificar = "nombre= '$nombre',".$aux;
            }
            else
            {
                $datosModificar = "nombre= '$nombre'";

            }
            $bandNombre =true;
        }
    }
    #El usuario quiso modificar su estado de diabetes
    if(isset($_POST['diabetes']))
    {
        if($_POST['diabetes'] != '')
        {
            $diabetes = $_POST['diabetes'];
            if($bandContra || $bandCorreo)
            {
                $aux = $datosModificar;
                $datosModificar = "diabetes= '$diabetes',".$aux;
            }
            else
            {
                $datosModificar = "diabetes= '$diabetes'";
            }
            $bandDiabetes =true;
        }
    }
    #El usuario quiso modificar su estado de hipertension
    if(isset($_POST['hipertension']))
    {
        if($_POST['hipertension'] != '')
        {
            $hipertension = $_POST['hipertension'];
            if($bandContra || $bandCorreo)
            {
                $aux = $datosModificar;
                $datosModificar = "hipertension= '$hipertension',".$aux;
            }
            else
            {
                $datosModificar = "hipertension= '$hipertension'";
            }
            $bandHipertension =true;
        }
    }
    #El usuario quiso modificar su peso
    if(isset($_POST['peso']))
    {
        if($_POST['peso'] != '')
        {
            $peso = $_POST['peso'];
            if($bandContra || $bandCorreo)
            {
                $aux = $datosModificar;
                $datosModificar = "peso= '$peso',".$aux;
            }
            else
            {
                $datosModificar = "peso= '$peso'";
            }
            $bandPeso =true;
        }
    }
    #El usuario quiso modificar su estatura
    if(isset($_POST['estatura']))
    {
        if($_POST['estatura'] != '')
        {
            $estatura = $_POST['estatura'];
            if($bandContra || $bandCorreo)
            {
                $aux = $datosModificar;
                $datosModificar = "estatura= '$estatura',".$aux;
            }
            else
            {
                $datosModificar = "estatura= '$estatura'";
            }
            $bandEstatura =true;
        }
    }
    #El usuario quiso modificar su edad
    if(isset($_POST['edad']))
    {
        if($_POST['edad'] != '')
        {
            $edad = $_POST['edad'];
            if($bandContra || $bandCorreo)
            {
                $aux = $datosModificar;
                $datosModificar = "edad= '$edad',".$aux;
            }
            else
            {
                $datosModificar = "edad= '$edad'";
            }
            $bandEdad =true;
        }
    }
    #El usuario quiso modificar si tiene otra enfermedad
    if(isset($_POST['otra']))
    {
        if($_POST['otra'] != '')
        {
            $otra = $_POST['otra'];
            if($bandContra || $bandCorreo)
            {
                $aux = $datosModificar;
                $datosModificar = "otra= '$otra',".$aux;
            }
            else
            {
                $datosModificar = "otra= '$otra'";
            }
            $bandOtra =true;
        }
    }
    // echo $datosModificar."<br>";

    if($bandNombre || $bandCorreo|| $bandContra || $bandDiabetes  || $bandHipertension || $bandHipertension || $bandPeso || $bandEstatura || $bandEdad || $bandOtra)
    {
        $cad = new CAD();
        if($cad->modificaUsaurio($datosModificar,$_SESSION['id_usuario']))
        {
            $id_usuario= $_SESSION['id_usuario'];
            echo '<script> alert("Usuario modificado con exito") </script>';
        }
    }
    else
    {
        // echo 'No se ha actualizado nada';
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
    $datosModificar='';
?>
<!-- estructura html -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/styleModifica.CSS" rel="stylesheet" type="text/css">
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
                <button class="bttn menu" onclick="location.href='modifica.php'">Modifica Datos</button>
                <button class="bttn menu " onclick="location.href='index.php'">Buscar Receta</button>
                <button class="bttn menu " onclick="location.href='reviews.php'">Reviews de Nutribot</button>
                <button class="bttn menu " onclick="location.href='logout.php'">Cerrar Sesion</button>
            </div>
        </div>
        <!-- contenedor de informacion -->
        <div class="formularioRegistro">
            <div class="formTitle">Modifique el campo que desea (solamente podra modificar 1)</div>
            <form action="modifica.php" method="POST">
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
                <input class="bttnActualiza" type="submit" value ="Actualizar">
                <input class="bttnActualiza2" type="reset" value ="Borra todos los datos">
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