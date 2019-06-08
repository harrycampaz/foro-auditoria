<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bienvenidos al Foro: ForUnPa</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="shortcut icon" href="<?= base_url() ?>img/favicon.ico" />
    <!-- Custom CSS -->
     <link href="<?=base_url()?>css/login.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
  <div class="container" style="margin-top:40px">
  <div style="text-align:center">
  <?php  
      if(isset($mensaje)){
        echo $mensaje;
      } ?>
                <h3>Registrate a  ForUnPa</h3>
            </div>
<br/>
        <div class="row">
        
            <div class="col-lg-8 col-md-2 col-md-offset-2">
                <div class="panel panel-default">
                    
                    <div class="panel-body">
                        <form role="form" action="<?=base_url()?>signup/check_register" method="POST">
                            <fieldset>
                                <div class="row">
                                    <div class="center-block"> <img class="profile-img" src="<?=base_url()?>/img/foro.png" alt="Foro Foto"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                                        
                                         <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="glyphicon glyphicon-user"></i>
                                                </span> 
                                                <input class="form-control" placeholder="Nombre y Apellido" name="display_name" type="text" autofocus>
                                            </div>
                                              <p class="label label-danger"><?= strip_tags(form_error('display_name')) ?></p>
                                        </div>
                                        
                                         <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class=" glyphicon glyphicon-envelope"></i>
                                                </span> 
                                                <input class="form-control" placeholder="E-Mail" name="email" type="email">
                                            </div>
                                              <p class="label label-danger"><?= strip_tags(form_error('email')) ?></p>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="glyphicon glyphicon-user"></i>
                                                </span> 
                                                <input class="form-control" placeholder="Username" name="username" type="text">
                                            </div>
                                             <p class="label label-danger"><?= strip_tags(form_error('username')) ?></p>
                                        </div>
                                        
                                       
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="glyphicon glyphicon-lock"></i>
                                                </span>
                                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                            </div>
                                             <p class="label label-danger"><?= strip_tags(form_error('password')) ?></p>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-lg btn-primary btn-block" value="Enviar">
                                        </div>
                                        
                                        <div class="form-group">
                                            <a href="<?=base_url()?>login" class="btn btn-success" > Acceder </a>
                                        </div>
                                    
                                    
                                    <div class="form-group">
                                        <a href="<?=base_url()?>" class="btn btn-info">Volver al Inicio</a>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    
                </div>
               
            </div>
        </div>
    </div>
</body>
</html>
