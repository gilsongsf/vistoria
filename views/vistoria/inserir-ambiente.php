<?php
	require_once('../../config.php');
  include(HEADER_TEMPLATE);
  require_once('../../controllers/vistoria/vistoria-controller.php');
  require_once('../../controllers/imovel/imovel-controller.php');
  require_once('../../controllers/cadastro-basico/tipovistoria/tipovistoria-controller.php');
  require_once('../../controllers/usuario/usuario-controller.php');
  include('vistoria-modal.php');

	

  if(isset($_GET['vistoria'])){
    $id_vistoria = $_GET['vistoria'];
    $vistoria = new vistoriaController();
  }
?>


<div class="col-sm-29 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Ambiente | Vistoria</h2>
		</div>
    <div class="col-sm-6 text-right h2">
        <a class="btn btn-primary" data-toggle="modal" data-target="#modal-insert-ambiente"><i class="fa fa-plus"></i> Novo Ambiente</a>
        <a class="btn btn-success" href="vistoria-view.php"><i class="fa fa-plus"></i> Concluir</a>
      </div>
	</div>
</header>


 

<hr>

<thead>

      
</thead>
<tbody> 
<table class="table table-striped table-bordered">
<thead>
  <tr>
    <th>Ambiente</th>
    <th>Opções</th>
  </tr>
</thead>
<tbody> 
<?php foreach($vistoria->selectAmbienteVistoria($id_vistoria) as $key => $value):
?>
  <tr>
    <td><?php echo $value->ambiente; ?></td>
    <td> <div class="btn-group pull-right">
         <button id="opcoes" type="button" class="btn btn-danger dropdown-toggle opcoes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Opções <span class="caret"></span>
         </button>
         <ul class="dropdown-menu">         
<li><a class="dropdown-item" href="<?php echo VIEWS; ?>vistoria/editar-ambiente.php?ambiente=<?php echo $value->id_ambiente?>&vistoria_ambiente=<?php echo $value->id_vistoria_ambiente ?>&vistoria=<?php echo $id_vistoria ?>"><span class="glyphicon glyphicon-edit"></span>  Editar</a></li>
         <li><a class="dropdown-item" href="<?php echo VIEWS; ?>vistoria/vistoria_ambiente_foto.php?ambiente=<?php echo $value->id_vistoria_ambiente?>&vistoria=<?php echo $id_vistoria ?>"><span class="glyphicon glyphicon-edit"></span>  Fotos</a></li>
         <li><a class="dropdown-item" href="<?php echo VIEWS; ?>vistoria/vistoria_ambiente_item.php?ambiente=<?php echo $value->id_vistoria_ambiente?>&vistoria=<?php echo $id_vistoria ?>"><span class="glyphicon glyphicon-edit"></span>  Itens</a></li>
         <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-delete-ambiente" data-idvistoria="<?php echo $id_vistoria ?>"  data-deleteambiente="<?php echo $value->id_vistoria_ambiente ?>"><span class="glyphicon glyphicon-trash"></span>  Excluir</a></li>
         </ul>
        </div></td>
  </tr>
<?php endforeach; ?>
</tbody>
</table>
</tbody>
</div>

<div class="modal fade" id="modal-insert-ambiente" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title text-center" id="ModalLabel">Ambiente | Vistoria</h4>
            </div>
            <div class="modal-body">
              <form method="POST" action="<?php echo CONTROLLERS; ?>vistoria/vistoria-controller.php">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="control-label">Ambiente:</label>
                    <input id="ambiente" name="ambiente" type="text" class="form-control" value="" required>
                    <input id="id_ambiente" name="id_ambiente" type="hidden" class="form-control" value="" required>
                    <input id="id_vistoria" name="id_vistoria" type="hidden" class="form-control" value="<?php echo $id_vistoria ?>" required>
                  </div>
                </div>
                 <div class="row">
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Adicionar Ambiente</button>
                    <a id="cancel" class="btn btn-default" data-dismiss="modal">Cancelar</a>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>

<?php include(FOOTER_TEMPLATE);?>