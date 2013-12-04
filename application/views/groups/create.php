<div id="edit" style="margin-top:5%;">

		<!--setting the action for the button "Ingresar" in the div with the id go -->
	<?= form_open('groups/insert',array('class'=>'form-horizontal' )); ?>
	

    <?= my_validation_errors(validation_errors());?>
    

    <div class="control-group">
      <?= form_label('Nombre del grupo: ','name',array('class'=>'control-label')); ?>
      <?= form_input(array('type'=>'text','name'=>'name','id'=>'name','value'=>set_value('name')));?>
    </div> 


    <div class="control-group">
        <?= form_label('Nombre de profesor', 'professor_id', array('class'=>'control-label')); ?>
        <?= form_dropdown('professor_id', $professors,0); ?>
        <!--                value, text   -->
    </div>

    <div class="control-group">
        <?= form_label('Nombre del curso', 'professor_id', array('class'=>'control-label')); ?>
        <?= form_dropdown('course_id', $courses, 0); ?>
        <!--                value, text   -->
    </div>

    <div id="go" class="form-actions">
 		<?= form_button(array('type'=>'submit','content'=>'Aceptar','class'=>'btn btn-primary')); ?>
 		<?= anchor('groups/index','Cancelar',array('class'=>'btn'))?>
     </div>


	<?= form_close(); ?>
</div>