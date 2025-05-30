<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC Libreria</title>
    <link rel="stylesheet" href="vista/css/app.css">
    <style>
        body {
            font-family: 'Courier New';
        }
        table, tr, td {
            border-color: white;
            width: 100%;
        }
        .izquierda {
            width: 20%;
        }
        .derecha {
            width: 20%;
        }
        .centro {
            width: 60%;
        }
        .img2 {
            text-align: right;
        }
        h1, h2, nav, button {
            text-align: center;
        }
        nav ul li a {
        color: black;
        text-decoration: none;
        }
        button {
            background-color: red;
            color: white;
            font-family: 'Courier New';
            font-weight: bolder;
        }
        .button-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td class="izquierda"><p class="img1"><img src="imagenes/logo.png" alt="Logo UAC" width="250"></p></td>
            <td class="centro"><h1>SERGIO'S LIBRARY</h1></td>
            <td class="derecha"><p class="img2"><img src="imagenes/libros.png" alt="Libros" width="150"></p></td>
        </tr>
    </table>
    <nav>
        <ul>
            <button class="button" onclick="location.href='vista/Autor/listar.php'">Autor</button>
            <button class="button" onclick="location.href='vista/Usuario/listar.php'">Usuario</button>
            <button class="button" onclick="location.href='vista/Libro/listar.php'">Libro</button>
            <button class="button" onclick="location.href='vista/Ejemplar/listar.php'">Ejemplar</button>
        </ul>
    </nav>


    <h2>Préstamos y Devoluciones</h2>
    <div class="button-container">
        <button class="button" onclick="location.href='controlador/ControladorPrestamo.php'">Préstamo</button>
        <button class="button" onclick="location.href='controlador/ControladorDevolucion.php'">Devolución</button>
    </div>

    <h2>Consultas</h2>
    <div class="button-container">
        <button class="button" onclick="location.href='controlador/consulta1.php'">Ejemplares que fueron sacados por un determinado Usuario</button>
        <br>
        <button class="button" onclick="location.href='controlador/consulta2.php'">Ejemplares que aún no fueron devueltos</button>
        <br>
        <button class="button" onclick="location.href='controlador/consulta3.php'">Ranking de los autores que tienen más libros en la Biblioteca</button>
        <br>
    </div>

</body>
</html>
