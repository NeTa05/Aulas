<div id="edit" style="margin-top:5%;">

    <!--setting the action for the button "Ingresar" in the div with the id go -->
  <?= form_open('welcome/update',array('class'=>'form-horizontal' )); ?>
  
    <legend>Actualizar registros</legend>

    <?= my_validation_errors(validation_errors());?>

    <div class="control-group">
      <?= form_label('ID: ','id',array('class'=>'control-label')); ?>
      <span class="uneditable-input"> <?= $register->id; ?> </span>
      <?= form_hidden('id',$register->id); ?>
    </div>

    <div class="control-group">
            <!-- texto // for to link with the id login over here    -->
      <?= form_label('Cédula: ','name',array('class'=>'control-label')); ?>
      <span class="uneditable-input"> <?= $register->identification_card; ?> </span>

    </div>

    <div class="control-group">
            <!-- texto // for to link with the id login over here    -->
      <?= form_label('Nombre: ','name',array('class'=>'control-label')); ?>
      <span class="uneditable-input"> <?= $register->first_name; ?> </span>

    </div>

    <div class="control-group">
            <!-- texto // for to link with the id login over here    -->
      <?= form_label('Apellidos: ','name',array('class'=>'control-label')); ?>
      <span class="uneditable-input"> <?= $register->last_name; ?> </span>

    </div>


    <div class="control-group">
            <!-- texto // for to link with the id login over here    -->
      <?= form_label('Email: ','name',array('class'=>'control-label')); ?>
      <span class="uneditable-input"> <?= $register->email; ?> </span>

    </div>

    <div class="control-group">
            <!-- texto // for to link with the id login over here    -->
      <?= form_label('Tipo: ','name',array('class'=>'control-label')); ?>
      <span class="uneditable-input"> <?= $register->kind; ?> </span>

    </div>

    <div class="control-group">
            <!-- texto // for to link with the id login over here    -->
      <?= form_label('Creado: ','name',array('class'=>'control-label')); ?>
      <span class="uneditable-input"> <?= $register->created; ?> </span>

    </div>

    <div class="control-group">
            <!-- texto // for to link with the id login over here    -->
      <?= form_label('Actualizado: ','name',array('class'=>'control-label')); ?>
      <span class="uneditable-input"> <?= $register->updated; ?> </span>

    </div>

   
    
   <div id="go" class="form-actions">
      <?= form_button(array('type'=>'submit','content'=>'Habilitar','class'=>'btn btn-primary')); ?>
      <?= anchor('welcome/activate','Cancelar',array('class'=>'btn'))?>
   </div>


  <?= form_close(); ?>
</div>