<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tabla de información</title>
    <link rel="stylesheet" href="../estilos/tabla_de_informacion.css">
</head>
<body>
    <?php
    if (isset($_GET['id']) && isset($_GET['tabla'])) {
        $id = $_GET['id'];
        $tabla = $_GET['tabla'];

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

            if ($tabla === 'vendedor') {
                $stmt = $pdo->prepare("SELECT * FROM vendedor WHERE id_vendedor = :id");
                $stmt->execute(['id' => $id]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                echo "<h1>Datos seleccionados (Tabla Vendedor)</h1>";
                echo "<table>";
                echo "<tr>";
                echo "<th>id_vendedor</th>";
                echo "<th>nombre1</th>";
                echo "<th>nombre2</th>";
                echo "<th>apellido1</th>";
                echo "<th>apellido2</th>";
                echo "<th>direccion</th>";
                echo "<th>tel_cel</th>";
                echo "<th>fk_pk_id_doc</th>";
                echo "<th>num_documento</th>";
                echo "<th>usuario</th>";
                echo "<th>clave</th>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>{$row['id_vendedor']}</td>";
                echo "<td>{$row['nombre1']}</td>";
                echo "<td>{$row['nombre2']}</td>";
                echo "<td>{$row['apellido1']}</td>";
                echo "<td>{$row['apellido2']}</td>";
                echo "<td>{$row['direccion']}</td>";
                echo "<td>{$row['tel_cel']}</td>";
                echo "<td>{$row['fk_pk_id_doc']}</td>";
                echo "<td>{$row['num_documento']}</td>";
                echo "<td>{$row['usuario']}</td>";
                echo "<td>{$row['clave']}</td>";
                echo "</tr>";
                echo "</table>";

                echo "<h2>Actualizar información</h2>";
                echo "<table>";
                echo "<tr>";
                echo "<form action='editar.php' method='post'>";
                echo "<input type='hidden' name='id' value='{$row['id_vendedor']}'>";
                echo "<input type='hidden' name='tabla' value='$tabla'>";
                echo "<td><label for='campo'>Campo a actualizar:</label></td>";
                echo "<td><input type='text' name='campo' id='campo'></td>";
                echo "<td><label for='nuevo_valor'>Nuevo valor:</label></td>";
                echo "<td><input type='text' name='nuevo_valor' id='nuevo_valor'></td>";
                echo "<td><input type='submit' name='actualizar_productos' class='submit' value='Actualizar'></td>";
                echo "</form>";
                echo "</tr>";
                echo "</table>";

                
            } elseif ($tabla === 'productos') {
                $stmt = $pdo->prepare("SELECT * FROM productos WHERE id_productos = :id");
                $stmt->execute(['id' => $id]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                echo "<h1>Datos seleccionados (Tabla Productos)</h1>";
                echo "<table>";
                echo "<tr>";
                echo "<th>id_productos</th>";
                echo "<th>nom_prod</th>";
                echo "<th>precio</th>";
                echo "<th>cantidad_stock</th>";
                echo "<th>observaciones</th>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>{$row['id_productos']}</td>";
                echo "<td>{$row['nom_prod']}</td>";
                echo "<td>{$row['precio']}</td>";
                echo "<td>{$row['cantidad_stock']}</td>";
                echo "<td>{$row['observaciones']}</td>";
                echo "</tr>";
                echo "</table>";

                echo "<h2>Actualizar información</h2>";
                echo "<table>";
                echo "<tr>";
                echo "<form action='editar.php' method='post'>";
                echo "<input type='hidden' name='id' value='{$row['id_productos']}'>";
                echo "<input type='hidden' name='tabla' value='$tabla'>";
                echo "<td><label for='campo'>Campo a actualizar:</label></td>";
                echo "<td><input type='text' name='campo' id='campo'></td>";
                echo "<td><label for='nuevo_valor'>Nuevo valor:</label></td>";
                echo "<td><input type='text' name='nuevo_valor' id='nuevo_valor'></td>";
                echo "<td><input type='submit' name='actualizar_productos' class='submit' value='Actualizar'></td>";
                echo "</form>";
                echo "</tr>";
                echo "</table>";

            } else {
                echo "Tabla no válida";
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        
    }
    ?>
</body>
</html>
