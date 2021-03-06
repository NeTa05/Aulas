<div class="page-header" style="margin-top:5%">


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
		
		<?php if(!empty($query)){foreach ($query as $register): ?>
		<tr class="success">
			<td><?= anchor('welcome/edit/'.$register->id,$register->id,array('title'=>'Click para habilitar'));  		?></td>
			<td> <?= $register->identification_card  ?>    </td>
			<td> <?= $register->first_name  ?>    </td>
			<td> <?= $register->last_name  ?>    </td>
			<td> <?= $register->email  ?>    </td>
			<td> <?= $register->kind  ?>    </td>
			<td> <?php if($register->status==0){echo"Desahabilitado";} else{echo"Habilitado";} ?>    </td>
			<td><?= date('d/m/Y - H:i',strtotime($register->created));?> </td>
			<td><?= date('d/m/Y - H:i',strtotime($register->updated));?> </td>
		</tr>
		<?php endforeach; }?>
	</tbody>

	</table>

</div>
