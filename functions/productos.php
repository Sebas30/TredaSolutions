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
        $sql = "INSERT INTO productos (imagen, nombreT, nombreP, SKU, DescrP, valor) 
        VALUES (:imagen,:nombreT,:nombreP,:SKU,:DescrP,:valor)";

        $resultado = $this->cn->prepare($sql);


        $_array = array(
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
        $sql = "SELECT imagen, nombreT, nombreP, SKU, DescrP, valor, estado FROM productos";
        $resultado = $this->cn->prepare($sql);

        if ($resultado->execute())
            return $resultado->fetchAll();
     
        return false;
    }
}


?>