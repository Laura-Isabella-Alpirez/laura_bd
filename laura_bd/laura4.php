<?php
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos unidos</title>
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

    <div class="jumbotron">
        <h1 class="display-4" style="background: linear-gradient(to right, rgb(255, 128, 187), rgb(255, 182, 193), rgb(255, 105, 180));
        -webkit-background-clip: text;background-clip: text;color: transparent;">4° Programacion</h1>
        <p class="lead"  style="text-align: center;">Datos Relacionales </h1>
    </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Numero de Control</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Edad</th>
                    <th>Colonia</th>
                    <th>Especialidad</th>
                    <th>Genero</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Fecha de Ingreso</th>
                </tr>
            </thead>
            <tbody> 
        
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        $username = "root";
        $password = "";
        $servername = "localhost";
        $database = "escuela";
        $conexion = new mysqli($servername, $username, $password, $database);
        if ($conexion->connect_error) {
            die("Conexion Fallida: " . $conexion->connect_error);
        }
        $sql = "SELECT
                a.numero_control,
                a.nombre,
                a.apellido_paterno,
                a.apellido_materno,
                e.edad,
                c.nombre_colonia,
                es.nombre_especialidad,
                g.nombre_genero,
                a.correo,
                a.telefono,
                a.fecha_ingreso
                FROM alumnos a
                LEFT JOIN edades e ON a.id_edad = e.id
                LEFT JOIN colonias c ON a.id_colonia = c.id
                LEFT JOIN especialidades es ON a.id_especialidad = es.id
                LEFT JOIN generos g ON a.id_genero = g.id";
        $resultado = $conexion->query($sql);
        if ($resultado->num_rows > 0) {
            
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>
                <td>{$row['numero_control']}</td>
                <td>{$row['nombre']}</td>
                <td>{$row['apellido_paterno']}</td>
                <td>{$row['apellido_materno']}</td>
                <td>{$row['edad']}</td>
                <td>{$row['nombre_colonia']}</td>
                <td>{$row['nombre_especialidad']}</td>
                <td>{$row['nombre_genero']}</td>
                <td>{$row['correo']}</td>
                <td>{$row['telefono']}</td>
                <td>{$row['fecha_ingreso']}</td>
                </tr>";
            }
        }   else {
            echo "<p>No se encontraron registros en la base de datos</p>";
        }
        $conexion->close();
    
        ?>
        </tbody>
    </table>

</body>
</html>
