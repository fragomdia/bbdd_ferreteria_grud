<?php
require_once "producto.php";

class GestionBBDD {

    public static function realizarConexion() {   
        try {
            $conexion = new PDO("mysql:host=localhost; dbname=ferreteria","root", "");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER SET utf8");
            return $conexion;
        }
        catch(Exception $e)
        {
          echo "Error al realizar la conexión: " . $e->getMessage();
        }    	
    }

    public static function productos() {
        $sql="select * from productos;";
        $conexion=self::realizarConexion();
		$resultado=$conexion->query($sql);
	    $arra_productos=array();
        while ($fila=$resultado->fetch()){
            $arra_productos[]= new Producto($fila);
        }
        $resultado->closeCursor();
		$conexion=null;
		return ($arra_productos);
    }

    public static function eliminarProducto($codigo) {
        $sql = "delete from productos where codigoarticulo = :n_codigo;";
        $conexion=self::realizarConexion();
        $resultado=$conexion->prepare($sql);
		$resultado->execute(array(":n_codigo"=>$codigo));
        $resultado->closeCursor();
		$conexion=null;
    }

    public static function editarProducto($codOld, $seccion, $nombre, $fecha, $pais, $precio) {
        try {
            $sql="update productos set seccion = :n_seccion, nombrearticulo = :n_nombre, fecha = :n_fecha,paisdeorigen = :n_pais, precio = :n_precio where codigoarticulo = :n_codigo";
            //$sql = "update productos set seccion = '$seccion', nombrearticulo = '$nombre', fecha = '$fecha', paisdeorigen = '$pais', precio = '$precio' where codigoarticulo = '$codOld';";
            $conexion=self::realizarConexion();
		    $resultado=$conexion->prepare($sql);
            $afectados=$resultado->execute(array(":n_seccion"=>$seccion,":n_nombre"=>$nombre,":n_fecha"=>$fecha,":n_pais"=>$pais,":n_precio"=>$precio,":n_codigo"=>$codOld));
            $resultado->closeCursor();
		    $conexion=null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
    }

    public static function registroProducto($codigo, $seccion, $nombre, $fecha, $pais, $precio) {
        try {
            $sql="insert into productos values (:n_codigo, :n_seccion, :n_nombre, :n_fecha, :n_pais, :n_precio);";
            $conexion=self::realizarConexion();
		    $resultado=$conexion->prepare($sql);
            $afectados=$resultado->execute(array(":n_codigo"=>$codigo,":n_seccion"=>$seccion,":n_nombre"=>$nombre,":n_fecha"=>$fecha,":n_pais"=>$pais,":n_precio"=>$precio));
            $resultado->closeCursor();
		    $conexion=null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>