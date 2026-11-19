<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
        
    <div class="container">
        <header>
            <a href="index.php"><img src="fotos/logof1azulway.png" width="200"></a>

        <ul>
            <li><a href="ultimosresul.php">Últimos resultados</a></li>
            <li><a href="tempanteriores.php">Temporadas anteriores</a></li>
            <li><a href="pilotos.php">Pilotos</a></li>
            <li><a href="contacto.html">Contacto</a></li>
            <li><a href="automobilista.php">Automobilista</a></li>
            <li><a href="sobrenosotros.html">Sobre nosotros</a></li>
            <li><a href="calculadora-combustible.html">Calculadora de combustible</a></li>
        </ul>

        </header>
        <main class="pagina">
            <div class="presentacion">
                <h1><i>¡Conoce a nuestros mejores y más valientes pilotos!</i></h1>
            </div>

            <div class="col">

                <?php
                    try {
                        $conexion = new PDO("sqlite:C:\Users\alber\Desktop\RLT\user\databases\F1 Azul T4.db");
                        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                ?>

                <?php
                    $sql = "SELECT d.Name, n.Name as nacionalidad, d.RaceNumber, d.RealName FROM Drivers d INNER JOIN Nationalities n ON d.NationId = n.Id";
                    $resultado = $conexion->query($sql);

                    echo '
                    <div class="grid">
                    ';

                    foreach ($resultado as $fila) {
                        $foto = '';
                        foreach (['jpg', 'jpeg', 'png', 'webp'] as $extension) {
                            $ruta = 'fotos/pilotos/' . $fila['RaceNumber'] . '.' . $extension;
                            if (file_exists(__DIR__ . '/' . $ruta)) {
                                $foto = $ruta;
                                break;
                            }
                        }

                        echo '
                        <div class="card">
                            <div class="foto">';

                        if ($foto !== '') {
                            echo '<img src="' . htmlspecialchars($foto) . '" alt="' . htmlspecialchars($fila['Name']) . '">';
                        } else {
                            echo '<div class="sin-foto">Sin foto</div>';
                        }

                        echo '
                            </div>
                            <div class="datos">
                                <div class="cabecera">
                                    <div class="name">' . htmlspecialchars($fila['Name']) . '</div>
                                    <div class="number">#' . htmlspecialchars($fila['RaceNumber']) . '</div>
                                </div>
                                <div class="info"><strong>Nombre real:</strong> ' . htmlspecialchars($fila['RealName']) . '</div>
                                <div class="info"><strong>Nación:</strong> ' . htmlspecialchars($fila['nacionalidad']) . '</div>
                            </div>
                        </div>
                        ';
                    }
                    echo '</div>';
                }
                catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                ?>
            </div>
        </main>
        <footer>
            <p>Desarrollado por Alberto Cuesta | 2026</p>
            <p>Todos los derechos reservados</p>
        </footer>
    </div>

</body>
</html>
