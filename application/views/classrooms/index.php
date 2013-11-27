<div class="page-header" style="margin-top:5%">

				<!--controler -->
<?= form_open('', array('class'=>'form-search')); ?>	
	<?= anchor('classrooms/create','Agregar',array('class'=>'btn btn-primary'))?>
<?= form_close();?>

	<table class="table table-hover" >
		<thead>
			<tr class="success">
				<th>ID</th>
				<th>Código</th>
				<th>Nombre</th>
				<th>Ubicación</th>
				<th>Creado</th>
				<th>Actualizado</th>
			</tr>
		</thead>
	<tbody>
		
		<?php if(!empty($query)){foreach ($query as $register): ?>
		<tr class="success">
			<td><?= anchor('classrooms/edit/'.$register->id,$register->id,array('title'=>'Click para modificar o eliminar'));  		?></td>
			<td> <?= $register->code  ?>    </td>
			<td> <?= $register->name  ?>    </td>
			<td> <?= $register->location  ?>    </td>
			<td><?= date('d/m/Y - H:i',strtotime($register->created));?> </td>
			<td><?= date('d/m/Y - H:i',strtotime($register->updated));?> </td>
		</tr>
		<?php endforeach; }?> 
	</tbody>

	</table>

</div>