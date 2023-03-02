<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="../assets/css/stylesCrud.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="#" data-toggle="modal" data-target="#exampleModal" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z" />
                </svg> Agregar producto</a>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-info" id="exampleModalLabel"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z" />
                            </svg> Registro de productos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mb-3">
                        <div class="d-flex justify-content-center">
                            <img src="../assets/images/form.png" class="img-fluid rounded-start" alt="..." width="300px">
                        </div>
                        <form action="accionesP.php" method="POST" class="form-inline" enctype="multipart/form-data">
                            <div class="form-row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Imagen</label>
                                    <input type="file" class="form-control-file" name="foto" id="foto" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Nombre de tienda</label>
                                    <input type="text" class="form-control" name="nombreT" id="nombreT" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlTextarea1">Nombre prodcuto</label>
                                    <input type="text" class="form-control" name="nombreP" id="nombreP" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Codigo SKU</label>
                                    <input type="text" class="form-control" name="SKU" id="codSKU" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Descripcion del producto</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="DescrP" id="DescrP" maxlength="40" ></textarea>

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Valor</label>
                                    <input type="text" class="form-control" name="valor" id="valor">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-info btn-block m-0 font-weight-bold" name="accion" value="Agregar">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header font-weight-bold">
                Tiendas y productos
            </div>
            <div class="card-body">
                <table id="example" class="table table-hover responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Imagen y Nombre de tienda</th>
                            <th>Nombre producto</th>
                            <th>Cod. SKU</th>
                            <th>Descripcion producto</th>
                            <th>Valor producto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        require '../vendor/autoload.php';

                        $productos = new treda\productos;

                        $info_productos = $productos->mostrarProductos();

                        $cantidad = count($info_productos);


                        if ($cantidad > 0) {
                            $c = 0;

                            for ($x = 0; $x < $cantidad; $x++) {
                                $item = $info_productos[$x];

                        ?>

                                <tr>
                                    <td>
                                        <a href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="">
                                                    <?php
                                                    $foto = '../upload/' . $item['imagen'];

                                                    if (file_exists($foto)) {
                                                    ?>
                                                        <center>

                                                            <img src="<?php print $foto; ?>" class="img-responsive avatar avatar-blue mr-3">

                                                        </center>

                                                    <?php } ?>
                                                </div>

                                                <div class="">
                                                    <p class="font-weight-bold mb-0"><?php print $item['nombreT'] ?></p>

                                                    <?php
                                                    if ($item['estado'] == 'on') {
                                                    ?>
                                                        <p class="badge badge-success badge-success-alt">
                                                            Tienda activa
                                                        </p>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <p class="badge badge-danger badge-danger-alt">
                                                            Tienda inactiva
                                                        </p>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td><?php print $item['nombreP'] ?></td>
                                    <td><?php print $item['SKU'] ?></td>
                                    <td><?php print $item['DescrP'] ?></td>
                                    <td>
                                        <div class="badge badge-danger badge-danger-alt"><?php print "$" . number_format($item['valor']) . " COP" ?></div>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-outline-info btn-sm" title="Editar registro"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg></a>
                                        <a href="" class="btn btn-outline-danger btn-sm" title="Borrar registro"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            </svg></a>
                                    </td>
                                </tr>
                            <?php
                                /* Aqui cerramos el ciclo for  */
                            }
                            /* En caso de que no se encuentren registros */
                        } else {

                            ?>
                            <tr>
                                <!-- Entonces mostrar en pantalla que no hay registro de productos -->
                                <div class="badge badge-danger badge-danger-alt">NO HAY REGISTROS</div>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <script src="../assets/jquery/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>

    <script src="../assets/js/validarFormCrud.js"></script>



</body>

</html>