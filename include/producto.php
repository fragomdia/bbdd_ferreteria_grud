<?php

class Producto {
    private $codigo;
	private $seccion;
    private $nombre;
	private $fecha;
    private $pais;
	private $precio;

    function __Construct ($registro){
        $this->codigo = $registro['CODIGOARTICULO'];
        $this->seccion = $registro['SECCION'];
        $this->nombre = $registro['NOMBREARTICULO'];
        $this->fecha = $registro['FECHA'];
        $this->pais = $registro['PAISDEORIGEN'];
        $this->precio = $registro['PRECIO'];
    }

    function getCodigoProducto(){
        return $this->codigo;
    }
    function getSeccionProducto(){
        return $this->seccion;
    }
    function getNombreProducto(){
        return $this->nombre;
    }
    function getFechaProducto(){
        return $this->fecha;
    }
    function getPaisProducto(){
        return $this->pais;
    }
    function getPrecioProducto(){
        return $this->precio;
    }
    
    function setCodigoProducto($codigo){
        $this->codigo=$codigo;
    }
    function setSeccionProducto($seccion){
        $this->seccion=$seccion;
    }
    function setNombreProducto($nombre){
        $this->nombre=$nombre;
    }
    function setFechaProducto($fecha){
        $this->fecha=$fecha;
    }
    function setPaisProducto($pais){
        $this->pais=$pais;
    }
    function setPrecioProducto($precio){
        $this->precio=$precio;
    }
}

?>