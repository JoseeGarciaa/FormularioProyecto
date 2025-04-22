<?php
// Iniciar sesión para manejar futuras sesiones de usuario
session_start();

// Conexión usando variables de entorno (igual que tú tienes)
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

// Verificar si se recibió una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos enviados a través de POST y sanitizarlos
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($conn, $_POST['apellido']);
    $numeroIdentificacion = mysqli_real_escape_string($conn, $_POST['numeroIdentificacion']);
    $correo = mysqli_real_escape_string($conn, $_POST['correo']);
    $contrasena = mysqli_real_escape_string($conn, $_POST['contrasena']);
    $confirmarContrasena = mysqli_real_escape_string($conn, $_POST['confirmarContrasena']);

    // Verificar que las contraseñas coincidan
    if ($contrasena !== $confirmarContrasena) {
        echo "<div style='color:red; text-align:center;'>Las contraseñas no coinciden.</div>";
    } else {
        // Cifrar la contraseña antes de guardarla
        $contrasenaHash = password_hash($contrasena, PASSWORD_DEFAULT);

        // Verificar que no exista un usuario con la misma identificación o correo
        $checkSql = "SELECT * FROM usuarios WHERE numeroIdentificacion='$numeroIdentificacion' OR correo='$correo'";
        $result = $conn->query($checkSql);

        if ($result->num_rows > 0) {
            echo "<div style='color:red; text-align:center;'>El número de identificación o correo ya está registrado.</div>";
        } else {
            // Insertar nuevo usuario en la base de datos
            $sql = "INSERT INTO usuarios (nombre, apellido, numeroIdentificacion, correo, contrasena)
                    VALUES ('$nombre', '$apellido', '$numeroIdentificacion', '$correo', '$contrasenaHash')";

            if ($conn->query($sql) === TRUE) {
                echo "<div style='color:green; text-align:center;'>¡Registro exitoso! <a href='login.html'>Inicia sesión aquí</a></div>";
            } else {
                echo "<div style='color:red; text-align:center;'>Error al registrar usuario: " . $conn->error . "</div>";
            }
        }
    }

    // Cerrar la conexión
    $conn->close();
}
?>
