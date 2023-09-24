<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../estilos/1-estilo-proyecto.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        .submit {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idProducto = $_POST["id_producto"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Proyecto";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        $sql = "SELECT nom_prod FROM productos WHERE id_productos = $idProducto";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nombreProducto = $row["nom_prod"];

            echo "<h1>¿Está seguro de borrar el producto '$nombreProducto'?</h1>";
            echo "<form action='' method='post'>";
            echo "<input type='hidden' name='id_producto' value='$idProducto'>";
            echo "<button type='submit' class='submit' name='confirmar' value='1'>Confirmar</button>";
            echo "</form>";

            if (isset($_POST["confirmar"])) {
                $sql = "DELETE FROM productos WHERE id_productos = $idProducto";

                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('El producto se ha borrado correctamente.'); window.location.href = 'p-borrar-productos.php';</script>";
                    exit;
                } else {
                    echo "Error al borrar el producto: " . $conn->error;
                }
            }
        } else {
            echo "No se encontró el producto.";
        }

        $conn->close();
    } else {
        echo "Método de solicitud inválido.";
    }
    ?>
</body>
</html>
