<h2>Modificar Perfil</h2>


<div class="container mt-3">
        <?php
    
    foreach ($datos_usuario as $datos) :
?>
    <form action="<?php echo base_url()."/usuario/modificar_direccion_hecho"?>" class="needs-validation" method="post">
    <div class="row">
        <div class="col-sm">
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" placeholder="País" name="pais" value="<?php echo $datos->pais;?>">
                <label for="pais">País</label>
            </div>
        </div>
        <div class="col-sm">
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" placeholder="Ciudad" name="ciudad" value="<?php echo $datos->ciudad;?>">
                <label for="ciudad">Ciudad</label>
            </div>
        </div>
        <div class="col-sm">
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" placeholder="Direccion" name="direccion" value="<?php echo $datos->direccion;?>">
                <label for="direccion">Direccion</label>
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
