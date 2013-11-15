<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Codeigniter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <!-- Bootstrap -->
    <link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet" media="screen">
    <link href="<?= base_url('css/bootstrap-responsive.css') ?>" rel="stylesheet" media="screen">
    <!-- base url nos direcciona a la carpeta principal-->

   
  </head>
  <body style="background:;">



    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle-"collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#"> Titulo</a>

          <div class="nav-collapse collapse">
            <ul class="nav">
              
              <!--
              <li> <a href="#">Inicio </a></li>
              <li> <a href="#">Acerca De </a></li>
              <li> <a href="#">LogIn </a></li>
              <li> <a href="#">Logout</a></li>
              <li> <a href="#"> Cambio Clave</a></li> -->
                            
            </ul>
          </div>
        </div>
      </div>
    </div>

   

    <div class="container-fluid">
      <div class="row-fluid">
        <!-- Menu de sistema-->
  	    <div class="span3">
    	      <div class="well sidebar-nav">
              <ul class="nav nav-list">
                <li class="nav-header" style="margin-top: 35px;s"> Menu Usuario</li>
                
              </ul>
            </div>
  	    </div>
  	    <div class="span9">
  	    	<!--Body content (vistas de la aplicacion)-->
      	 
  	      
  	    </div>
	   </div>
     <br>

     <footer> 
          <!-- creating the icon copiright and date-->
      <p>  &copy; Misitio - <?= date('d-m-Y H:i')?> </p>
        <!--inserting the variable of session('Usuario'), it is setting in home/about -->
      
     </footer>  


	 </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="//code.jquery.com/jquery.js"></script> consumir jquery de internet-->-
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?= base_url('js/jquery.js') ?>" ></script>
    <script src="<?= base_url('js/bootstrap.min.js') ?>" ></script>
  </body>
</html>