<h2>Modificar Perfil</h2>


<div class="container mt-3">
    <?php
    if(isset($_GET["username_usado"]) && $_GET["username_usado"]){
        echo "<div style='color:red'>Otro usuario tiene este nombre</div>";
    }
    ?>
        <?php
    
    foreach ($datos_usuario as $datos) :
?>
    <form action="<?php echo base_url()."/usuario/modificar_perfil_usuario_hecho"?>" class="needs-validation" method="post">
        <div class="row	">
            <div class="col-sm">
                <div class="form-floating mb-3 mt-3">
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $datos->email;?>" required>
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="col-sm">
                <div class="form-floating mb-3 mt-3">
                    <input type="tel" class="form-control" id="telefono" placeholder="Telefono" value="<?php echo $datos->telefono;?>" name="telefono" pattern="[0-9]{9}" required>
                    <label for="telefono">Teléfono</label>
                </div>
            </div>
        </div>
        <p></p>
        <div class="row	">
            <div class="col-sm">
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" placeholder="Introduce tu nombre" name="nombre" value="<?php echo $datos->nombre;?>" required>
                    <label for="nombre">Nombre</label>
                </div>
            </div>
            <div class="col-sm">
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" placeholder="Introduce tus apellidos" name="apellidos" value="<?php echo $datos->apellidos;?>" required>
                    <label for="apellidos">Apellidos</label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
    <?php
    endforeach;
?>
</div>

</body>
</html>
