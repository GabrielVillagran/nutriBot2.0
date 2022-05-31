<!-- archivo utilizado como "principal" en el accedemos a las funcionalidades de la pagina -->
<?php

require_once "conexion.php";
class CAD
{
    // realizar la conexion a la BD
    public $con;
    // agregar datos (usuarios a la BD)
    // agrega usuario
    static public function agregaUsuario($name,$mail,$password,$diabetes,$hipertension,$peso, $estatura, $edad, $otra)
    {
        //Enviar a la base de datos
        $con = new Conexion(); //Establecer la conexion a la BD
        $con->_construct();
        // consulta a realizar 
        $query = $con->conectar()->prepare("INSERT INTO usuarios (nombre, correo, contra, diabetes, hipertension, peso, estatura, edad, otra) VALUE ('$name','$mail','$password','$diabetes','$hipertension','$peso', '$estatura', '$edad', '$otra')");
        if($query->execute())
        {
            // echo "El usuario ". $nombre. " se a agregado correctamente";
            echo '<script> alert("El usuario se a agregado correctamente, regresa al inicio para iniciar sesion") </script>';

        }
        else
        {
            // echo "Hubo un error";
            print_r($con->conectar()->errorinfo());
        }
    }
    // agrega comentario
    static public function agregaReview($name,$review, $id_usuario)
    {
        //Enviar a la base de datos
        $con = new Conexion(); //Establecer la conexion a la BD
        $con->_construct();
        // consulta a realizar 
        $query = $con->conectar()->prepare("INSERT INTO comment (nameComentario, comentario, id_usuarios) VALUE ('$name','$review', '$id_usuario')");
        if($query->execute())
        {
            // echo "El usuario ". $nombre. " se a agregado correctamente";
            echo '<script> alert("Comentario agregado con exito") </script>';

        }
        else
        {
            // echo "Hubo un error";
            print_r($con->conectar()->errorinfo());
        }
    }
// verificar si un usuario existe (log in)
    static public function verificaUsuario($nombre,$contraseña)
    {
        $con = new Conexion(); //Establecer la conexion a la BD
        $con->_construct();

        $query = $con->conectar()->prepare("SELECT * FROM usuarios WHERE nombre = '$nombre' and contra = '$contraseña'");
        if($query->execute())
        {
            //Un solo registro
            $row = $query->fetch(PDO::FETCH_NUM);
            if($row)
            {
                /*echo $row[0]." - ".$row[1]." - ".$row[3];*/
                $_SESSION['id_usuario']=$row[0];
                $_SESSION['rol']=$row[1];
                return true;
            }
            else
            {
                echo '<script> alert("Usuario no encontrado, por favor, registrese para seguir usando nutribot") </script>';
            }
        }
        else{
            return false;
        }
    }

    static public function modificaUsaurio($datosModificar,$idUsuario)
    {
        //Enviar a la base de datos
        $con = new Conexion(); //Establecer la conexion a la BD
        $con->_construct();
        $query = $con->conectar()->prepare("UPDATE usuario SET $datosModificar WHERE id_usuario = $idUsuario ");
        if($query->execute())
        {
            echo "el usuario".$idUsuario."se ha actualizado correctamente";
            return 1;

        }
        else
        {
            echo "Hubo un error";
            print_r($con->conectar()->errorinfo());
            return 0;
        }
    }
// trae usuarios y elimina los usuarios
    static public function traeUsuarios()
    {
        $con = new Conexion(); //Establecer la conexion a la BD
        $con->_construct();
        $query = $con->conectar()->prepare("SELECT * FROM usuarios");
        if($query->execute())
        {
            $datos=[];
            //Un solo registro
            while($row = $query->fetch(PDO::FETCH_ASSOC))
            {
                $datos[] = $row;
            }
            #print_r($datos);
            return $datos;
            
        }
        else{
            return false;
        }
    }

    static public function eliminaUsuario($idUsuario)
    {
        //Enviar a la base de datos
        $con = new Conexion(); //Establecer la conexion a la BD
        $con->_construct();
        $query = $con->conectar()->prepare("DELETE FROM usuarios WHERE id_usuario = $idUsuario ");
        if($query->execute())
        {
            
            return 1;

        }
        else
        {
            echo "Hubo un error";
            print_r($con->conectar()->errorinfo());
        }
    }
    // trae y elimina los comentarios
    static public function traeReview()
    {
        $con = new Conexion(); //Establecer la conexion a la BD
        $con->_construct();
        $query = $con->conectar()->prepare("SELECT * FROM comment");
        if($query->execute())
        {
            $datos=[];
            //Un solo registro
            while($row = $query->fetch(PDO::FETCH_ASSOC))
            {
                $datos[] = $row;
            }
            #print_r($datos);
            return $datos;
            
        }
        else{
            return false;
        }
    }

    static public function eliminaComentario($id_comentarios)
    {
        //Enviar a la base de datos
        $con = new Conexion(); //Establecer la conexion a la BD
        $con->_construct();
        $query = $con->conectar()->prepare("DELETE FROM comment WHERE id_comentarios = $id_comentarios");
        if($query->execute())
        {
            
            return 1;

        }
        else
        {
            echo "Hubo un error";
            print_r($con->conectar()->errorinfo());
        }
    }
 }

?>