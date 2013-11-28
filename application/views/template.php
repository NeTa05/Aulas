<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Aulas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <!-- Bootstrap -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet" media="screen">
    <link href="<?= base_url('css/bootstrap-responsive.css') ?>" rel="stylesheet" media="screen">


    <!-- base url nos direcciona a la carpeta principal-->

   
  </head>
  <body style="">


      <div class="tabbable tabs-below" style="background:currentcolor">
  
        <ul class="nav nav-tabs">
           <?= my_first_menu(); ?>       
        </ul>
      </div>
      
           
              
         

   

    <div class="container-fluid">
      <div class="row-fluid">
        <!-- Menu de sistema-->
  	    <div class="span3" style="">
    	      <div class="well sidebar-nav">
              <ul class="nav nav-list" style="margin-top:10%">
                <li class="nav-header" style=""> Menu</li>
                <?= my_menu_app(); ?>
              </ul>
            </div>
  	    </div>
  	    <div class="span9">
    	     <!--Body content (vistas de la aplicacion)-->
           <br>

           <strong><legend><?= $title ?></legend></strong>
	         <?= $this->load->view($content) ?>
  	      

  	    </div>
	   </div>
     <br>

     <footer> 
          <!-- creating the icon copiright and date-->
      <p>  &copy; Misitio - <?= date('d-m-Y H:i')?> </p>
            <p> <?= "ID logueado(cambiar contraseña): ".$this->session->userdata('id'); ?></p>

        <!--inserting the variable of session('Usuario'), it is setting in home/about -->
      
     </footer>  


	 </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="//code.jquery.com/jquery.js"></script> consumir jquery de internet-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?= base_url('js/jquery.js') ?>" ></script>
    <script src="<?= base_url('js/bootstrap.min.js') ?>" ></script>
  </body>
</html>