
<?php


    
    $a = $_POST['Primer_nombre'];
    $b = $_POST['Segundo_nombre'];
    $c = $_POST['Primer_apellido'];
    $d = $_POST['Segundo_apellido'];
    $e = $_POST['Tel_Cel'];
    $f = $_POST['Tipo_doc'];
    $g = $_POST['Num_doc'];
    $h = $_POST['Nom_usu'];
    $i = $_POST['correo'];
    $j = $_POST['Clave'];
    $clave_cifrada=password_hash($j,PASSWORD_DEFAULT);
    $j=$clave_cifrada;

    require_once("../modelos/modelo_registro_persona.php");

    
    $per = new registro($a,$b,$c,$d,$e,$f,$g,$h,$i,$j);
    $per->verificar_usuario($h);
    $per->abrir();
    $per->insertar();
    $per->aviso_registro();


    
?>

