<h1>Editar Usuario</h1>

<hr/>
<form class="form-inline" action="<?= base_url() ?>user/check_edit_user" method="POST">

    <div class="form-group mx-sm-3 mb-2">

        <input type="text" disabled class="form-control" name="name" id="inputName"  value="<?= $user[$iduser]['display_name'] ?>">

    </div>

    <div class="form-group col-md-4">

        <select name="rol" class="form-control">
            <option selected>Elegir</option>
            <?php foreach ($roles as $rol): ?>
                <option value="<?= $rol['idrol'] ?>"><?= $rol['name'] ?></option>
                <?php
            endforeach;
            ?>
        </select>
    </div>
      <?php echo form_hidden('iduser', $iduser); ?>
    <button type="submit" class="btn btn-primary mb-2">Guardar</button>
    <p class="label label-danger"><?= strip_tags(form_error('name')) ?></p>
</form>

