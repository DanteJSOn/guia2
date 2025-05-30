<?php
//variables
$hostDB = '127.0.0.1';
$nombreDB = 'BdBiblioteca';
$usuarioDB = 'root';
$contrasenaDB = '';
//conecta con la base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenaDB);
//Prepara select 
$miConsulta = $miPDO->prepare('Select * From AUTOR;');
//ejecuta consulta
$miConsulta->execute();

?>
<!DOCTYPE html>
<html lang="es">
<head>
        <meta charset="UTF-8">
        <title>Leer - CRUD PHP</title>
        <style>
            body h1, th {
                font-weight: bolder;
                text-align: center;
                font-family: 'Courier New';
            }
            table {
                border-collapse: collapse;
                width: 100%;
                font-family: 'Courier New';
            }
            table td {
                border: 1px solid orange;
                text-align: center;
                padding: 1.3rem;
            }
            .button {
                border-radius: .5rem;
                color: white;
                background-color: orange;
                padding: .7rem;
                text-decoration: none;
                font-family: 'Courier New';

            }
            footer {
                text-align: center;
            }
        </style>
</head>
<body>
    <h1>Lista de Autores</h1>
    <p><a class="button" href="nuevo.php">Crear</a></p>
    <table>
        <tr>
            <th>Codigo</th>
            <th>Nombre del Autor</th>
            <th>Modificar</th>
            <th>Borrar</th>
        </tr>
        <?php foreach ($miConsulta as $clave => $valor): ?>
            <tr>
                <td><?= $valor['id']; ?></td>
                <td><?= $valor['nombre']; ?></td>
                <!-- Se utilizará más adelante para indicar si se requiere modificar o eliminar el registra -->
                <td><a class="button" href="modificar.php?id=<?= $valor['id'] ?>">Modificar</a></td>
                <td><a class="button" href="borrar.php?id=<?= $valor['id'] ?>">Borrar</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <footer>
        <br><a href="http://localhost/guia13-Ejercicio1/index.php" class="button">Volver a Inicio</a>
    </footer>
</body>
</html>