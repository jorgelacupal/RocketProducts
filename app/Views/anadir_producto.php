<h2>Añadir producto</h2>

<div class="container mt-3">
<form action="<?php echo base_url()."/usuario/anadir_producto_hecho"?>" class="needs-validation" method="post"  enctype="multipart/form-data">
    <div class="row	">
        <div class="col-sm">
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" value="<?php if(isset($_GET["nombre"])){echo $_GET["nombre"];}?>" required>
                <label for="nombre">Nombre</label>
            </div>
        </div>
    </div>
    <p></p>
    <div class="row	">
        <div class="col-sm">
            <div class="mb-3 mt-3">
                <textarea class="form-control"  rows="5" placeholder="Descripcion" name="descripcion" value="<?php if(isset($_GET["descripcion"])){echo $_GET["descripcion"];}?>" required></textarea>              
            </div>
        </div>
    </div>
    <p></p>
    <div class="row	">
        <div class="col-sm">
            <div class="form-floating mb-3 mt-3">
                <input type="number" class="form-control" placeholder="Precio" name="precio" value="<?php if(isset($_GET["precio"])){echo $_GET["precio"];}?>" required>
                <label for="precio">Precio</label>
            </div>
        </div>
        <div class="col-sm">
            <div class="form-floating mb-3 mt-3">
                <input type="number" class="form-control" placeholder="Unidades" name="stock" value="<?php if(isset($_GET["stock"])){echo $_GET["stock"];}?>" required>
                <label for="stock">Unidades</label>
            </div>
        </div>
    </div>
    <p></p>

    <div class="row">
        <div class="col">
            <div class="form-floating mb-3 mt-3">
                <input type="file" class="form-control" placeholder="Imagen" name="imagen" required>
                <label for="imagen">Imagen</label>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
</div>

</body>
</html>




