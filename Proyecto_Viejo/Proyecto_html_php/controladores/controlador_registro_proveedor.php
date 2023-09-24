
<?php

    $a = $_POST['Primer_nombre'];
    $b = $_POST['Segundo_nombre'];
    $c = $_POST['Primer_apellido'];
    $d = $_POST['Segundo_apellido'];
    $e = $_POST['Direccion'];
    $f = $_POST['Tel_Cel'];
    $g = $_POST['Tipo_doc'];
    $h = $_POST['Num_doc'];
    $i = $_POST['Nom_usu'];
    $j = $_POST['Clave'];
    $k = $_POST['Num_local'];
    $clave_cifrada=password_hash($j,PASSWORD_DEFAULT);
    $j=$clave_cifrada;

    require_once("../modelos/modelo_registro.php");

    
    $per = new registro($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k);
    $per->verificar_usuario($i);
    $per->abrir();
    $per->insertar();
    $per->aviso_registro();
 
?>

