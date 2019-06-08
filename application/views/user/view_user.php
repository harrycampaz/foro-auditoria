<h1>Acceso a la aplicacion</h1>
<hr/>


<table class="table">
    <thead class="thead-light">
        <tr>


            <th scope="col">Fecha</th>
            <th scope="col">ip</th>



        </tr>
    </thead>
    <tbody>
        <?php
        if ($acceso) {

            foreach ($acceso as $acceso_item):
                ?>
                <tr>
                    <td><?= $acceso_item['create_time_acceso']; ?></td>
                    <td><?= $acceso_item['ip']; ?></td>

                </tr>
                <?php
            endforeach;
        } else {
            ?>

        <div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>El Usuario nunca a iniciado seccion</div> 

    <?php } ?>

</tbody>
</table>

