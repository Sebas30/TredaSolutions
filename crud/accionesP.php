<?php

require "../vendor/autoload.php";

$productos = new treda\productos;

if($_SERVER['REQUEST_METHOD'] ==='POST')
{
    if($_POST['accion']==='Agregar'){

        if(empty($_POST['fecha']))
            exit("<script>alert('¡El campo fecha de apertura no puede estar vacio!');</script><script>window.location.href='index.php';</script>");

        if(empty($_POST['nombreT']))
            exit("<script>alert('¡El campo nombre de tienda no puede estar vacio!');</script><script>window.location.href='index.php';</script>");

        if(empty($_POST['nombreP']))
            exit("<script>alert('¡El campo nombre de producto no puede estar vacio!');</script><script>window.location.href='index.php';</script>");

        if(empty($_POST['SKU']))
            exit("<script>alert('¡El campo codigo SKU no puede estar vacio!');</script><script>window.location.href='index.php';</script>");

            $valorSKU = $_POST['SKU'];

            $info_productos = $productos->mostrarProductos();

            $cantidad = count($info_productos);

            if ($cantidad > 0) {
                $c = 0;

                for ($x = 0; $x < $cantidad; $x++) {
                    $item = $info_productos[$x];

                    if($valorSKU == $item['SKU'])
                        exit("<script>alert('¡El codigo SKU que dijito ya existe, intente con otro');</script><script>window.location.href='index.php';</script>");
                }
            }

        if(empty($_POST['DescrP']))
            exit("<script>alert('¡El campo Descripcion no puede estar vacio!');</script><script>window.location.href='index.php';</script>");

        if(empty($_POST['valor']))
            exit("<script>alert('¡El campo valor no puede estar vacio!');</script><script>window.location.href='index.php';</script>");

        $valorNum = $_POST['valor'];
        if(!preg_match('/^[0-9]+$/', $valorNum))
        exit("<script>alert('¡El campo valor no puede contener letras!');</script><script>window.location.href='index.php';</script>");

        $_params = array(
            'fecha'=>$_POST['fecha'],
            'imagen'=> SubirFoto(),
            'nombreT'=>$_POST['nombreT'],
            'nombreP'=>$_POST['nombreP'],
            'SKU'=>$_POST['SKU'],
            'DescrP'=>$_POST['DescrP'],
            'valor' => $_POST['valor'],

        );

        $rpt = $productos->registrarProducto($_params);

        if($rpt)
            header('location: index.php');
        else
            print 'Error al registrar el producto';

    }

    if($_POST['accion']==='Actualizar producto')
    {

        if(empty($_POST['nombreT']))
            exit("<script>alert('¡El campo nombre de tienda no puede estar vacio!');</script><script>window.location.href='index.php';</script>");

        if(empty($_POST['nombreP']))
            exit("<script>alert('¡El campo nombre de producto no puede estar vacio!');</script><script>window.location.href='index.php';</script>");

        if(empty($_POST['SKU']))
            exit("<script>alert('¡El campo codigo SKU no puede estar vacio!');</script><script>window.location.href='index.php';</script>");

            $valorSKU = $_POST['SKU'];

            $info_productos = $productos->mostrarProductos();

            $cantidad = count($info_productos);

            if ($cantidad > 0) {
                $c = 0;

                for ($x = 0; $x < $cantidad; $x++) {
                    $item = $info_productos[$x];

                    if($valorSKU !== $item['SKU']){
                        if($valorSKU == $item['SKU']){
                            exit("<script>alert('¡El codigo SKU que dijito ya existe, intente con otro');</script><script>window.location.href='index.php';</script>");

                        }
                    }
                }
            }

        if(empty($_POST['DescrP']))
            exit("<script>alert('¡El campo Descripcion no puede estar vacio!');</script><script>window.location.href='index.php';</script>");

        if(empty($_POST['valor']))
            exit("<script>alert('¡El campo valor no puede estar vacio!');</script><script>window.location.href='index.php';</script>");

        $valorNum = $_POST['valor'];
        if(!preg_match('/^[0-9]+$/', $valorNum))
        exit("<script>alert('¡El campo valor no puede contener letras!');</script><script>window.location.href='index.php';</script>");

        
        $_params = array(
            'nombreT'=>$_POST['nombreT'],
            'nombreP'=>$_POST['nombreP'],
            'SKU'=>$_POST['SKU'],
            'DescrP'=>$_POST['DescrP'],
            'valor' => $_POST['valor'],
            'id' => $_POST['id'],


        );

        if(!empty($_POST['foto_temp']))
        $_params['imagen'] = $_POST['foto_temp'];

        if(!empty($_FILES['foto']['name']))
            $_params['imagen'] = SubirFoto();
            

        $rpt = $productos->actualizarProductos($_params);

        if($rpt)
            header('location: index.php');
        else
            print 'Error al actualizar el producto';
    }
}

function SubirFoto()
{ 
    $carpeta =__DIR__.'/../upload/';

    $archivo = $carpeta.$_FILES['foto']['name'];

    move_uploaded_file($_FILES['foto']['tmp_name'],$archivo);

    return $_FILES['foto']['name'];
    
}

if($_SERVER['REQUEST_METHOD'] ==='GET'){

    $id = $_GET['id'];
    $rpt = $productos->eliminarProducto($id);

    if($rpt)
        header('location: index.php');
    else
        print 'Error al eliminar producto';


}


?>