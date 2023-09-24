<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mostrar_imagen'])) {
    require_once("../php/mostrar_imagen.php");   
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Agregar'])){
    $a = $_POST['nombre_producto'];
    $b = $_POST['precio'];
    $c = $_POST['select_categoria'];
    $d = $_POST['select_peso'];
    $e = $_POST['cantidad_producto'];
    $f = $_POST['descripcion'];
    $g = $_POST['url_imagen_producto'];

    //if ($c === 'Frutas') {
    //$c = 1;
    //} elseif ($c === 'Verduras'){
    //$c = 2;
    //}

    //if ($d === 'Kilo') {
    //$d = 1;
    //} elseif ($d === 'Libra'){
    //$d = 2;
    //}

    require_once("../modelos/modelo_productos.php");

    $per = new registro($a,$b,$c,$d,$e,$f,$g);
    $per->abrir();
    $per->insertar();
    $per-> agregar_producto_exitoso();
}
?>