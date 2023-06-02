
<?php
    foreach ($datos_producto as $datos) :
    ?>
<h2>Modificar producto</h2>

<div class="container mt-3">
<form action="<?php echo base_url()."/usuario/modificar_producto_hecho"?>" class="needs-validation" method="post"  enctype="multipart/form-data">
    <div class="row	">
        <div class="col-sm">
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" value="<?php echo $datos->nombre; ?>" required>
                <label for="nombre">Nombre</label>
            </div>
        </div>
    </div>
    <p></p>
    <div class="row	">
        <div class="col-sm">
            <div class="mb-3 mt-3">
                <textarea class="form-control" rows="5" placeholder="Descripcion" name="descripcion" required><?php echo $datos->descripcion; ?></textarea>
            </div>
        </div>
    </div>
    <p></p>
    <div class="row	">
        <div class="col-sm">
            <div class="form-floating mb-3 mt-3">
                <input type="number" class="form-control" placeholder="Precio" name="precio" value="<?php echo $datos->precio; ?>" required>
                <label for="precio">Precio</label>
            </div>
        </div>
        <div class="col-sm">
            <div class="form-floating mb-3 mt-3">
                <input type="number" class="form-control" placeholder="Unidades" name="stock" value="<?php echo $datos->stock; ?>" required>
                <label for="stock">Unidades</label>
            </div>
        </div>
    </div>
    <p></p>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-floating mb-3 mt-3">
                <input type="file" class="form-control" placeholder="Imagen" name="imagen">
                <label for="imagen">Imagen</label>
            </div>
        </div>
    </div>
    <input type="number" hidden value="<?php echo $datos->id; ?>" name="id_producto">
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
</div>
<?php

endforeach;
?>
</body>
</html>




