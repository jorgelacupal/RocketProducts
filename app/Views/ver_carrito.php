<style>
    img {
        width: 30px;
        height: 30px;
        min-height: 30px;
        max-height: 30px;
        min-width: 30px;
        max-width: 30px;
    }
        .gracias {
            background-color: #fff;
            border-radius: 5px;
            padding: 30px;
            text-align: center;
        }

        .gracias h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .gracias p {
            color: #777;
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 10px;
        }
    </style>
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

  function restar(id_producto) {
  var carritoActual = obtenerValorCookie("carrito");
    var carrito = JSON.parse(carritoActual);
    var productoExistente = false;

    for (var i = 0; i < carrito.length; i++) {
      if (carrito[i].id_producto === id_producto) {
        carrito[i].cantidad--;
        if(carrito[i].cantidad==0){
            carrito.splice(i,1);
        }
      }
    }
    document.cookie = "carrito=" + JSON.stringify(carrito) + "; expires=" + (new Date(Date.now() + 7 * 24 * 60 * 60 * 1000)).toUTCString() + "; path=/";

  location.reload();
}
function sumar(id_producto) {
  var carritoActual = obtenerValorCookie("carrito");
    var carrito = JSON.parse(carritoActual);
    var productoExistente = false;

    for (var i = 0; i < carrito.length; i++) {
      if (carrito[i].id_producto === id_producto) {
        carrito[i].cantidad++;
      }
    }
    document.cookie = "carrito=" + JSON.stringify(carrito) + "; expires=" + (new Date(Date.now() + 7 * 24 * 60 * 60 * 1000)).toUTCString() + "; path=/";

  location.reload();
}
function eliminar(id_producto) {
  var carritoActual = obtenerValorCookie("carrito");
    var carrito = JSON.parse(carritoActual);
    var productoExistente = false;
    for (var i = 0; i < carrito.length; i++) {
      if (carrito[i].id_producto === id_producto) {
        carrito.splice(i,1);
      }
      
    }
    if(carrito.length == 0){
        document.cookie = "carrito=" + JSON.stringify(carrito) + "; expires=" + (new Date(Date.now() + 7 * 24 * 60 * 60 * 1000)).toUTCString() + "; path=/";
        window.location.href = "<?php echo base_url() . "/index" ?>";
      }else{
        document.cookie = "carrito=" + JSON.stringify(carrito) + "; expires=" + (new Date(Date.now() + 7 * 24 * 60 * 60 * 1000)).toUTCString() + "; path=/";
        location.reload();
      }
    
}

</script>
<?php 
 $carritoActual = $_COOKIE['carrito'];
 $carrito = json_decode($carritoActual, true);
    if (isset($_COOKIE["carrito"]) && count($carrito)==0){
        ?>
        <div class="container">
        <div class="gracias">
            <h1>El carrito está vacio</h1>
            <p>Cuando compres algún articulo aparecerá aqui</p>
        </div>
    </div>
    <?php
    }else{

?>
<h1>Tu carrito</h1>
<div class="container mt-3">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Sumar</th>
                <th>Restar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $precioTotal = 0;
            foreach ($datos_productos as $datos) :
                $existe = false;
                $cantidad = 1;
                if (isset($_COOKIE['carrito'])) {
                    $carritoActual = $_COOKIE['carrito'];
                    $carrito = json_decode($carritoActual, true);

                    for ($i = 0; $i < count($carrito); $i++) {
                        if ($carrito[$i]["id_producto"] == $datos->id) {
                            $cantidad = $carrito[$i]["cantidad"];
                            $existe = true;
                            continue;
                        }
                    }
                }
                if ($existe) {
            ?>
                    <tr>
                        <td><?php echo $datos->nombre; ?></td>
                        <td><?php echo $datos->precio . "€"; ?></td>
                        <td><?php if ($cantidad == 1) {
                                echo $cantidad . " unidad";
                            } else {
                                echo $cantidad . " unidades";
                            }; ?></td>
                        <td><?php $precioTotal +=  $cantidad * $datos->precio;
                            echo $cantidad * $datos->precio . "€"; ?></td>


                        <td>
                            <img src="<?php echo base_url() . "/public/img/suma.png" ?>" alt="Sumar" onclick="sumar(<?php echo $datos->id; ?>)" style="width: 100%; height: 100%;" />

                        </td>
                        <td>

                            <img src="<?php echo base_url() . "/public/img/resta.png" ?>" alt="Restar" onclick="restar(<?php echo $datos->id; ?>)" style="width: 100%; height: 100%;" />

                        </td>
                        <td>

                            <img src="<?php echo base_url() . "/public/img/papelera.png" ?>" alt="Eliminar" onclick="eliminar(<?php echo $datos->id; ?>)" style="width: 100%; height: 100%;" />

                        </td>
                    </tr>

            <?php
                }
            endforeach;
            ?>
        </tbody>
    </table>
    <div class="text-right">
        <h4>Precio Total: <span class="text-danger"><?php echo $precioTotal; ?></span></h4>
    </div>
    <form action="<?php echo base_url() . "/pagar" ?>" class="needs-validation" method="post">

        <div class="form-check">
            <input class="form-check-input" type="radio" name="opciones_pago" id="paypal" value="paypal" required>
            <label class="form-check-label" for="paypal">
                Pagar con PayPal
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="opciones_pago" id="efectivo" value="efectivo" required>
            <label class="form-check-label" for="efectivo">
                Pagar en efectivo
            </label>
        </div>


        <input type=text hidden value="<?php echo $precioTotal; ?>" name="precioTotal">
        <button type="submit" class="btn btn-primary">Pagar</button>
    </form>
</div>
<?php
}
?>
</body>

</html>