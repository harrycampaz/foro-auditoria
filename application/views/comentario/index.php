<h3><?= $tema ?></h3>
<hr/>
<?php if ($this->session->userdata('rol') < 3) { ?>
    <div>
        <a href="<?= base_url() ?>comentario/view_logs/<?= $idtema ?>"  class="btn btn-success"> Logs </a>
    </div>
<?php } ?>
<?php if ($status == '1') { ?>

    <br>
    <form action="<?= base_url() ?>comentario/check_add_comentario" method="POST">
        <div class="form-group">
            <textarea class="form-control" name="comentario" placeholder="Escribe comentario" rows="2"></textarea>
        </div>
        <?php echo form_hidden('idtema', $idtema); ?>
        <button type="submit" class="btn btn-primary mb-2">Guardar</button>
        <p class="label label-danger"><?= strip_tags(form_error('comentario')) ?></p>
    </form>
<?php } else { ?>
    <div class='alert alert-warning'><button type='button' class='close' data-dismiss='alert'>&times;</button>Tema cerrado</div> 
<?php } ?>

<b />
<b />

<?php
if ($comentarios) {

    foreach ($comentarios as $comentario_item):
        ?>
        <blockquote class="blockquote">
            <p class="mb-0"><?= $comentario_item['comment'] ?></p>
            <footer class="blockquote-footer"><?= $comentario_item['display_name'] ?> <cite title="Source Title"> - <?= $comentario_item['name'] ?> - <?= $comentario_item['create_time'] ?></cite></footer>

            <?php if ($comentario_item['iduser'] == $this->session->userdata('iduser')) { ?>
                <a href="<?= base_url()?>comentario/borrar_coment/<?= $comentario_item['idcomentario'] ?>/<?= $idtema ?>" class="badge badge-danger">Borrar</a>
            <?php } ?>

        </blockquote>
        <hr />
        <?php
    endforeach;
} else {
    ?>

    <div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>No hay Comentarios</div> 

<?php } ?>
