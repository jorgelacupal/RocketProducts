<script>
    function obtenerValorCookie(nombre) {
        var cookies = document.cookie.split(';');

        for (var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i].trim();

            if (cookie.indexOf(nombre + '=') === 0 && cookie.charAt(nombre.length) === '=') {
                return cookie.substring(nombre.length + 1);
            }
        }
        return null;
    }

    function carrito(id_producto, cantidad) {
        var carritoActual = obtenerValorCookie("carrito");

        if (carritoActual === null) {
            var carrito = [{
                id_producto: id_producto,
                cantidad: 1
            }];
            document.cookie = "carrito=" + JSON.stringify(carrito) + "; expires=" + (new Date(Date.now() + 7 * 24 * 60 * 60 * 1000)).toUTCString() + "; path=/";
        } else {
            var carrito = JSON.parse(carritoActual);
            var productoExistente = false;

            for (var i = 0; i < carrito.length; i++) {
                if (carrito[i].id_producto === id_producto) {
                    carrito[i].cantidad++;
                    productoExistente = true;
                    break;
                }
            }

            if (!productoExistente) {
                carrito.push({
                    id_producto: id_producto,
                    cantidad: 1
                });
            }

            document.cookie = "carrito=" + JSON.stringify(carrito) + "; expires=" + (new Date(Date.now() + 7 * 24 * 60 * 60 * 1000)).toUTCString() + "; path=/";
        }

        location.reload();
    }
</script>

<?php
foreach ($datos_producto as $datos) :
?>
    <?php
    if (session('esadmin') == 1 && session('email') != null && $datos->id_empresa == session('id')) {
    ?>
        <div class="form-floating mb-3 mt-3 centrar">
            <a style="margin-right: 10px;" href="<?php echo base_url() . "/usuario/modificar_producto" . $datos->id; ?>" class="btn btn-primary">Modificar producto</a>

            <a style="margin-left: 10px;" href="<?php echo base_url() . "/usuario/eliminar_producto" . $datos->id; ?>" class="btn btn-primary">Eliminar producto</a>
        </div>
    <?php
    }
    ?>
    <div class="container mt-3">
        <div class="container">
            <div class="d-flex flex-row">

                <div class="card w-100">
                    <a href="<?php echo base_url() . "/mostrar_producto" . $datos->id ?>" class="card-link stretched-link">
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title"><?php echo $datos->nombre; ?></h4>
                            <div class="d-flex flex-row">

                                <img style="width: 200px; height: 150px" src="<?php echo base_url() . "/public/img/" . $datos->imagen; ?>" class="card-img-top">

                                <div class="ml-3">
                                    <h5>Detalles del producto</h5>
                                    <p class="card-text"><?php echo $datos->descripcion; ?></p>
                                    <p class="card-text"><b><?php echo $datos->precio . "€"; ?></b></p>
                                </div>

                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <?php
    if (session('esadmin') == 1 && session('email') != null && $datos->id_empresa == session('id')) {
    } else {
    ?>
        <div class="form-floating mb-3 mt-3 centrar">
            <a onclick="carrito(<?php echo $datos->id ?>)" class="btn btn-primary">Comprar producto</a>

        </div>
    <?php
    }
    ?>



<?php
$contador=true;
foreach ($datos_comentario as $datos_coment) : 
if($datos->id == $datos_coment->id_producto && $contador){
$contador=false;
?>

<div class="container">
    <h2>Comentarios</h2>
    <hr>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"></h5>
        <?php foreach ($datos_comentario as $datos_coment) :  ?>
        <div id="comentarios">
        <?php echo "- " . $datos_coment->comentario; ?>
        </div>
        <?php

endforeach;
?>
      </div>
    </div>
  </div>
<?php
}
endforeach;
?>
<?php
if (session('esadmin') == 0 && session('email') != null) {
?>
    <br>
    <div class="container">
    <div class="row">
        <div class="col-sm">
            <form action="<?php echo base_url() . "/producto/anadir_comentario" ?>" class="needs-validation" method="post">
                <label for="comentario">Añadir comentario:</label>
                <textarea class="form-control" rows="5" id="comentario" name="comentario"></textarea>
                <input type="text" name="id_usuario" value="<?php echo session("id")?>" hidden>
                <input type="text" name="id_producto" value="<?php echo $datos->id; ?>" hidden>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
    </div>
<?php  } ?>
<?php

endforeach;
?>
</body>

</html>