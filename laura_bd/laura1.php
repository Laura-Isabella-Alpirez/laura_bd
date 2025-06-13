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
        -webkit-background-clip: text;background-clip: text;color: transparent;">Mostrar Datos</h1>
<?php
$username = "root";
$password = "";
$servername = "localhost";
$database = "psicology";
$conexion = new mysqli($servername, $username, $password, $database);
if ($conexion->connect_error) {
    die("Conexion Fallida: " . $conexion->connect_error);
}
$sql = "SELECT * FROM `psicologia`";
$resultado = $conexion->query($sql);
?>
<div class="container">
    <h2 class="display-4">PERFILES DE ESTUDIANTES DE PSICOLOGÍA</h2>
    <?php if($resultado->num_rows >0):?>
        <table>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Interés</th>
                <th>Promedio</th>
                <th>Semestre</th>
                <th>Terapia Favorita</th>
                <th>Universidad</th>
            </tr>
            <?php while ($fila = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?php echo $fila['id']; ?></td>
                <td><?php echo $fila['Nombre']; ?></td>
                <td><?php echo $fila['Apellido']; ?></td>
                <td><?php echo $fila['Interes']; ?></td>
                <td><?php echo $fila['Promedio']; ?></td>
                <td><?php echo $fila['Semestre']; ?></td>
                <td><?php echo $fila['TerapiaFavorita']; ?></td>
                <td><?php echo $fila['Universidad']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No se encontraron perfiles de estudiantes</p>
    <?php endif; ?>

        </div>
    </div>
</body>
</html>
