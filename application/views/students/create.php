<div id="edit" style="margin-top:5%;">

		<!--setting the action for the button "Ingresar" in the div with the id go -->
	<?= form_open('students/insert',array('class'=>'form-horizontal' )); ?>
	

    <?= my_validation_errors(validation_errors());?>
    
    <div class="control-group">
      <?= form_label('Cédula: ','identification_card',array('class'=>'control-label')); ?>
      <?= form_input(array('type'=>'text','name'=>'identification_card','id'=>'identification_card','value'=>set_value('identification_card')));?>
    </div> 

    <div class="control-group">
      <?= form_label('Nombre: ','first_name',array('class'=>'control-label')); ?>
      <?= form_input(array('type'=>'text','name'=>'first_name','id'=>'first_name','value'=>set_value('first_name')));?>
    </div> 


    <div class="control-group">
      <?= form_label('Apellidos: ','last_name',array('class'=>'control-label')); ?>
      <?= form_input(array('type'=>'text','name'=>'last_name','id'=>'last_name','value'=>set_value('last_name')));?>
    </div> 

    <div class="control-group">
      <?= form_label('Email: ','email',array('class'=>'control-label')); ?>
      <?= form_input(array('type'=>'email','name'=>'email','id'=>'email','value'=>set_value('email')));?>
    </div> 

    <div id="go" class="form-actions">
 		<?= form_button(array('type'=>'submit','content'=>'Aceptar','class'=>'btn btn-primary')); ?>
 		<?= anchor('students/index','Cancelar',array('class'=>'btn'))?>
     </div>


	<?= form_close(); ?>
</div>