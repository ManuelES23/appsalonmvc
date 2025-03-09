<h1 class="nombre-pagina">Olvide mi Password</h1>
<p class="descripcion-pagina">Restablece tu Password escribiendo tu email a continuación</p>

<?php include_once __DIR__ . '/../templates/alertas.php'; ?>

<form action="/olvide" class="formulario" method="POST">
    <dic class="campo">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Tu Email">
    </dic>

    <input type="submit" value="Enviar Instrucciones" class="boton">
</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
    <a href="crear-cuenta">¿Aún no tienes una cuenta? Crear una</a>
</div>