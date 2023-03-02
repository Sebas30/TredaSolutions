<?php

require "../vendor/autoload.php";


$productos = new treda\productos;

if($_SERVER['REQUEST_METHOD'] ==='POST')
{
    if($_POST['accion']==='Agregar'){

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