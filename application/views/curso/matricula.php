<h1>Matriculate en el Curso </h1>

<hr/> 
<div class="card-deck mb-3 text-center">


    <?php
    if ($cursos) {

        foreach ($cursos as $curso_item):
            ?>

            <div class="card mb-4 box-shadow">
                    <div class="card-body">
                        <h3 class="card-title pricing-card-title"><?= $curso_item['name']; ?></h3>
                        <footer class="blockquote-footer"><?= $curso_item['display_name'] ?></cite></footer>

                        <a href="<?= base_url() ?>curso/matricular/<?= $curso_item['idcurso'] ?>" class="btn btn-lg btn-block btn-outline-primary">Matricular</a>
                    </div>
                    <div class="card-footer text-muted">
                        <?= $curso_item['create_time'] ?>
                    </div>
                </div>
            <?php
        endforeach;
        
        
    } else {
        ?>

        <div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>No tienes cursos registrados</div> 

    <?php } ?>

</div>




