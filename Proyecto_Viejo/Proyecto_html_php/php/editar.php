<?php
if (isset($_POST['actualizar_vendedor']) || isset($_POST['actualizar_productos'])) {

    $host = 'localhost';
    $dbname = 'Proyecto';
    $username = 'root';
    $password = '';
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    try {
        $pdo = new PDO($dsn, $username, $password, $options);

        $id = $_POST['id'];
        $tabla = $_POST['tabla'];
        $campo = $_POST['campo'];
        $nuevo_valor = $_POST['nuevo_valor'];

        if ($tabla === 'vendedor') {
            if ($campo === 'clave') {
                $nuevo_valor = password_hash($nuevo_valor, PASSWORD_DEFAULT);
            }
            $stmt = $pdo->prepare("UPDATE vendedor SET $campo = :nuevo_valor WHERE id_vendedor = :id");
        } elseif ($tabla === 'productos') {
            $stmt = $pdo->prepare("UPDATE productos SET $campo = :nuevo_valor WHERE id_productos = :id");
        }

        $stmt->execute(['nuevo_valor' => $nuevo_valor, 'id' => $id]);

        header("Location: tabla_de_informacion_bd.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
