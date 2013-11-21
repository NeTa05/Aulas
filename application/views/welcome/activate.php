<div class="page-header" style="margin-top:5%">

								<!--controler -->
<?= form_open('index.php/perfil/search', array('class'=>'form-search')); ?>	
	<?= form_input(array('type'=>'text','name'=>'buscar','id'=>'buscar','placeholder'=>'Buscar por nombre..','class'=>'input-medium search-query'  ));?>
	<?= form_button(array('type'=>'submit','content'=>'<i class="icon-search"></i>','class'=>'btn','title'=>'Buscar')); ?>
	<?= anchor('index.php/perfil/create','Agregar',array('class'=>'btn btn-primary'))?>

<?= form_close();?>

	<table class="table table-hover" >
		<thead>
			<tr class="success">
				<th>ID</th>
				<th>Cédula</th>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Email</th>
				<th>Tipo</th>
				<th>Estado</th>
				<th>Creado</th>
				<th>Actualizado</th>
			</tr>
		</thead>
	<tbody>
		
		<?php foreach ($query as $registro): ?>
		<tr class="success">
			<td><?= anchor('welcome/updateUser/'.$registro->id,$registro->id);  		?></td>
			<td> <?= $registro->identification_card  ?>    </td>
			<td> <?= $registro->first_name  ?>    </td>
			<td> <?= $registro->last_name  ?>    </td>
			<td> <?= $registro->email  ?>    </td>
			<td> <?= $registro->kind  ?>    </td>
			<td> <?php if($registro->status==0){echo"Desahabilitado";} else{echo"Habilitado";} ?>    </td>
			<td><?= date('d/m/Y - H:i',strtotime($registro->created));?> </td>
			<td><?= date('d/m/Y - H:i',strtotime($registro->updated));?> </td>
		</tr>
		<?php endforeach; ?>
	</tbody>

	</table>

</div>
