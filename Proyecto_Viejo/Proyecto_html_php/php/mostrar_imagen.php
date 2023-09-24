<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../estilos/1-estilo-proyecto.css">
    
</head>
<body>
    <table id="indice-menu">
        <tr>
            <td>
                <ul id="ul-menu">
                    <li class="li-menu"><a class="a-menu" href="../P-menu.html">INICIO</a></li>
                    <li class="li-menu"><a class="a-menu" href="../P-ingreso.html">INGRESAR</a></li>
                    <li class="li-menu"><a class="a-menu" href="../P-registro.html">REGISTRARSE</a></li>
                    <li class="li-menu"><a class="a-menu" href="../P-contactanos.html">CONTACTANOS</a></li>
                </ul>
            </td>
        </tr>
    </table>

    <table id="table-agregar-producto">
        <form action="../controladores/controlador_productos.php" method="post">
            <tr>
                <td class="logo" colspan="2" class="td-agregar-productos">
                    <span><strong>AGREGAR PRODUCTO</strong></span>
                </td>
            </tr>

            <tr>
                <td class="td-agregar-productos">
                    <span><strong>Nombre del producto</strong></span><br>
                    <input type="text" class="inputs" name="nombre_producto" maxlength="20" >
                </td>
                <td class="td-agregar-productos">
                    <span><strong>Precio</strong></span><br>
                    <input type="tel" class="inputs" name="precio" maxlength="20" value="$">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <span><strong>Categoria</strong></span><br>
                    <select name="select_categoria" class="inputs">
                        <option value=""></option>
                        <option value="Verduras">Verduras</option>
                        <option value="Frutas">Frutas</option>
                    </select>
                    <br>
                </td>
            </tr>

            <tr>
                <td colspan="2" class="td-agregar-productos"><span><strong>Cantidad(Stock)</strong></span><br>
                    <input type="number" maxlength="1000" min="1" step="" class="inputs" name="cantidad_producto" placeholder="Cantidad en numeros"><br>
                    <span><strong>Peso</strong></span><br>
                    <select name="select_peso" class="inputs">
                        <option value=""></option>
                        <option value="Kilo">Kilo</option>
                        <option value="Libra">Libra</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><span><strong>Foto-Img</strong></span><br></td>
            </tr>
            <tr>
                <td colspan="2" class="td-agregar-productos">
                    <input type="text" name="url_imagen_producto" class="inputs" placeholder="Ingrese la URL de la imagen."><br>
                    <input type="submit" class="submit" name="mostrar_imagen" value="Mostrar imagen">
                </td>
            </tr>

            <?php
            if (isset($_POST['mostrar_imagen'])) {
                $urlImagen = $_POST['url_imagen_producto'];
                echo "<tr>";
                echo "<td colspan='2' class='td-agregar-productos'>";
                echo "<div class='image-preview'>";
                echo "<img src='$urlImagen' alt='Imagen del producto' style='max-width: 100%; max-height: 100%;'>";
                echo "</div>";
                echo "</td>";
                echo "</tr>";
            }
            ?>

            <tr>
                <td colspan="2" class="td-agregar-productos"><span><strong>Descripcion</strong></span><br>
                    <textarea class="inputs" name="descripcion" cols="40" rows="5" maxlength="100" minlength="10" placeholder="Texto minimo de 10 caracteres inlcluyendo espacios en blanco.(Opcional)"></textarea>
                </td>
            </tr>

            <tr>
                <td colspan="2" class="td-agregar-productos">
                    <input type="submit" class="submit" name="Agregar" value="Agregar">
                </td>
            </tr>
        </form>
    </table>
</body>
</html>
