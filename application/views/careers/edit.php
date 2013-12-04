<div id="edit" style="margin-top:5%;">

		<!--setting the action for the button "Ingresar" in the div with the id go -->
	<?= form_open('careers/update',array('class'=>'form-horizontal' )); ?>
	
    <?= my_validation_errors(validation_errors());?>

    <div class="control-group">
    	<?= form_label('ID: ','id',array('class'=>'control-label')); ?>
    	<span class="uneditable-input"> <?= $register->id; ?> </span>
      	<?= form_hidden('id',$register->id); ?>
    </div>

    <div class="control-group">
            <!-- texto // for to link with the id login over here    -->
      <?= form_label('Código: ','code',array('class'=>'control-label')); ?>
      <?= form_input(array('type'=>'text','name'=>'code','id'=>'code','value'=>$register->code));?>
      <?= form_hidden('code1',$register->code); ?>
    </div>

    <div class="control-group">
            <!-- texto // for to link with the id login over here    -->
      <?= form_label('Nombre: ','name',array('class'=>'control-label')); ?>
      <?= form_input(array('type'=>'text','name'=>'name','id'=>'name','value'=>$register->name));?>
    </div>


    <div id="go" class="form-actions">
   		<?= form_button(array('type'=>'submit','content'=>'Aceptar','class'=>'btn btn-primary')); ?>
   		<?= anchor('careers/index','Cancelar',array('class'=>'btn'))?>
      <?= anchor('careers/delete/'.$register->id,'Eliminar',array('class'=>'btn btn-warning','onClick'=>"return confirm('Va a borrar ¿Seguro?')"))?>
   </div>


	<?= form_close(); ?>
</div>