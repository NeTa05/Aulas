<div id="edit" style="margin-top:5%;">

		<!--setting the action for the button "Ingresar" in the div with the id go -->
	<?= form_open('courses/insert',array('class'=>'form-horizontal' )); ?>
	

    <?= my_validation_errors(validation_errors());?>
    
    <div class="control-group">
      <?= form_label('Código: ','code',array('class'=>'control-label')); ?>
      <?= form_input(array('type'=>'text','name'=>'code','id'=>'code','value'=>set_value('code')));?>
    </div> 

    <div class="control-group">
      <?= form_label('Nombre: ','name',array('class'=>'control-label')); ?>
      <?= form_input(array('type'=>'text','name'=>'name','id'=>'name','value'=>set_value('name')));?>
    </div> 


    <div class="control-group">
        <?= form_label('Nombre de carrera', 'perfil_id', array('class'=>'control-label')); ?>
        <?= form_dropdown('id_career', $careers, 0); ?>
        <!--                value, text   -->
    </div>

    <div id="go" class="form-actions">
 		<?= form_button(array('type'=>'submit','content'=>'Aceptar','class'=>'btn btn-primary')); ?>
 		<?= anchor('courses/index','Cancelar',array('class'=>'btn'))?>
     </div>


	<?= form_close(); ?>
</div>