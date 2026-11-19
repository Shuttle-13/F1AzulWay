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

        <div class='presentacion'>    

                <h1>El mejor Mundial de F1 que puedas imaginar</h1>

        </div>

        <main>

        </main>

        <aside>
            <div class="video">
                <iframe width="1000" height="600" src="https://www.youtube.com/embed/X3O0TFRnx1A?si=V7kSBF1I8OKmnxRA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </aside>

        <footer>
            <form action="../backend/email.php" method="POST" class="Formulario" id="formContacto">
                <fieldset class="borde-form">
                    <legend>Contáctanos para más información</legend>
                    <label for="">Nombre:</label>
                    <input type="text" name="Nombre" id="">
                    <br>
                    <label for="">Apellidos:</label>
                    <input type="text" name="Apellidos" id="">
                    <br>
                    <label for="">Nombre ingame:</label>
                    <input type="text" name="Ingame">
                    <br>
                    <label for="">Email:</label>
                    <input type="email" name="Email" id="">
                    <br>
                    <label for="">Edad:</label>
                    <input type="number" name="Edad" id="" min="0" max="90">
                    <br>
                    <label for="">Plataforma:</label>
                    <select name="Plataforma" id="">
                        <option value="Steam">Steam</option>
                        <option value="EA">EA</option>
                        <option value="PlayStation">PlayStation</option>
                        <option value="Xbox">Xbox</option>
                    </select>
                    <br>
                    <label for="">¿Cómo quieres entrar?</label>
                    <select name="Rol" id="">
                        <option value="Piloto">Piloto</option>
                        <option value="Ingeniero">Ingeniero</option>
                        <option value="Comisario">Comisario</option>
                        <option value="Otro">Otro</option>
                    </select>
                    <br>
                    <input type="submit" value="Enviar Formulario">
                </fieldset>
            </form>



            <p>Desarrollado por Alberto Cuesta | 2026</p>
            <p>Todos los derechos reservados</p>
        </footer>
    </div>

    <div class="popup" id="popup" role="status" aria-live="polite"></div>

<script>
var formulario = document.getElementById("formContacto");
var popup = document.getElementById("popup");
var temporizador;

function mostrarPopup(texto, error) {
    popup.textContent = texto;
    popup.classList.toggle("error", error);
    popup.classList.add("visible");
    clearTimeout(temporizador);
    temporizador = setTimeout(function () {
        popup.classList.remove("visible");
    }, 4000);
}

formulario.addEventListener("submit", function (e) {
    e.preventDefault();
    fetch(formulario.action, { method: "POST", body: new FormData(formulario) })
        .then(function (respuesta) {
            if (!respuesta.ok) { throw new Error(); }
            mostrarPopup("Formulario enviado correctamente", false);
            formulario.reset();
        })
        .catch(function () {
            mostrarPopup("No se ha podido enviar el formulario", true);
        });
});
</script>

</body>
</html>