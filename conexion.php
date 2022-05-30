<!-- archivo principal, en el puedo conectarme  a la BD -->
<?php

class Conexion
{
    #atributos
    private $host; //Localhost o IP
    private $db; //Nombre de la BD --> usuario
    private $usuario; // usuario  de la BD --> root
    private $pass; //Cintraseña
    private $charset; // utf8

    #Constructor
    public function _construct()
    {
        $this->host = "localhost";
        $this->db ="nutricion";
        // administrador y contra de 
        $this->usuario ="root";
        $this->pass='';
        $this->charset ="utf8";
    }
    #metodo Conectar
    public function conectar()
    {
        #Conectar a la BD ->PDO
        $com = "mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset;
        $enlace =new PDO($com,$this->usuario,$this->pass);
        // echo "La conexion se realizo con exito <br>";
        // print_r($enlace);
        return $enlace;
        
    }

}

$conexion = new Conexion();
$conexion->_construct();
$con=$conexion->conectar();



?>