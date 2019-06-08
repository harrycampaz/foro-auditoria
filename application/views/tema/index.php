<h1><?= $curso ?></h1>
<hr/>

<a href="<?= base_url() ?>tema/add_tema/<?= $idcurso ?>" class="btn btn-success"> Nuevo Tema</a>

<a href="<?= base_url() ?>log_tema/index/<?= $idcurso ?>" class="btn btn-success"> Log Tema</a>

<a href="<?= base_url() ?>log_curso/log_curso/<?= $idcurso ?>" class="btn btn-success"> Log Curso</a>

<br/>
<br/>
<table class="table">
    <thead class="thead-light">
        <tr>

            <th scope="col">Titulo</th>
            <th scope="col">Fecha</th>
            <th scope="col">Estado</th>
            <th>Borrar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($temas) {

            foreach ($temas as $tema_item):
                ?>
                <tr>

                    <td> <a href="<?= base_url() ?>comentario/viewComentario/<?= $tema_item['idtema']; ?>"> <?= $tema_item['name']; ?> </a> </td>
                    <td><?= $tema_item['create_time']; ?></td>
                    <?php
                    if ($tema_item['status'] == '1') {
                        ?>
                        <td><a href="<?= base_url() ?>tema/change_status/<?= $tema_item['status'] ?>/<?= $tema_item['idtema']; ?>" class="badge badge-primary">Abierto</a></td>
                    <?php } else {
                        ?>
                        <td><a href="<?= base_url() ?>tema/change_status/<?= $tema_item['status'] ?>/<?= $tema_item['idtema']; ?>" class="badge badge-secondary">Cerrado</a></td>
                    <?php } ?>
                        
                        <th><a href="<?= base_url() ?>tema/borrar_tema/<?= $tema_item['idtema'] ?>/<?= $idcurso ?>" class="badge badge-danger">Borrar</a></th>
                </tr>
                <?php
            endforeach;
        } else {
            ?>

        <div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>No hay temas registrados</div> 

    <?php } ?>

</tbody>
</table>

<br />
<hr />

<h3>Usuarios matriculados</h3>

<table class="table">
    <thead class="thead-light">
        <tr>

            <th scope="col">Nombre</th>

            <th scope="col">Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($users) {

            foreach ($users as $user_item):
                ?>
                <tr>

                    <td> <a href="<?= base_url() ?>comentario/viewComentario/<?= $user_item['iduser']; ?>"> <?= $user_item['display_name']; ?> </a> </td>

                    <?php
                    if ($user_item['status_uc'] == '1') {
                        ?>
                        <td><a href="<?= base_url() ?>curso/change_status/1/<?= $user_item['iduser']; ?>/<?= $idcurso ?>" class="badge badge-primary">Aprovado</a></td>
                    <?php } else {
                        ?>
                        <td><a href="<?= base_url() ?>curso/change_status/0/<?= $user_item['iduser']; ?>/<?= $idcurso ?>" class="badge badge-secondary">Pendiente</a></td>
                    <?php } ?>
                </tr>
                <?php
            endforeach;
        } else {
            ?>

        <div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>No hay usuarios matriculados</div> 

    <?php } ?>

</tbody>
</table>

 <?php if ($temas) { ?>

<button disabled class="btn btn-secondary"> Borrar Curso</button>
<br>
<br>
<div class="alert alert-warning" role="alert">
  No puedes borrar el Curso ya que tiene temas
</div>
 <?php } else { ?>
<a href="<?= base_url() ?>curso/borrar_curso/<?= $idcurso ?>" class="btn btn-success"> Borrar Curso</a>

 <?php } ?>
