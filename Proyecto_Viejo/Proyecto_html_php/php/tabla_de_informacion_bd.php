<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tabla de información</title>
    <link rel="stylesheet" href="../estilos/tabla_de_informacion.css">
</head>
<body>
    <?php
    $loggedInUser = "JoseAh";
    ?>

    <table class="top-bar">
        <tr>
            <td>
                <ul class="menu-list2">
                <li class="li-menulist2"><a href="#">Configuración</a></li>
                <li class="li-menulist2"><a href="#">Mensajes</a></li>
                </ul>
            </td>
            
            <td class="user-name"><?php echo $loggedInUser; ?></td>
        </tr>
    </table>

    <div class="menu">
        <div class="user-box">
        <br>
            Admin
        </div>
        <ul class="menu-list">
            <li><a href="#">BUSCAR</a></li>
            <li><a href="#">REGISTROS</a></li>
            <li><a href="#">REPORTES</a></li>
        </ul>
    </div>
</body>
</html>




<!--<h1>Información de la tabla PRODUCTOS</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre del Producto</th>
            <th>Precio</th>
            <th>Categoría</th>
            <th>Cantidad en Stock</th>
            <th>Peso</th>
            <th>URL de la Imagen</th>
            <th>Observaciones</th>
            <th colspan="2">Acciones</th>
        </tr>
        <!-- ?php
        
        $stmt = $pdo->query("SELECT * FROM productos");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$row['id_productos']}</td>";
            echo "<td>{$row['nom_prod']}</td>";
            echo "<td>{$row['precio']}</td>";
            echo "<td>{$row['categoria_producto']}</td>";
            echo "<td>{$row['cantidad_stock']}</td>";
            echo "<td>{$row['peso']}</td>";
            echo "<td>{$row['url_imagen']}</td>";
            echo "<td>{$row['observaciones']}</td>";
            echo "<td><a href='borrar.php?id={$row['id_productos']}&tabla=productos' class='submit'>Borrar</a></td>";
            echo "<td><a href='seleccionar.php?id={$row['id_productos']}&tabla=productos' class='submit'>Seleccionar</a></td>";
            echo "</tr>"--;
        }
        ?>
    </table> -->

    <?php
/* 
$host = 'localhost';
$dbname = 'Proyecto';
$username = 'root';
$contraseña = ''; // Make sure to set the actual password here
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
$opciones = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $username, $contraseña, $opciones);

    $stmt = $pdo->query("SELECT * FROM vendedor");
    while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>{$fila['id_vendedor']}</td>";
        echo "<td>{$fila['nombre1']}</td>";
        echo "<td>{$fila['nombre2']}</td>";
        echo "<td>{$fila['apellido1']}</td>";
        echo "<td>{$fila['apellido2']}</td>";
        echo "<td>{$fila['direccion']}</td>";
        echo "<td>{$fila['tel_cel']}</td>";
        echo "<td>{$fila['fk_pk_id_doc']}</td>";
        echo "<td>{$fila['num_documento']}</td>";
        echo "<td>{$fila['usuario']}</td>";
        echo "<td>{$fila['clave']}</td>";
        echo "<td><a href='borrar.php?id={$fila['id_vendedor']}&tabla=vendedor'class='submit'>Borrar</a></td>";
        echo "<td><a href='seleccionar.php?id={$fila['id_vendedor']}&tabla=vendedor' class='submit'>Seleccionar</a></td>";
        echo "</tr>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
*/
?>
</table>


    