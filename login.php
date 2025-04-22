<?php
// Parámetros de conexión desde variables de entorno
$servername = getenv('DB_HOST');
$username = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$dbname = getenv('DB_NAME');
$port = getenv('DB_PORT');

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Iniciar sesión
session_start();

// Verificar si se recibió POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numeroDocumento = mysqli_real_escape_string($conn, $_POST['numero_documento']);
    $contrasena = mysqli_real_escape_string($conn, $_POST['contraseña']);

    // Consultar usuario en la base de datos
    $sql = "SELECT * FROM Usuarios WHERE numeroIdentificacion = '$numeroDocumento'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Obtener los datos del usuario
        $usuario = $result->fetch_assoc();

        // Verificar la contraseña
        if (password_verify($contrasena, $usuario['contrasena'])) {
            // Contraseña correcta, iniciar sesión
            $_SESSION['usuario'] = $usuario['numeroIdentificacion'];
            header('Location: dashboard.php');  // Redirigir al panel del usuario
            exit();
        } else {
            // Contraseña incorrecta
            echo "<div style='color:red; text-align:center;'>Contraseña incorrecta.</div>";
        }
    } else {
        // Usuario no encontrado
        echo "<div style='color:red; text-align:center;'>Usuario no encontrado.</div>";
    }

    $conn->close();
}
?>
