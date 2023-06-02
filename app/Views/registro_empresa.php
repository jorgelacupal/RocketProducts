<h2>Registro Usuario</h2>

<div class="container mt-3">
    <?php
    if(isset($_GET["username_usado"]) && $_GET["username_usado"]){
        echo "<div style='color:red'>Este usuario ya está registrado</div>";
        echo("<a href='iniciar_sesion.php'>Click aquí para iniciar sesion</a>");
    }
    ?>
<form action="<?php echo base_url()."/usuario/registro_empresa_hecho"?>" class="needs-validation" method="post">
    <div class="row	">
        <div class="col-sm">
            <div class="form-floating mb-3 mt-3">
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php if(isset($_GET["email"])){echo $_GET["email"];}?>" required>
                <label for="email">Email</label>
            </div>
        </div>

        <div class="col-sm">
            <div class="form-floating mb-3 mt-3">
                <input type="tel" class="form-control" id="telefono" placeholder="Telefono" value="<?php if(isset($_GET["telefono"])){echo $_GET["telefono"];}?>" name="telefono" pattern="[0-9]{9}" required>
                <label for="telefono">Teléfono</label>
            </div>
        </div>

    </div>
    <p></p>
    <div class="row	">
        <div class="col-sm">
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" placeholder="Introduce tu nombre" name="nombre" value="<?php if(isset($_GET["nombre"])){echo $_GET["nombre"];}?>" required>
                <label for="nombre">Nombre</label>
            </div>
        </div>
        <div class="col-sm">
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" placeholder="Introduce tus apellidos" name="apellidos" value="<?php if(isset($_GET["apellidos"])){echo $_GET["apellidos"];}?>" required>
                <label for="apellidos">Apellidos</label>
            </div>
        </div>
    </div>
    <p></p>
    <div class="row	">
        <div class="col-sm">
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" placeholder="País" name="pais" value="<?php if(isset($_GET["pais"])){echo $_GET["pais"];}?>" required>
                <label for="pais">País</label>
            </div>
        </div>
        <div class="col-sm">
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" placeholder="Ciudad" name="ciudad" value="<?php if(isset($_GET["ciudad"])){echo $_GET["ciudad"];}?>" required>
                <label for="ciudad">Ciudad</label>
            </div>
        </div>
        <div class="col-sm">
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" placeholder="Direccion" name="direccion" value="<?php if(isset($_GET["direccion"])){echo $_GET["direccion"];}?>" required>
                <label for="direccion">Direccion</label>
            </div>
        </div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-floating mb-3 mt-3">
                <input type="password" class="form-control" placeholder="Introduce una contrasena" name="contrasena" required>
                <label for="contrasena">Contraseña</label>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
</div>

</body>
</html>




