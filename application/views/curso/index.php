<a href="<?= base_url() ?>curso/add_curso"  class="btn btn-success"> Crear Curso </a>

<a href="<?= base_url() ?>log_curso"  class="btn btn-success"> Logs </a>

<hr/> 
<div class="card-deck mb-3 text-center">


    <?php
    if ($cursos) {

        foreach ($cursos as $curso_item):
            ?>


            <div class="card mb-4 box-shadow">
                <div class="card-body">
                    <h3 class="card-title pricing-card-title"><?= $curso_item['name']; ?></h3>
                    <a href="tema/index/<?= $curso_item['idcurso']?>" class="btn btn-lg btn-block btn-outline-primary">Debate</a>
                </div>
            </div>
            <?php
        endforeach;
        
        
    } else {
        ?>

        <div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>No tienes cursos registrados</div> 

    <?php } ?>

</div>


