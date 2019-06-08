<strong>Crear curso</strong> 

<hr/> 
<form class="form-inline" action="<?=base_url()?>curso/check_add_curso" method="POST">
  
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputName" class="sr-only">Nombre</label>
   
    <input type="text" class="form-control" name="name" id="inputName" placeholder="Nombre">
  
  </div>
  <button type="submit" class="btn btn-primary mb-2">Guardar</button>
    <p class="label label-danger"><?= strip_tags(form_error('name')) ?></p>
</form>
