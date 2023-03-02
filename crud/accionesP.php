<?php

require "../vendor/autoload.php";

    echo'<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">';
    echo'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';

$productos = new treda\productos;

if($_SERVER['REQUEST_METHOD'] ==='POST')
{
    if($_POST['accion']==='Agregar'){

        if(empty($_POST['nombreT']))
            exit("<script>alert('¡El campo nombre de tienda no puede estar vacio!');</script><script>window.location.href='index.php';</script>");

        if(empty($_POST['nombreP']))
            exit("<script>alert('¡El campo nombre de producto no puede estar vacio!');</script><script>window.location.href='index.php';</script>");

        if(empty($_POST['SKU']))
            exit("<script>alert('¡El campo codigo SKU no puede estar vacio!');</script><script>window.location.href='index.php';</script>");

        if(empty($_POST['DescrP']))
            exit("<script>alert('¡El campo Descripcion no puede estar vacio!');</script><script>window.location.href='index.php';</script>");

        if(empty($_POST['valor']))
            exit("<script>alert('¡El campo valor no puede estar vacio!');</script><script>window.location.href='index.php';</script>");


        if(preg_match('/^[+-]?[0-9]+$/', $_POST['valor']))
            exit("<script>alert('¡El campo valor no puede contener letras!');</script><script>window.location.href='index.php';</script>");

        $_params = array(
            'imagen'=> SubirFoto(),
            'nombreT'=>$_POST['nombreT'],
            'nombreP'=>$_POST['nombreP'],
            'SKU'=>$_POST['SKU'],
            'DescrP'=>$_POST['DescrP'],
            'valor' => $_POST['valor']

        );

        $rpt = $productos->registrarProducto($_params);

        if($rpt)
            header('location: index.php');
        else
            print 'Error al registrar el producto';

    }
}

function SubirFoto()
{ 
    $carpeta =__DIR__.'/../upload/';

    $archivo = $carpeta.$_FILES['foto']['name'];

    move_uploaded_file($_FILES['foto']['tmp_name'],$archivo);

    return $_FILES['foto']['name'];
    
}


?>