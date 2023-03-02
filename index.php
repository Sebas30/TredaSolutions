<?php
function multiplos($nums)
{
    $c = 0;
    for ($i = 1; $i < $nums; $i++) {
        if ($i % 3 == 0 || $i % 5 == 0) {
            $c += $i;
        }
    }
    return $c;
}

function invertirCadena($cadena)
{
    //Usamos la funcion propia de PHP strrev
    return strrev($cadena);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

    <title>Prueba logica</title>
</head>

<body>

    <div class="container col ">
        <div class="row">
            <div class="col-sm-4"><br>
                <div class="card shadow mb-3" style="width: 25rem;">
                    <div class="card-header">
                        <h4>Ejercicio #1</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Dado un número n encontrar todos los múltiplos de 3 y 5 menores al número dado, el
                            método debe retornar la suma de los múltiplos encontrados. Ejemplo: si el número
                            ingresado es 10, los múltiplos de 3 y 5 menores a 10 son: 3, 5, 6, 9, el resultado de la
                            función debe ser 23, debido a que es la suma de 3, 5, 6, 9.
                        </p>
                        <form action="index.php" method="POST" class="form">
                            <label>Ingresa un numero</label>
                            <input type="text" name="numeroN" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="1234">
                            <div>
                                <button type="submit" name="numeroSubmit" class="btn btn-primary mb-2">Validar</button>

                                <a href="index.php" class="btn btn-warning mb-2 text-white">Refrescar</a>
                            </div>
                        </form>
                        <h3 class="text-dark">
                            <?php
                            if (isset($_POST['numeroSubmit'])) {

                                $numeroN = $_POST['numeroN'];
                                if (is_numeric($numeroN)) {
                                    echo multiplos($numeroN);
                                } else {
                            ?> <h3 class="text-danger">Ingrese solo numeros</h3> <?php }
                                                                            } ?>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"><br>
                <div class="col-sm-4"><br>
                    <div class="card shadow mb-3" style="width: 25rem;">
                        <div class="card-header">
                            <h4>Ejercicio #2</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Dada una frase, devolver la frase donde las palabras con mayor a 5 letras estén al
                                revés. Ejemplo: Dado “Bienvenido a Treda Solutions” retornar “odinevneiB a Treda
                                snoituloS”
                            </p>
                            <form action="index.php" method="POST" class="form">
                                <label>Ingresa una frase o letra</label>
                                <input type="text" name="cadenaText" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Bienvenido a Treda Solutions">
                                <div>
                                    <button type="submit" name="cadenaSubmit" class="btn btn-primary mb-2">Invertir texto</button>

                                    <a href="index.php" class="btn btn-warning mb-2 text-white">Refrescar</a>
                                </div>
                            </form>
                            <h3 class="text-dark">
                                <?php
                                if (isset($_POST['cadenaSubmit'])) {
                                    $cadenaText = $_POST['cadenaText'];
                                    if (strlen($cadenaText) >= 5) {
                                        echo invertirCadena($cadenaText);
                                    } else {
                                ?> <h5 class="text-danger">La cadena no cumple con la cantidad establecida, debe de ser mayor o igual a 5</h5> <?php }
                                                                                                                                        } ?>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"><br>
                <div class="card shadow mb-3" style="width: 25rem;">
                    <div class="card-header">
                        <h4>Prueba SQL (Reporte 1)</h4>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <img src="pruebaSQL/reporte1.png" width="200" class="rounded" alt="reporte 1">
                        </div>
                        <a href="pruebaSQL/reporte1.sql" class="btn btn-primary mb-2 text-white" download>Descargar SQL reporte 1</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"><br>
                <div class="card shadow mb-3" style="width: 25rem;">
                    <div class="card-header">
                        <h4>Prueba SQL (Reporte 2)</h4>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <img src="pruebaSQL/reporte2.png" width="200" class="rounded" alt="reporte 2">
                        </div>
                        <a href="pruebaSQL/reporte2.sql" class="btn btn-primary mb-2 text-white" download>Descargar SQL reporte 2</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"><br>
                <div class="card shadow mb-3" style="width: 25rem;">
                    <div class="card-header">
                        <h4>CRUD</h4>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <img src="assets/images/crud treda.png" width="200" class="rounded" alt="reporte 2">
                        </div>
                        <a href="crud" class="btn btn-primary mb-2 text-white" target="_blank">visualizar crud</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>