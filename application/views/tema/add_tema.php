<strong>Crear Tema</strong> 

<hr/> 
<form class="form-inline" action="<?=base_url()?>tema/check_add_tema" method="POST">
  
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputName" class="sr-only">Tema</label>
   
    <input type="text" class="form-control" name="tema" id="inputName" placeholder="Titulo del tema">
  
  </div>
    
     <?php 
        echo form_hidden('idcurso', $idcurso);?>
  <button type="submit" class="btn btn-primary mb-2">Guardar</button>
    <p class="label label-danger"><?= strip_tags(form_error('tema')) ?></p>
</form>
