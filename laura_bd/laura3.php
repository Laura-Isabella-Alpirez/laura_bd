<?php
    ob_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laura 🌸</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-light navbarBg">
        <div class="container">
            <a class="navbar-brand in" href="/laura_bd/index.html" style="color: white;">Inicio</a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="font-menu nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" style="color: white;"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Unidad 1</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="hola dropdown-item" href="/laura_bd/laura1.php">Página 1</a>
                            <a class="dropdown-item" href="/laura_bd/laura2.php">Página 2</a>
                            <a class="dropdown-item" href="/laura_bd/laura3.php">Página 3</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" style="color: white;"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Unidad 2</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/laura_bd/laura4.php">Página 4</a>
                            <a class="dropdown-item" href="/laura_bd/laura5.php">Página 5</a>
                            <a class="dropdown-item" href="/laura_bd/laura6.html">Página 6</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" style="color: white;"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Unidad 3</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/laura_bd/laura7.html">Página 7</a>
                            <a class="dropdown-item" href="/laura_bd/laura8.html">Página 8</a>
                            <a class="dropdown-item" href="/laura_bd/laura9.html">Página 9</a>
                        </div>
                    </li>
                    
                </ul>
            </div>
            
        </div>
    </nav>
<div class="jumbotron" style="background-color: #ffe6f0;">
    <h1 class="display-4" style="
        background: linear-gradient(to right, #d63384, #ff85b3, #f7c1d9);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        text-align: center;">💗 Registro de Laura</h1>
</div>

<?php
$usuario = "root";
$clave = "";
$host = "localhost";
$bd_nombre = "psicology";

$conexion = new mysqli($host, $usuario, $clave, $bd_nombre);

if ($conexion->connect_error) {
    die("Fallo en la conexión: " . $conexion->connect_error);
}

function registrarPsicologia($conexion){
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $conexion->real_escape_string($_POST["Nombre"]);
        $apellido = $conexion->real_escape_string($_POST["Apellido"]);
        $interes = $conexion->real_escape_string($_POST["Interes"]);
        $promedio = $conexion->real_escape_string($_POST["Promedio"]);
        $semestre = $conexion->real_escape_string($_POST["Semestre"]);
        $terapia = $conexion->real_escape_string($_POST["TerapiaFavorita"]);
        $universidad = $conexion->real_escape_string($_POST["Universidad"]);

        $sql = "INSERT INTO psicologia (Nombre, Apellido, Interes, Promedio, Semestre, TerapiaFavorita, Universidad)
                VALUES ('$nombre', '$apellido', '$interes', $promedio, $semestre, '$terapia', '$universidad')";

        if ($conexion->query($sql) === TRUE) {
            echo "<p style='color: green;'>✅ Registro añadido correctamente.</p>";
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "<p style='color: red;'>❌ Error al registrar: " . $conexion->error . "</p>";
        }
    }
}

registrarPsicologia($conexion);

$consulta = "SELECT * FROM psicologia";
$resultado = $conexion->query($consulta);
?>

<div class="container">
    <h2>Registro de estudiantes de Psicología</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="Nombre">Nombre:</label>
        <input type="text" id="Nombre" name="Nombre" required><br>

        <label for="Apellido">Apellido:</label>
        <input type="text" id="Apellido" name="Apellido" required><br>

        <label for="Interes">Interés:</label>
        <input type="text" id="Interes" name="Interes" required><br>

        <label for="Promedio">Promedio:</label>
        <input type="number" step="0.01" min="0" max="10" id="Promedio" name="Promedio" required><br>

        <label for="Semestre">Semestre:</label>
        <input type="number" min="1" id="Semestre" name="Semestre" required><br>

        <label for="TerapiaFavorita">Terapia Favorita:</label>
        <input type="text" id="TerapiaFavorita" name="TerapiaFavorita" required><br>

        <label for="Universidad">Universidad:</label>
        <input type="text" id="Universidad" name="Universidad" required><br>

        <input type="submit" value="Agregar Registro">
    </form>

    <?php
    if ($resultado->num_rows > 0) {
        echo "<table border='1' cellpadding='5' style='margin-top:20px;'>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Interés</th><th>Promedio</th><th>Semestre</th><th>Terapia Favorita</th><th>Universidad</th></tr>";
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
        echo "<p>No se encontraron registros.</p>";
    }

    $conexion->close();
    ?>
</div>

</div>


    </div>
</body>
</html>

