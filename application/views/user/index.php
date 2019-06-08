<h1>Users</h1>
<hr/>

<a href="<?= base_url() ?>log_curso/log_all"  class="btn btn-success"> Logs Cursos </a>

<table class="table">
    <thead class="thead-light">
        <tr>

            <th scope="col">Nombre</th>
            <th scope="col">Fecha</th>
            <th scope="col">Rol</th>
            <th scope="col">Estado</th>
            <th scope="col">Accion</th>
         

        </tr>
    </thead>
    <tbody>
        <?php
        if ($users) {

            foreach ($users as $user_item):
                ?>
                <tr>

                    <td> <a href="<?= base_url() ?>user/veiw_user/<?= $user_item['iduser']; ?>"> <?= $user_item['display_name']; ?> </a> </td>
                    <td><?= $user_item['create_time']; ?></td>

                    <td><?= $user_item['name']; ?></td>

                    <?php
                    if ($user_item['status'] == '1') {
                        ?>
                        <td><a href="<?= base_url() ?>user/change_status/<?= $user_item['status'] ?>/<?= $user_item['iduser']; ?>" class="badge badge-success">Activo</a></td>
                    <?php } else {
                        ?>
                        <td><a href="<?= base_url() ?>user/change_status/<?= $user_item['status'] ?>/<?= $user_item['iduser']; ?>" class="badge badge-warning">Inactivo</a></td>
                    <?php } ?>

                    <td> <a href="<?= base_url() ?>user/edit_user/<?= $user_item['iduser']; ?>"> Editar </a> </td>

                   
                </tr>
                <?php
            endforeach;
        } else {
            ?>

        <div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>No hay temas registrados</div> 

    <?php } ?>

</tbody>
</table>

