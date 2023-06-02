<h1>Tus pedidos</h1>
<div class="container mt-3">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Pedido</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            
                <?php
                $contador = 0;
                foreach ($datos_pedidos as $datos) :
                    if ($datos->id_usuario_cliente == session("id")) {
                        $contador++;
                ?>
                <tr>
                        <td><?php echo "Numero " . $contador; ?></td>
                        <td><?php echo $datos->fecha; ?></td>
                        </tr>
                <?php
                    }
                endforeach;

                ?>

            
        </tbody>
    </table>