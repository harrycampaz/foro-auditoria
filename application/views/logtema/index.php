<h1>Log Temas</h1>
<hr/>

<table class="table">
    <thead class="thead-light">
        <tr>

         
            <th scope="col">Tema</th>
            <th scope="col">Fecha</th>
            <th scope="col">Accion</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($logs) {

            foreach ($logs as $log_item):
                ?>
                <tr>
                    <td>  <?= $log_item['text_log']; ?> </a> </td>
                    <td><?= $log_item['create_time_log']; ?></td>
                    <td> <?= $log_item['accion']; ?> </td>
                </tr>
                <?php
            endforeach;
        } else {
            ?>

        <div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>No hay actividad registrada</div> 

    <?php } ?>

</tbody>
</table>



