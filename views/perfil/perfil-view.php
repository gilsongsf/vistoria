<?php
	require_once('../../config.php');
	require_once('../../controllers/perfil/perfil-controller.php');
	include(HEADER_TEMPLATE);
	include('perfil-modal.php'); 
	
?>
 

<div class="col-sm-29 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Perfil</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a href="addperfil.php" class="btn btn-primary"><i class="fa fa-plus"></i> Novo</a>
	    	<a class="btn btn-default" href="perfil-view.php"><i class="fa fa-refresh"></i> Atualizar</a>
	    </div>
	</div>
</header>

<hr>
	<?php $perfil = new PerfilController()?>

<table class="table table-hover">
<thead>
	<tr>
		<th>Perfil</th>
	</tr>
</thead>
<tbody> 

<?php foreach($perfil->viewPerfilAll() as $key => $value): ?>
	<?php $permissoes = unserialize($value->permissoes);
	$teste = implode("|", $permissoes);
	 ?>
	<tr>
		<td><?php echo $value->perfil; ?></td>
		<td class="actions text-right">
			<a href="editperfil.php?id=<?php echo $value->id ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete" data-deleteid="<?php echo $value->id ?>"><i class="fa fa-trash"></i> Excluir</a>	
		</td>
	</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>

<?php include(FOOTER_TEMPLATE);?>