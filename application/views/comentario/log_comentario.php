<h1>Log Comentarios</h1>
<hr/>

<table class="table">
    <thead class="thead-light">
        <tr>

            <th>Usuario</th>
            <th scope="col">Comentario</th>
            <th scope="col">Fecha</th>
            <th scope="col">Accion</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($logs_comment) {

            foreach ($logs_comment as $log_item):
                ?>
                <tr>
                    <td>  <?= $log_item['display_name']; ?> </a> </td>
                    <td>  <?= $log_item['text_log']; ?> </a> </td>
                    <td><?= $log_item['create_time_log']; ?></td>
                    <td> <?= $log_item['accion']; ?> </td>
                </tr>
                <?php
            endforeach;
        } else {
            ?>

        <div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>No hay temas registrados</div> 

    <?php } ?>

</tbody>
</table>