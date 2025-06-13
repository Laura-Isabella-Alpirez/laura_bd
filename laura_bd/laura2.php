<?php
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laura</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-light navbarBg">
        <div class="container">
            <a class="navbar-brand in" href="/bd_laura/index.html" style="color: white;">Inicio</a>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="font-menu nav-link dropdown-toggle" href="#" style="color: white;" data-toggle="dropdown">Unidad 1</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/bd_laura/laura1.php">Página 1</a>
                            <a class="dropdown-item" href="/bd_laura/laura2.php">Página 2</a>
                            <a class="dropdown-item" href="/bd_laura/laura3.php">Página 3</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" style="color: white;" data-toggle="dropdown">Unidad 2</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/bd_laura/laura4.php">Página 4</a>
                            <a class="dropdown-item" href="/bd_laura/laura5.php">Página 5</a>
                            <a class="dropdown-item" href="/bd_laura/laura6.html">Página 6</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" style="color: white;" data-toggle="dropdown">Unidad 3</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/bd_laura/laura7.html">Página 7</a>
                            <a class="dropdown-item" href="/bd_laura/laura8.html">Página 8</a>
                            <a class="dropdown-item" href="/bd_laura/laura9.html">Página 9</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron">
        <h1 class="display-4" style="background: linear-gradient(to right, rgb(255, 128, 187), rgb(255, 182, 193), rgb(255, 105, 180));
        -webkit-background-clip: text;background-clip: text;color: transparent;">Datos de Laura</h1>
        <h2 class="display-4">INFORMACIÓN DE UNA ESTUDIANTE DESTACADA</h2>
        <div class="container1">
<?php
$usuario = "root";
$clave = "";
$host = "localhost";
$bd_nombre = "psicology";
$conexion = new mysqli($host, $usuario, $clave, $bd_nombre);

if ($conexion->connect_error) {
    die("Fallo en la conexión: " . $conexion->connect_error);
}

function agregarRegistro($conexion){
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $conexion->real_escape_string($_POST["Nombre"]);
        $apellido = $conexion->real_escape_string($_POST["Apellido"]);
        $interes = $conexion->real_escape_string($_POST["Interes"]);
        $promedio = $conexion->real_escape_string($_POST["Promedio"]);
        $semestre = $conexion->real_escape_string($_POST["Semestre"]);
        $terapia = $conexion->real_escape_string($_POST["TerapiaFavorita"]);
        $universidad = $conexion->real_escape_string($_POST["Universidad"]);

        $sql = "INSERT INTO psicologia (Nombre, Apellido, Interes, Promedio, Semestre, TerapiaFavorita, Universidad)
                VALUES ('$nombre', '$apellido', '$interes', '$promedio', '$semestre', '$terapia', '$universidad')";

        if ($conexion->query($sql) === TRUE) {
            echo "<p>✅ Registro añadido correctamente.</p>";
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "<p>❌ Error al registrar: " . $conexion->error . "</p>";
        }
    }
}

agregarRegistro($conexion);

$consulta = "SELECT * FROM psicologia";
$resultado = $conexion->query($consulta);

if ($resultado->num_rows > 0) {
    echo "<table class='table table-bordered'>";
    echo "<tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Interés</th>
            <th>Promedio</th>
            <th>Semestre</th>
            <th>Terapia Favorita</th>
            <th>Universidad</th>
          </tr>";
    while($fila = $resultado->fetch_assoc()) {
        echo "<tr>
                <td>{$fila['id']}</td>
                <td>{$fila['Nombre']}</td>
                <td>{$fila['Apellido']}</td>
                <td>{$fila['Interes']}</td>
                <td>{$fila['Promedio']}</td>
                <td>{$fila['Semestre']}</td>
                <td>{$fila['TerapiaFavorita']}</td>
                <td>{$fila['Universidad']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No hay registros disponibles.</p>";
}

$conexion->close();
?>


    </div>
</body>
</html>
