<?php 

class Usuario {

	private $idusuario;
	private $deslogin;
	private $dessenha;

	public function getIdusuario()
	{
		return $this->idusuario;
	}

	public function setIdusuario($value)
	{
		$this->idusuario = $value;
	}

	public function getDeslogin()
	{
		return $this->deslogin;
	}

	public function setDeslogin($value)
	{
		$this->deslogin = $value;
	}

	public function getDessenha()
	{
		return $this->dessenha;
	}

	public function setDessenha($value)
	{
		$this->dessenha = $value;
	}

	public function loadById($id)
	{
		$sql = new Sql();
		$result = $sql->select("SELECT * FROM tab_usuario WHERE idusuario = :ID", array(
			":ID"=>$id
		));
		if(count($result) > 0)
		{
			$row = $result[0];

			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
		}

	}

	public function __toString(){

		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha()
			));
	}

}

 ?>