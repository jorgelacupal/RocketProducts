<h2>Perfil</h2>
<?php    
    foreach ($datos_empresa as $datos) :
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
            <p></p>
            <div class="row">
                <div class="col-sm">
                    <div class="form-floating mb-3 mt-3">
                        <b>País:</b> <?php echo $datos->pais ?>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-floating mb-3 mt-3">
                        <b>Ciudad:</b> <?php echo $datos->ciudad ?>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-floating mb-3 mt-3">
                        <b>Dirección:</b> <?php echo $datos->direccion ?>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-floating mb-3 mt-3">
                <a href="<?php echo base_url()."/usuario/modificar_perfil_empresa"?>" class="btn btn-primary">Cambiar datos</a>
                <a href="<?php echo base_url()."/usuario/dar_baja_usuario"?>" class="btn btn-primary">Dar de baja empresa</a>
            </div>
        </div>
<?php
    endforeach;
?>

</body>

</html>