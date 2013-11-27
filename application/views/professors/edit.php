<div id="edit" style="margin-top:5%;">

		<!--setting the action for the button "Ingresar" in the div with the id go -->
	<?= form_open('professors/update',array('class'=>'form-horizontal' )); ?>
	
    <?= my_validation_errors(validation_errors());?>

    <div class="control-group">
    	<?= form_label('ID: ','id',array('class'=>'control-label')); ?>
    	<span class="uneditable-input"> <?= $register->id; ?> </span>
      	<?= form_hidden('id',$register->id); ?>
    </div>

    <div class="control-group">
            <!-- texto // for to link with the id login over here    -->
      <?= form_label('Cédula: ','identification_card',array('class'=>'control-label')); ?>
      <?= form_input(array('type'=>'text','name'=>'identification_card','id'=>'identification_card','value'=>$register->identification_card));?>
    </div>

    <div class="control-group">
            <!-- texto // for to link with the id login over here    -->
      <?= form_label('Nombre: ','first_name',array('class'=>'control-label')); ?>
      <?= form_input(array('type'=>'text','name'=>'first_name','id'=>'first_name','value'=>$register->first_name));?>
    </div>

    <div class="control-group">
            <!-- texto // for to link with the id login over here    -->
      <?= form_label('Apellidos: ','last_name',array('class'=>'control-label')); ?>
      <?= form_input(array('type'=>'text','name'=>'last_name','id'=>'last_name','value'=>$register->last_name));?>
    </div>

    <div class="control-group">
            <!-- texto // for to link with the id login over here    -->
      <?= form_label('Email: ','email',array('class'=>'control-label')); ?>
      <?= form_input(array('type'=>'email','name'=>'email','id'=>'email','value'=>$register->email));?>
    </div>

    <div id="go" class="form-actions">
   		<?= form_button(array('type'=>'submit','content'=>'Aceptar','class'=>'btn btn-primary')); ?>
   		<?= anchor('professors/index','Cancelar',array('class'=>'btn'))?>
      <?= anchor('professors/delete/'.$register->id,'Eliminar',array('class'=>'btn btn-warning','onClick'=>"return confirm('Va a borrar ¿Seguro?')"))?>
   </div>


	<?= form_close(); ?>
</div>