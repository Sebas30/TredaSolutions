<?php


namespace treda;


class productos
{
    private $config;
    private $cn = null;

    public function __construct()
    {
        $this->config = parse_ini_file(__DIR__ . '../../config.ini');

        $this->cn = new \PDO($this->config['dns'], $this->config['usuario'], $this->config['clave'], array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
        ));
    }

    public function registrarProducto($_params)
    {
        $sql = "INSERT INTO productos (fecha,imagen, nombreT, nombreP, SKU, DescrP, valor) 
        VALUES (:fecha,:imagen,:nombreT,:nombreP,:SKU,:DescrP,:valor)";

        $resultado = $this->cn->prepare($sql);


        $_array = array(
            ":fecha" => $_params['fecha'],
            ":imagen" => $_params['imagen'], 
            ":nombreT" => $_params['nombreT'],
            ":nombreP" => $_params['nombreP'],
            ":SKU" => $_params['SKU'],
            ":DescrP" => $_params['DescrP'],
            ":valor" => $_params['valor'],
        );

        if ($resultado->execute($_array))
            return true; 


        return false;
    }

    public function mostrarProductos()
    {
        $sql = "SELECT id,fecha_tienda,imagen, nombreT, nombreP, SKU, DescrP, valor, estado FROM productos";
        $resultado = $this->cn->prepare($sql);

        if ($resultado->execute())
            return $resultado->fetchAll();
     
        return false;
    }

    public function mostrarPorId($id)
    {
        $sql = "SELECT * FROM productos WHERE id=:id";
        $resultado = $this->cn->prepare($sql);
        $_array = array(

            ":id" => $id
        );
        if ($resultado->execute($_array))
            return $resultado->fetch();


        return false;
    }

    public function actualizarproductos($_params)
    {
        $sql = "UPDATE productos SET imagen=:imagen,nombreT=:nombreT,nombreP=:nombreP,SKU=:SKU,DescrP=:DescrP,valor=:valor WHERE id=:id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":imagen" => $_params['imagen'], 
            ":nombreT" => $_params['nombreT'],
            ":nombreP" => $_params['nombreP'],
            ":SKU" => $_params['SKU'],
            ":DescrP" => $_params['DescrP'],
            ":valor" => $_params['valor'],
            ":id" => $_params['id'],
        );

        if ($resultado->execute($_array))
            return true;


        return false;
    }

    public function eliminarProducto($id)
    {
        $sql = "DELETE FROM productos WHERE id=:id ";
        $resultado = $this->cn->prepare($sql);

        $_array = array(

            ":id" => $id
        );

        if ($resultado->execute($_array))
            return true;


        return false;
    }
}



?>