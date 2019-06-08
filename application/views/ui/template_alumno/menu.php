
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal"> <a href="<?= base_url() ?>">ForUnPa </a> - <?=$this->session->userdata('username')?></h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="<?= base_url() ?>curso/ver_curso">Ver Cursos</a>
      
    </nav>
  <a class="btn btn-outline-danger" href="<?= base_url() ?>main/logout">Salir</a>
</div>
<div class="container">