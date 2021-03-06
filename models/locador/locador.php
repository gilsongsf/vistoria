<?php

define('__LOCADOR__', dirname(dirname(__FILE__))); 
require_once(__LOCADOR__.'/Crud.php'); 

class Locador extends Crud{
	
	protected $table = 'locador';
	private $nome, $email, $telefone, $cpfcnpj;

	public function setLocador($nome,$email,$telefone,$cpfcnpj){
		$this->nome = $nome;
		$this->email = $email;
		$this->telefone = $telefone;
		$this->cpfcnpj = $cpfcnpj;
	}

	public function getLocador(){
		return $this->nome;
	}

	public function insert(){

		$sql  = "INSERT INTO $this->table (nome, email, telefone, cpfcnpj) VALUES (:nome,:email,:telefone,:cpfcnpj)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':telefone', $this->telefone);
		$stmt->bindParam(':cpfcnpj', $this->cpfcnpj);
		return $stmt->execute(); 

	}

	public function update($id){

		$sql  = "UPDATE $this->table SET nome = :nome , email = :email , telefone = :telefone , cpfcnpj = :cpfcnpj WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':telefone', $this->telefone);
		$stmt->bindParam(':cpfcnpj', $this->cpfcnpj);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
	}

	public function selectLocador($id_locador){
		$sql = "SELECT * FROM locador WHERE id = '$id_locador'";
		$stmt = DB::prepare($sql);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);

	}
	
}