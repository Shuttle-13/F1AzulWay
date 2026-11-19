<?php
if (isset($_POST["carrera"])) {
    $visible = "1";
    
    try {
        $conexion_carreras = new PDO("sqlite:c:/Users/alber/Downloads/F1 Azul T4.db");
        $conexion_carreras->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $id_carrera = intval($_POST["carrera"]);
        $sql_carreras = "SELECT ds.Position AS posicion, ds.DriverName AS piloto, ds.TeamName AS escuderia, ds.Status AS estado, ds.TimeInt AS tiempo_total_ms, ds.GapInt AS diferencia_ms, ds.LapsCount AS vueltas, ds.FastestLapTimeInt AS vuelta_rapida_ms, ds.GridPosition AS posicion_salida FROM DriverSessions AS ds INNER JOIN SessionResults AS sr ON sr.Id = ds.SessionResultId WHERE sr.Id = $id_carrera ORDER BY ds.Position ASC;";
        $resultado_carreras = $conexion_carreras->query($sql_carreras);

    } catch (PDOException $e) {
        echo "Error de conexión o consulta: " . $e->getMessage();
    }
} else {
    $visible = "0";
}
?>
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
            <a href="indexprueba.php"><img src="fotos/logof1azulway.png" width="200"></a>

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
        <main>
            <div class="presentacion">
                <h1><i>CARRERAS</i></h1>
            </div>

            <div class="col">
                
                <?php
                    try {
                        $conexion = new PDO("sqlite:C:\Users\alber\Downloads\F1 Azul T4.db");
                        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                ?>

                <?php
                    $sql = "SELECT Id,DriverDayDriverName FROM SessionResults where DriverDayDriverName <> ''";
                    $resultado = $conexion->query($sql); ?>
                    <form name="form1" id="form1" action="" method="post">
                        <select name="carrera" id="carerra">
                        <?php 
                        foreach ($resultado as $fila) { ?>
                            <option value="<?php echo $fila['Id']; ?>"><?php echo $fila['DriverDayDriverName']; ?></option>
                        <?php
                        } ?>
                        </select>
                        <input type="submit" name="enviar" value="Filtra">
                    </form>
                <?php    
                }
                catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                ?>
            </div>
            <div class="col">
                <?php if (isset($visible) && $visible === "1" && !empty($resultado_carreras)): ?>
                    <table border="1">
                        <tr>
                            <td>Posicion</td>
                            <td>Piloto</td>
                            <td>Escuderia</td>
                        </tr>
                        <?php foreach ($resultado_carreras as $fila_carrera): ?>
                            <tr>
                                <td><?php echo $fila_carrera['posicion']; ?></td>
                                <td><?php echo $fila_carrera['piloto']; ?></td>
                                <td><?php echo $fila_carrera['escuderia']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else: ?>
    <p>Selecciona una carrera para ver los resultados.</p>
<?php endif; ?>
            </div>
        </main>
        <footer>
            <p>Desarrollado por Alberto Cuesta | 2026</p>
            <p>Todos los derechos reservados</p>
        </footer>
    </div>

</body>
</html>