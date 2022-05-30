<?php 
    session_start();

    if(isset($_SESSION['Rol'])){
        if( $_SESSION['Rol'] == 1){
            header("location: error.php");
        }
    }
?>
<p>bienvenido <?php echo $_SESSION['nombre']?></p>