<h1><?= $curso ?></h1>
<hr/>


<table class="table">
    <thead class="thead-light">
        <tr>
           
            <th scope="col">Titulo</th>
            <th scope="col">Fecha</th>
            <th scope="col">Estado</th>
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
                    <td><span class="badge badge-primary">Abierto</span></td>
                    <?php } else {
                        ?>
                    <td><span class="badge badge-secondary">Cerrado</span></td>
                    <?php } ?>
                    
                </tr>
                <?php
            endforeach;
        } else {
            ?>

        <div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>No hay temas registrados</div> 

<?php } ?>

</tbody>
</table>