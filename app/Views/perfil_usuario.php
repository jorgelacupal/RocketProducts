<h2>Perfil</h2>
<?php
    foreach ($datos_usuario as $datos) :
?>
        <div class="container mt-3">
            <div class="row	">
                <div class="col-sm">
                    <div class="form-floating mb-3 mt-3">
                        <b>Email:</b> <?php echo $datos->email ?>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-floating mb-3 mt-3">
                        <b>Telefono:</b> <?php echo $datos->telefono ?>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row	">
                <div class="col-sm">
                    <div class="form-floating mb-3 mt-3">
                        <b>Nombre:</b> <?php echo $datos->nombre ?>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-floating mb-3 mt-3">
                        <b>Apellidos:</b> <?php echo $datos->apellidos ?>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-floating mb-3 mt-3">
                <a href="<?php echo base_url()."/usuario/modificar_perfil_usuario"?>" class="btn btn-primary">Modificar perfil</a>

                <?php 
                    if($datos->direccion=="" && $datos->ciudad=="" && $datos->pais==""){
                ?>
                <a href="<?php echo base_url()."/usuario/modificar_direccion"?>" class="btn btn-primary">Añadir dirección</a>
                <?php 
                    }else{
                ?>
                <a href="<?php echo base_url()."/usuario/modificar_direccion"?>" class="btn btn-primary">Cambiar dirección</a>
                <?php        
                    }
                ?>
                <a href="<?php echo base_url()."/usuario/dar_baja_usuario"?>" class="btn btn-primary">Dar de baja</a>
            </div>
        </div>
<?php
    endforeach;
?>

</body>

</html>