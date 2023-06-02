<h2>Dar de baja</h2>

<div class="container mt-3">
    
<?php

    if(isset($error)){
        echo "<div style='color:red'>La contraseña es incorrecta</div>";
    }
    ?>

    <form action="<?php echo base_url()."/usuario/dar_baja_usuario_hecho"?>" class="needs-validation" method="post">
        <div class="row	">
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