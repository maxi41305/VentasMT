

<?php require_once "dependencias.php" ?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

  <!-- Begin Navbar -->
  <div id="nav">
    <div class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="100">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="inicioempresa.php"><img class="img-responsive logo img-thumbnail" src="../img/ventas.jpg" alt="" width="150px" height="150px"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

          <ul class="nav navbar-nav navbar-right">

            <li class="active"><a href="inicioempresa.php"><span class="glyphicon glyphicon-home"></span> INICIO</a>
            </li>

            
          </li>
          
          </li>
          
          
      
           <li><a href="usuariosempresa.php"><span class="glyphicon glyphicon-user"></span> Administrar Usuario</a>
            </li>
           


           
          </li>
          <li><a href="ventasempresa.php"><span class="glyphicon glyphicon-usd"></span> Vender Artículo</a>
          </li>
          
          <li class="dropdown" >
          <a href="#" style="color: blue"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list"></span>Usuario: <?php echo $_SESSION['usuario']; ?>  <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li> <a style="color: blue" href="cambiarContrasenia.php"><span class="glyphicon glyphicon-cog"></span>Cambiar Contraseña</a></li>
              <li> <a style="color: blue" href="../procesos/salir.php"><span class="glyphicon glyphicon-off"></span> Salir</a></li>
              
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.contatiner -->
  </div>
</div>
<!-- Main jumbotron for a primary marketing message or call to action -->





<!-- /container -->        


</body>
</html>

<script type="text/javascript">
  $(window).scroll(function() {
    if ($(document).scrollTop() > 150) {
      $('.logo').height(200);

    }
    else {
      $('.logo').height(100);
    }
  }
  );
</script>
