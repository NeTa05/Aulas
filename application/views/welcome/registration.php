<div id="edit" style="margin-top:5%;">

		<!--setting the action for the button "Ingresar" in the div with the id go -->
	<?= form_open('welcome/insert',array('class'=>'form-horizontal' )); ?>

    <?= my_validation_errors(validation_errors());?>

    <div class="control-group">
      <?= form_label('Número de cédula: ','identification_card',array('class'=>'control-label')); ?>
      <?= form_input(array('type'=>'text','name'=>'identification_card','id'=>'identification_card','value'=>set_value('identification_card')));?>
    </div> 

    <div class="control-group">
      <?= form_label('Nombre : ','first_name',array('class'=>'control-label')); ?>
      <?= form_input(array('type'=>'text','name'=>'first_name','id'=>'first_name','value'=>set_value('first_name')));?>
    </div> 

    <div class="control-group">
      <?= form_label('Apellidos : ','last_name',array('class'=>'control-label')); ?>
      <?= form_input(array('type'=>'text','name'=>'last_name','id'=>'last_name','value'=>set_value('last_name')));?>
    </div> 

    

    <div class="control-group">
      <?= form_label('Email: ','email',array('class'=>'control-label')); ?>
      <?= form_input(array('type'=>'email','name'=>'email','id'=>'email','value'=>set_value('email')));?>
    </div>


    <div class="control-group">
      <?= form_label('Contraseña: ','password',array('class'=>'control-label')); ?>
      <?= form_input(array('type'=>'password','name'=>'password','id'=>'password','value'=>set_value('password')));?>
    </div>

    <div class="control-group">
      <?= form_label('Repita contraseña: ','password2',array('class'=>'control-label')); ?>
      <?= form_input(array('type'=>'password','name'=>'password2','id'=>'password2','value'=>set_value('password2')));?>
    </div>

    <div class="control-group">

        <?= form_label('Tipo de usuario : ','kind',array('class'=>'control-label')); ?>
        <select name="kind">
            <option <?php echo set_select('kind', 'one', TRUE); ?> >Administrativo</option>
            <option <?php echo set_select('kind', 'two'); ?> >Profesor</option>
            <option <?php echo set_select('kind', 'three'); ?> >Alumno</option>
        </select>
    </div>

    

     <div id="go" class="form-actions">
     		<?= form_button(array('type'=>'submit','content'=>'Aceptar','class'=>'btn btn-primary','onClick'=>"return alert('Debe esperar que el Administrativo habilite su cuenta')")); ?>
     		<?= anchor('welcome/index','Cancelar',array('class'=>'btn'))?>
     </div>


	<?= form_close(); ?>
</div>