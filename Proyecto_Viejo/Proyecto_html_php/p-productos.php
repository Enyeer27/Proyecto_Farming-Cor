<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./estilos/1-estilo-proyecto.css">
    <style>
        .producto {
            margin-bottom: 200px;
            border-collapse: separate;
            border-spacing: 100px 100px;
        }
        .fila {
            display: flex;
            justify-content: space-between;
        }
        .celda {
            flex-basis: 30%;
        }
    </style>
</head>
<body>
    <table id="indice-menu">
        <tr>
            <td>
                <ul id="ul-menu">
                    <li class="li-menu"><a class="a-menu" href="../P-ingreso.html">INGRESAR</a></li>
                    <li class="li-menu"><a class="a-menu" href="../-registro.html">REGISTRARSE</a></li>
                    <li class="li-menu"><a class="a-menu" href="../P-contactanos.html">CONTACTANOS</a></li>
                </ul>
            </td>
        </tr>
    </table>

    <table id="logo-p-prods">
        <tr>
            <td class="logo" colspan="2">
                <span><strong>PRODUCTOS</strong></span>
            </td>
        </tr>
    </table>

    <table id="table-productos">
        <tr>
            <td id="c-categorias" colspan="2" class="td-productos">
                <label for=""><span><strong>CATEGORIAS</strong></span></label><br>
                <select name="" id="" class="submit">
                    <option value=""></option>
                    <option value="">Frutas</option>
                    <option value="">Verduras</option>
                </select>
            </td>
        </tr>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Proyecto";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        $sql = "SELECT nom_prod, precio, url_imagen, observaciones FROM productos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<tr><th>Información</th></tr>";

            $count = 0;

            while ($row = $result->fetch_assoc()) {
                if ($count % 3 === 0) {
                    echo "<tr class='fila'>";
                }

                echo "<td class='celda'>";
                echo "<strong>Nombre:</strong> " . $row["nom_prod"] . "<br>";
                echo "<strong>Precio:</strong> " . $row["precio"]," x Libra". "<br>";
                echo "<img src='" . $row["url_imagen"] . "' alt='Imagen del producto' style='max-width: 200px; max-height: 200px;'><br>";
                echo "<strong>Observaciones:</strong> " . $row["observaciones"];
                echo "</td>";

                if ($count % 3 === 2) {
                    echo "</tr>";
                }

                $count++;
            }

            if ($count % 3 !== 0) {
                echo "</tr>";
            }
        } else {
            echo "<tr><td>No se encontraron registros en la tabla 'Productos'.</td></tr>";
        }
        $conn->close();
        ?>
        <form action="P-agregar-producto.php" method="get">
            <tr>
                <td><button class="submit" type="submit">REGRESAR</button></td>
            </tr>
        </form>
    </table>
    
</body>
</html>
