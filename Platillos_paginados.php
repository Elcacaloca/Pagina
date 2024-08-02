<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurante";

// Conectar a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Número de platillos por página
$platillos_por_pagina = 5;
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$offset = ($pagina - 1) * $platillos_por_pagina;

// Consultar platillos
$sql = "SELECT * FROM menu LIMIT ?, ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $offset, $platillos_por_pagina);
$stmt->execute();
$result = $stmt->get_result();

// Contar total de platillos
$total_sql = "SELECT COUNT(*) AS total FROM menu";
$total_result = $conn->query($total_sql);
$total_row = $total_result->fetch_assoc();
$total_platillos = $total_row['total'];
$total_paginas = ceil($total_platillos / $platillos_por_pagina);

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listado de Platillos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #4CAF50; /* Color de fondo del encabezado */
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f8e9; /* Color de fondo en hover */
        }
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pagination a {
            color: #4CAF50;
            padding: 10px 15px;
            text-decoration: none;
            border: 1px solid #4CAF50;
            margin: 0 5px;
            border-radius: 5px;
        }
        .pagination a.active {
            background-color: #4CAF50;
            color: white;
        }
        .pagination a:hover {
            background-color: #a5d6a7;
        }
        header {
            width: 100%;
            background-color: #333;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            padding: 15px 20px;
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
            margin-right: 10px;
        }
        .logo span {
            font-size: 24px;
            font-weight: bold;
            vertical-align: middle;
        }
        .menu {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .menu li {
            margin-left: 20px;
            position: relative;
        }
        .menu a {
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s;
        }
        .menu a:hover {
            background-color: #555;
            border-radius: 5px;
        }
        .dropdown:hover .dropdown-menu {
            display: block;
        }
        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #444;
            min-width: 180px;
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
            padding: 10px;
            color: #fff;
            text-decoration: none;
            display: block;
        }
        .dropdown-menu a:hover {
            background-color: #555;
        }
        @media (max-width: 768px) {
            table {
                font-size: 14px;
            }
            .pagination {
                flex-direction: column;
            }
            .pagination a {
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>
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
                <a href="#"><i class="fas fa-envelope"></i> Platillos</a></li>
        </ul>
    </nav>
</header>
<h2>Listado de Platillos</h2>
<table>
    <thead>
        <tr>
            <th>Código</th>
            <th>Platillo</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['codigo']); ?></td>
                <td><?php echo htmlspecialchars($row['platillo']); ?></td>
                <td><?php echo htmlspecialchars($row['precio']); ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<div class="pagination">
    <?php if ($pagina > 1): ?>
        <a href="?pagina=<?php echo $pagina - 1; ?>">&laquo; Anterior</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
        <a href="?pagina=<?php echo $i; ?>" class="<?php echo $i == $pagina ? 'active' : ''; ?>">
            <?php echo $i; ?>
        </a>
    <?php endfor; ?>

    <?php if ($pagina < $total_paginas): ?>
        <a href="?pagina=<?php echo $pagina + 1; ?>">Siguiente &raquo;</a>
    <?php endif; ?>
</div>
</body>
</html>
