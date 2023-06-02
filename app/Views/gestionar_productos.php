<table id="table_id" class="display">
    <thead>
        <tr>
            <th style="font-size: 40px; text-align:center">Gestionar productos</th>
            
            <div class="form-floating mb-3 mt-3" style="text-align:center">
                <a href="<?php echo base_url() . "/usuario/anadir_producto" ?>" class="btn btn-primary">Añadir producto</a>
            </div>

        </tr>
    </thead>
    <tbody>

        <?php
        $salto = "<br>";
        foreach ($datos_productos as $datos) :
        ?>

            <tr>
                <td>
                    <div class="container">
                        <div class="d-flex flex-row">
                            <div class="card oscurecer w-100">
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
                    <br>
                </td>
            </tr>
        <?php

        endforeach;

        ?>
    </tbody>
</table>
<script>
    let table = new DataTable(document.getElementById("table_id"), {
        paging: true,
        "pageLength": 5,
        "lengthMenu": [5, 10, 25, 50, 75, 100]
    });
</script>
</div>
</body>

</html>