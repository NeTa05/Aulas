<div id="ingreso" style="margin-top:5%;">

		<!--setting the action for the button "Ingresar" in the div with the id go -->
	<?= form_open('welcome/loginForm',array('class'=>'form-horizontal' )); ?>

    <?= my_validation_errors(validation_errors());?>

    <div class="control-group">
    				<!-- texto // for to link with the id login over here    -->
    	<?= form_label('Email: ','email',array('class'=>'control-label')); ?>
    	<?= form_input(array('type'=>'text','name'=>'email','id'=>'email','placeholder'=>'Digitar email..','value'=>set_value('email')));?>

    </div>
    <div class="control-group">
    	<?= form_label('Contraseña: ','password',array('class'=>'control-label')); ?>
    	<?= form_input(array('type'=>'password','name'=>'password','id'=>'password','value'=>set_value('password')));?>
    	
    </div>


   <div id="go" class="form-actions">
   		<?= form_button(array('type'=>'submit','content'=>'Ingresar','class'=>'btn btn-primary')); ?>
   		<?= anchor('welcome','Cancelar',array('class'=>'btn'))?>
   </div>


	<?= form_close(); ?>
</div>