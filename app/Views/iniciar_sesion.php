<h2>Iniciar sesión</h2>

<div class="container mt-3">
    <?php
    if(isset($_GET["incorrecto"]) && $_GET["incorrecto"]){
        echo "<div style='color:red'>El usuario o la contraseña son incorrectos</div>";
        echo("<a href='registro_usuario.php'>Click aquí para registrarte</a>");
    }
    ?>
    <form action="<?php echo base_url()."/usuario/iniciar_sesion_hecho"?>" class="needs-validation" method="post">
        <div class="row	">
            <div class="col-sm">
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="<?php if(isset($_GET["email"])){echo $_GET["email"];}?>" required>
                    <label for="username">Email</label>
                </div>
            </div>
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