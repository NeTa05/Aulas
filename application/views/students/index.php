<div class="page-header" style="margin-top:5%">

				<!--controler -->
<?= form_open('', array('class'=>'form-search')); ?>	
	<?= anchor('students/create','Agregar',array('class'=>'btn btn-primary'))?>
<?= form_close();?>

	<table class="table table-hover" >
		<thead>
			<tr class="success">
				<th>ID</th>
				<th>Cédula</th>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Email</th>
				<th>Creado</th>
				<th>Actualizado</th>
			</tr>
		</thead>
	<tbody>
		
		<?php if(!empty($query)){foreach ($query as $register): ?>
		<tr class="success">
			<td><?= anchor('students/edit/'.$register->id,$register->id,array('title'=>'Click para modificar o eliminar'));  		?></td>
			<td> <?= $register->identification_card  ?>    </td>
			<td> <?= $register->first_name  ?>    </td>
			<td> <?= $register->last_name  ?>    </td>
			<td> <?= $register->email  ?>    </td>
			<td><?= date('d/m/Y - H:i',strtotime($register->created));?> </td>
			<td><?= date('d/m/Y - H:i',strtotime($register->updated));?> </td>
		</tr>
		<?php endforeach; }?> 
	</tbody>

	</table>

</div>