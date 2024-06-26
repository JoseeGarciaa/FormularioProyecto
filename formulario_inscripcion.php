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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Inscripción</title>
    <script>
        function updateMaterias() {
            const programa = document.getElementById('nombrePrograma').value;
            const materias = {
                'Programa 1': ['Materia A', 'Materia B'],
                'Programa 2': ['Materia C', 'Materia D'],
                'Programa 3': ['Materia E', 'Materia F']
            };
            for (let i = 1; i <= 7; i++) {
                const materiaSelect = document.getElementById('materia' + i);
                materiaSelect.innerHTML = '';
                const defaultOption = document.createElement('option');
                defaultOption.value = '';
                defaultOption.text = 'Seleccione una materia';
                materiaSelect.appendChild(defaultOption);
                if (programa && materias[programa]) {
                    materias[programa].forEach(materia => {
                        const option = document.createElement('option');
                        option.value = materia;
                        option.text = materia;
                        materiaSelect.appendChild(option);
                    });
                }
            }
        }
    </script>
</head>
<body>
    <form action="" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required><br><br>

        <label for="numeroIdentificacion">Número de Identificación:</label>
        <input type="text" id="numeroIdentificacion" name="numeroIdentificacion" required><br><br>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" required><br><br>

        <label for="genero">Género:</label>
        <select id="genero" name="genero" required>
            <option value="Mujer">Mujer</option>
            <option value="Hombre">Hombre</option>
            <option value="Otro">Otro</option>
        </select><br><br>

        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" required><br><br>

        <label for="numeroCelular">Número de Celular:</label>
        <input type="text" id="numeroCelular" name="numeroCelular" required><br><br>

        <label for="nombrePrograma">Nombre del Programa:</label>
        <select id="nombrePrograma" name="nombrePrograma" onchange="updateMaterias()" required>
            <option value="">Seleccione un programa</option>
            <option value="Programa 1">Programa 1</option>
            <option value="Programa 2">Programa 2</option>
            <option value="Programa 3">Programa 3</option>
        </select><br><br>

        <label for="semestre">Semestre:</label>
        <input type="number" id="semestre" name="semestre" required><br><br>

        <label for="jornada">Jornada:</label>
        <select id="jornada" name="jornada" required>
            <option value="Diurna">Diurna</option>
            <option value="Nocturna">Nocturna</option>
            <option value="Mixta">Mixta</option>
        </select><br><br>

        <label for="materia1">Materia 1:</label>
        <select id="materia1" name="materia1" required>
            <option value="">Seleccione una materia</option>
        </select><br><br>

        <label for="materia2">Materia 2:</label>
        <select id="materia2" name="materia2" required>
            <option value="">Seleccione una materia</option>
        </select><br><br>

        <label for="materia3">Materia 3:</label>
        <select id="materia3" name="materia3" required>
            <option value="">Seleccione una materia</option>
        </select><br><br>

        <label for="materia4">Materia 4:</label>
        <select id="materia4" name="materia4" required>
            <option value="">Seleccione una materia</option>
        </select><br><br>

        <label for="materia5">Materia 5:</label>
        <select id="materia5" name="materia5" required>
            <option value="">Seleccione una materia</option>
        </select><br><br>

        <label for="materia6">Materia 6:</label>
        <select id="materia6" name="materia6" required>
            <option value="">Seleccione una materia</option>
        </select><br><br>

        <label for="materia7">Materia 7:</label>
        <select id="materia7" name="materia7" required>
            <option value="">Seleccione una materia</option>
        </select><br><br>

        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" value="<?php echo date('Y-m-d'); ?>" readonly><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
