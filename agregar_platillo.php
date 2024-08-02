<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Subir Platillo</title>
    <link rel="icon" href="./img/Logo.jpg" type="image/jpg" sizes="16x16">
    <!-- Incluyendo la librería de FontAwesome para los íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Estilos generales para el cuerpo y el fondo */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #eaeaea;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Estilos para el encabezado y el menú */
        header {
            width: 100%;
            background-color: #1e1e1e;
            color: #ffffff;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            padding: 15px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 40px;
            vertical-align: middle;
            margin-right: 15px;
        }

        .logo span {
            font-size: 28px;
            font-weight: bold;
        }

        .menu {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .menu li {
            margin-left: 25px;
            position: relative;
        }

        .menu a {
            color: #ffffff;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s;
        }

        .menu a:hover {
            background-color: #333333;
            border-radius: 5px;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #2c2c2c;
            min-width: 200px;
            border-radius: 5px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            top: 100%;
            left: 0;
        }

        .dropdown-menu li {
            list-style-type: none;
        }

        .dropdown-menu a {
            padding: 12px;
            color: #ffffff;
            text-decoration: none;
            display: block;
        }

        .dropdown-menu a:hover {
            background-color: #444444;
        }

        .fas, .fab {
            margin-right: 8px;
        }

        /* Ajuste para el espacio superior del contenido */
        main {
            margin-top: 80px;
            padding: 30px;
            display: flex;
            justify-content: space-between;
            gap: 30px;
        }

        /* Estilos específicos para el formulario */
        .form-container {
            width: 50%;
        }

        form {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: #333333;
        }

        input[type="text"], input[type="number"], input[type="file"] {
            width: calc(100% - 22px);
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            background-color: #f8f8f8;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        img {
            max-width: 250px;
            max-height: 250px;
            display: block;
            margin-top: 15px;
        }

        /* Estilos para la tabla */
        .table-container {
            width: 50%;
        }

        .table-container table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table-container th, .table-container td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .table-container th {
            background-color: #007bff;
            color: #ffffff;
        }

        .table-container tr:hover {
            background-color: #f1f1f1;
        }

        .button {
            background-color: #28a745;
            color: white;
            padding: 6px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
            margin-right: 5px;
        }

        .button:hover {
            background-color: #218838;
        }

        .button.delete {
            background-color: #dc3545;
        }

        .button.delete:hover {
            background-color: #c82333;
        }

        .message {
            color: #28a745;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <!-- Menú -->
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="./img/Logo22.png" alt="Logo">
                <span>Juancho's Restaurant</span>
            </div>
            <ul class="menu">
                <li><a href="index.html"><i class="fas fa-home"></i> Inicio</a></li>
                <li class="dropdown">
                    <a href="acerca.html"><i class="fas fa-info-circle"></i> Acerca de</a>
                </li>
                <li class="dropdown">
                    <a href="#"><i class="fas fa-utensils"></i> Nuestro Menú <i class="fas fa-caret-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="comidas.html"><i class="fas fa-hamburger"></i> Comidas</a></li>
                        <li><a href="bebidas.html"><i class="fas fa-coffee"></i> Bebidas</a></li>
                        <li><a href="postres.html"><i class="fas fa-ice-cream"></i> Postres</a></li>
                        <li><a href="demas.html"><i class="fas fa-ellipsis-h"></i> Demás</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#"><i class="fas fa-phone"></i> Contáctanos <i class="fas fa-caret-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="https://www.whatsapp.com"><i class="fab fa-whatsapp"></i> WhatsApp</a></li>
                        <li><a href="https://www.facebook.com/itjamc"><i class="fab fa-facebook"></i> Facebook</a></li>
                        <li><a href="https://www.instagram.com/instituto_juancho/"><i class="fab fa-instagram"></i> Instagram</a></li>
                        <li><a href="https://www.google.com/maps/place/Instituto+T%C3%A9cnico+Juan+Alberto+Melgar+Castro/@14.9842211,-88.0204976,16.96z/data=!4m9!1m2!2m1!1sca%C3%B1averal!3m5!1s0x8f65d7846df8a6db:0xaa1172c4ec1a7b11!8m2!3d14.9836277!4d-88.0182472!16s%2Fg%2F1hdzpq346?entry=ttu"><i class="fas fa-map-marker-alt"></i> Ubicación</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="Platillos_paginados.php"><i class="fas fa-envelope"></i> Paginacion Menu <i class="fas fa-caret-down"></i></a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Contenido principal -->
    <main>
        <div class="form-container">
            <h2>Agregar Platillo</h2>
            <form action="guardar_platillo.php" method="post" enctype="multipart/form-data">
                <label for="codigo">Código:</label>
                <input type="text" id="codigo" name="codigo" required>
                
                <label for="platillo">Platillo:</label>
                <input type="text" id="platillo" name="platillo" required>
                
                <label for="precio">Precio:</label>
                <input type="number" step="0.01" id="precio" name="precio" required>
                
                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" name="imagen" accept="image/*" onchange="previewImage(event)" required>
                
                <img id="preview" src="#" alt="Previsualización de la imagen" style="display: none;">
                
                <input type="submit" value="Guardar">
                <div class="message" id="message"></div>
            </form>
        </div>
        <div class="table-container">
            <h2>Platillos Existentes</h2>
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Platillo</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = new mysqli("localhost", "root", "", "restaurante");
                    if ($conn->connect_error) {
                        die("Conexión fallida: " . $conn->connect_error);
                    }
                    
                    $sql = "SELECT codigo, platillo, precio FROM menu";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['codigo']}</td>
                                    <td>{$row['platillo']}</td>
                                    <td>{$row['precio']}</td>
                                    <td>
                                        <a href='actualizar_platillo.php?codigo={$row['codigo']}' class='button'>Actualizar</a>
                                        <a href='eliminar_platillo.php?codigo={$row['codigo']}' class='button delete'>Eliminar</a>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No hay platillos</td></tr>";
                    }
                    
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview');
                output.src = reader.result;
                output.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        // Mostrar mensaje de éxito si hay uno en la URL
        document.addEventListener('DOMContentLoaded', function() {
            const params = new URLSearchParams(window.location.search);
            if (params.has('success')) {
                document.getElementById('message').innerText = "Platillo guardado exitosamente.";
            }
        });
    </script>
</body>
</html>
