<?php
	require_once("../../config.php");
	require_once("../../models/imovel/imovel.php");

	class ImovelController extends Imovel{

		public function addImovel($endereco,$numero,$complemento,$bairro,$cidade,$uf,$tipoimovel,$cep,$id_locador,$id_inquilino){			
				$imovel = new imovel();
				$imovel->setImovel($endereco,$numero,$complemento,$bairro,$cidade,$uf,$tipoimovel,$cep,$id_locador,$id_inquilino);
				
				if($imovel->insert()){
					header('Location:'.VIEWS.'imovel/imovel-view.php');
				}
		}

		public function editImovel($id,$endereco,$numero,$complemento,$bairro,$cidade,$uf,$tipoimovel,$cep,$id_locador,$id_inquilino){
				$imovel = new imovel();
				$imovel->setImovel($endereco,$numero,$complemento,$bairro,$cidade,$uf,$tipoimovel,$cep,$id_locador,$id_inquilino);

				if($imovel->update($id)){
					header('Location:'.VIEWS.'imovel/imovel-view.php');
				}
		}

		public function deleteImovel($id){
				$imovel = new imovel();
				if($imovel->delete($id)){
					header('Location:'.VIEWS.'imovel/imovel-view.php');
				}
		}

		public function viewImovelAll(){
			$imovel = new Imovel();
			$value = 'endereco';
			return $imovel->selectAllOrderBy($value);

		}

		public function viewUFAll(){
			$imovel = new imovel();
			$value = 'uf';
			return $imovel->selectUFAll($value);
		}

		public function selectImovel($id){
				$imovel = new imovel();
				return $imovel->select($id);
		}

		public function selectLocadorImovel($id){
			$imovel = new imovel();
			return $imovel->selectLocadorImovel($id);
		}

		public function selectInquilinoImovel($id){
			$imovel = new imovel();
			return $imovel->selectInquilinoImovel($id);
		}


	}


		if(!empty($_POST['editid'])){
			$imovel = new imovelController();
			$imovel->editimovel($_POST['editid'],$_POST['editendereco'],$_POST['editnumero'],$_POST['editcomplemento'],$_POST['editbairro'],$_POST['editcidade'],$_POST['edituf'],$_POST['edittipoimovel'],$_POST['editcep'],$_POST['edit_id_locador'],$_POST['edit_id_inquilino']);
		}

		if(!empty($_POST['endereco'])){
			$imovel = new imovelController();
			$imovel->addimovel($_POST['endereco'],$_POST['numero'],$_POST['complemento'],$_POST['bairro'],$_POST['cidade'],$_POST['uf'],$_POST['tipoimovel'],$_POST['cep'],$_POST['id_locador'],$_POST['id_inquilino']);
		}

		if(!empty($_POST['deleteid'])){
			$imovel = new imovelController();
			$imovel->deleteimovel($_POST['deleteid']);
		}
			
	