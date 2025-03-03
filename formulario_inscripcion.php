<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $numeroIdentificacion = $_POST['numeroIdentificacion'];
    $edad = $_POST['edad'];
    $genero = $_POST['genero'];
    $correo = $_POST['correo'];
    $numeroCelular = $_POST['numeroCelular'];
    $nombrePrograma = $_POST['nombrePrograma'];
    $semestre = $_POST['semestre'];
    $jornada = $_POST['jornada'];
    $materia1 = $_POST['materia1'];
    $materia2 = $_POST['materia2'];
    $materia3 = $_POST['materia3'];
    $materia4 = $_POST['materia4'];
    $materia5 = $_POST['materia5'];
    $materia6 = $_POST['materia6'];
    $materia7 = $_POST['materia7'];
    $fecha = $_POST['fecha'];

    $sql = "INSERT INTO FormularioInscripcion (Nombre, Apellido, NumeroIdentificacion, Edad, Genero, Correo, NumeroCelular, NombrePrograma, Semestre, Jornada, Materia1, Materia2, Materia3, Materia4, Materia5, Materia6, Materia7, Fecha)
    VALUES ('$nombre', '$apellido', '$numeroIdentificacion', '$edad', '$genero', '$correo', '$numeroCelular', '$nombrePrograma', '$semestre', '$jornada', '$materia1', '$materia2', '$materia3', '$materia4', '$materia5', '$materia6', '$materia7', '$fecha')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo registro creado con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

