<?php

require '../vendor/autoload.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];

    $productosActualizar = new treda\productos;

    $resultado = $productosActualizar->mostrarPorId($id);

    if (!$resultado)
        header('Location: index.php');
} else {
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="../assets/css/stylesCrud.css">



    <title>CRUD PHP - TREDA SOLUTIONS</title>
</head>

<body>

    <!-- Just an image -->
    <nav class="navbar navbar-light bg-light mb-3">
        <a class="navbar-brand" href="#">
            <img src="../assets/images/logo_crud.jpg" width="30" height="30" alt="">
        </a>
        <h4 class="navbar-text text-gray">
            CRUD PHP - TREDA SOLUTIONS
        </h4>
    </nav>

    <div class="">
        <div class="card">
            <div class="card-header font-weight-bold text-info">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                </svg> Actualización de productos
            </div>
            <div class="card-body">
                <form action="accionesP.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php print $resultado['id'] ?>">
                    <div class="form-row">

                        <div class="form-group col-md-6 mx-auto text-center">
                            <?php
                            $foto = '../upload/' . $resultado['imagen'];

                            if (file_exists($foto)) {
                            ?>
                                <center>
                                    <img src="<?php print $foto; ?>" class="img-responsive" title="Imagen actual" width="200" height="200">
                                    <input type="file" class="form-control-file" id="" name="foto">
                                    <input type="hidden" name="foto_temp" id="imagen" value="<?php print $resultado['imagen'] ?>" required>
                                </center>
                            <?php } ?>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Nombre de producto</label>
                            <input type="text" class="form-control" value="<?php print $resultado['nombreP'] ?>" name="nombreP">

                            <label for="inputEmail4">Nombre de la tienda</label>
                            <input type="text" class="form-control" value="<?php print $resultado['nombreT'] ?>" name="nombreT">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Codigo SKU</label>
                            <input type="text" class="form-control" value="<?php print $resultado['SKU'] ?>" name="SKU">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Descripcion del producto</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="DescrP" id="DescrP" maxlength="40"><?php print $resultado['DescrP'] ?></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Valor</label>
                            <input type="text" class="form-control" value="<?php print $resultado['valor'] ?>" name="valor">
                        </div>
                    </div>

                    <input type="submit" class="btn btn-info btn-block m-0 font-weight-bold" name="accion" value="Actualizar producto"><br>

                    <a href="index.php" class="btn btn-outline-primary btn-sm">Volver</a>

                </form>

            </div>
        </div>
    </div>

    <script src="../assets/jquery/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>




</body>

</html>