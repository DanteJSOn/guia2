<?php
// Conexión a la base de datos
$hostDB = '127.0.0.1';
$nombreDB = 'BdBiblioteca';
$usuarioDB = 'root';
$contrasenaDB = '';

$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenaDB);

// Consulta SELECT
$miConsulta = $miPDO->prepare('SELECT * FROM AUTOR;');
$miConsulta->execute();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        input[type="text"] {
            width: 50%;
            padding: 0.5rem;
            margin: 1rem auto;
            display: block;
            font-family: 'Courier New';
        }
        footer {
            text-align: center;
        }
        @media (max-width: 600px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }
            td {
                border: none;
                border-bottom: 1px solid orange;
                position: relative;
                padding-left: 50%;
            }
            td::before {
                position: absolute;
                left: 1rem;
                top: 1rem;
                white-space: nowrap;
                font-weight: bold;
            }
            td:nth-of-type(1)::before { content: "Código"; }
            td:nth-of-type(2)::before { content: "Nombre"; }
            td:nth-of-type(3)::before { content: "Modificar"; }
            td:nth-of-type(4)::before { content: "Borrar"; }
        }
    </style>
</head>
<body>
    <h1>Lista de Autores</h1>

    <?php if (isset($_GET['mensaje'])): ?>
        <p style="color: green; text-align:center; font-family: 'Courier New';">
            <?= htmlspecialchars($_GET['mensaje']) ?>
        </p>
    <?php endif; ?>

    <input type="text" id="busqueda" placeholder="Buscar autor...">
    <p><a class="button" href="nuevo.php">Crear</a></p>

    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre del Autor</th>
                <th>Modificar</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($miConsulta as $clave => $valor): ?>
                <tr>
                    <td><?= $valor['id']; ?></td>
                    <td><?= $valor['nombre']; ?></td>
                    <td><a class="button" href="modificar.php?id=<?= $valor['id'] ?>">Modificar</a></td>
                    <td><a class="button" href="borrar.php?id=<?= $valor['id'] ?>" onclick="return confirm('¿Seguro que deseas eliminar este autor?');">Borrar</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <footer>
        <br><a href="http://localhost/guia13-Ejercicio1/index.php" class="button">Volver a Inicio</a>
    </footer>

    <script>
    document.getElementById("busqueda").addEventListener("keyup", function() {
        let valor = this.value.toLowerCase();
        document.querySelectorAll("table tbody tr").forEach(function(fila) {
            fila.style.display = fila.textContent.toLowerCase().includes(valor) ? "" : "none";
        });
    });
    </script>
</body>
</html>
