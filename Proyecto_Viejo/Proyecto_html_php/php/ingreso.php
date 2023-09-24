<?php
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Proyecto";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM vendedor WHERE usuario = '$usuario'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $storedHash = $row['clave'];

    if (password_verify($clave, $storedHash)) {
        header("Location: ../P-vendedor.html");
        exit();
    } else {
        echo "<script>alert('Usuario y/o contraseña incorrectos');window.location='../P-ingreso.html'</script>";
        exit();
    }
} else {
    echo "<script>alert('Usuario y/o contraseña incorrectos');window.location='../P-ingreso.html'</script>";
    exit();
}

$conn->close();
?>
