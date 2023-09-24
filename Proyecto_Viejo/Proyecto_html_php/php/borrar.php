<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../estilos/1-estilo-proyecto.css">
</head>
<body>
    
</body>
</html>
<?php

if (isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['tabla']) && !empty($_GET['tabla'])) {
    $id = $_GET['id'];
    $tabla = $_GET['tabla'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Proyecto";

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirmar'])) {

        $table = ($tabla === 'vendedor') ? 'vendedor' : 'productos';
        $idColumn = ($tabla === 'vendedor') ? 'id_vendedor' : 'id_productos';

        $stmt = $pdo->prepare("DELETE FROM $table WHERE $idColumn = ?");
        $stmt->execute([$id]);

        header("Location: tabla_de_informacion_bd.php");
        exit();
    }

    $table = ($tabla === 'vendedor') ? 'vendedor' : 'productos';
    $idColumn = ($tabla === 'vendedor') ? 'id_vendedor' : 'id_productos';

    $stmt = $pdo->prepare("SELECT * FROM $table WHERE $idColumn = ?");
    $stmt->execute([$id]);
    $registro = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($registro) {
    
        echo "<h1>¿Estás seguro de eliminar el registro con ID '{$registro[$idColumn]}'?</h1>";
        echo "<form method='POST'>";
        echo "<input type='submit' name='confirmar' value='Confirmar' class='submit'>";
        echo "</form>";
    } else {
        echo "El registro no existe";
    }
} else {
    echo "ID o tabla inválida";
}
?>
