<?php
    require_once "CAD.php";
?>
<!-- html -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/styleAdmin.CSS" rel="stylesheet" type="text/css">
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
                <button class="bttn menu" onclick="location.href='admin.php'">Administrador</button>
                <button class="bttn menu " onclick="location.href='logout.php'">Cerrar Sesion</button>
            </div>
            <!-- muestra y elimina usuarios -->
            <div class="containerEliminaUsuario">
                <p>Elimina usuario</p>
            <?php
                    $cad = new CAD();
                        if(isset($_GET['id_usuario']))
                        {
                            #cad -> Elimina Usuario
                            if($cad->eliminaUsuario($_GET['id_usuario']))
                             {
                                 echo "Usuario Eliminado";
                             }
                        }
                    $datos=$cad->traeUsuarios();
                if($datos)
                {
                    echo "<table border='1' cellpading='11' cellspacing='0'><tr>";
                    echo '<tr>';
                    echo "<th>id_usuario</th>";
                    echo "<th>rol</th>";
                    echo "<th>nombre</th>";
                    echo "<th>correo</th>";
                    echo "<th>contra</th>";
                    echo "<th>diabetes</th>";
                    echo "<th>hipertension</th>";
                    echo "<th>peso</th>";
                    echo "<th>estatura</th>";
                    echo "<th>edad</th>";
                    echo "<th>otra</th>";
                    echo "<th>Eliminar</th>";
                    echo '</tr>';
           
            foreach($datos as $registro)
            {
                        echo '<tr>';
                        $id_usuario=$registro['id_usuario'];
                        echo "<td>".$id_usuario."</td>";
                        echo "<td>".$registro['rol']."</td>";
                        echo "<td>".$registro['nombre']."</td>";
                        echo "<td>".$registro['correo']."</td>";
                        echo "<td>".$registro['contra']."</td>";
                        echo "<td>".$registro['diabetes']."</td>";
                        echo "<td>".$registro['hipertension']."</td>";
                        echo "<td>".$registro['peso']."</td>";
                        echo "<td>".$registro['estatura']."</td>";
                        echo "<td>".$registro['edad']."</td>";
                        echo "<td>".$registro['otra']."</td>";
                        echo "<td><a href='admin.php?id_usuario=$id_usuario'>Eliminar</a></t>";
                        echo '</tr>';
                    }
                    echo '</table>';
                    }
            ?> 
                </div>
            </div>
        <!-- muestra y elimina usuarios -->
            <div class="containerEliminaReview">
            <p>Elimina comentarios</p>
                 <?php
                    $cad = new CAD();
                        if(isset($_GET['id_comentarios']))
                        {
                            #cad -> Elimina Usuario
                            if($cad->eliminaComentario($_GET['id_comentarios']))
                             {
                                 echo "Review Eliminado";
                             }
                        }
                    $datos=$cad->traeReview();
                if($datos)
                {
                    echo "<table border='1' cellpading='4' cellspacing='0'><tr>";
                    echo '<tr>';
                    echo "<th>id_comentarios</th>";
                    echo "<th>id_usuarios</th>";
                    echo "<th>nameComentario</th>";
                    echo "<th>comentario</th>";
                    echo "<th>Eliminar</th>";
                    echo '</tr>';
           
            foreach($datos as $registro)
            {
                        echo '<tr>';
                        $id_comentarios=$registro['id_comentarios'];
                        echo "<td>".$id_comentarios."</td>";
                        echo "<td>".$registro['id_usuarios']."</td>";
                        echo "<td>".$registro['nameComentario']."</td>";
                        echo "<td>".$registro['comentario']."</td>";

                        echo "<td><a href='admin.php?id_comentarios=$id_comentarios'>Eliminar</a></t>";
                        echo '</tr>';
                    }
                    echo '</table>';
                    }
                    ?> 
                </div>
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