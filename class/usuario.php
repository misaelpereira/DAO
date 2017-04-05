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
			$this->setData($result[0]);
		}

	}

	public static function getList()
	{
		$sql = new Sql();
		return $sql->select("SELECT * FROM tab_usuario ORDER BY deslogin ASC");

	}

	public static function search($login)
	{
		$sql = new Sql();
		return $sql->select("SELECT * FROM tab_usuario WHERE deslogin LIKE :SEARCH ORDER BY deslogin ASC", array(
			':SEARCH'=>"%".$login."%"
			));
	}

	public function logar($login, $password)
	{
		$sql = new Sql();
		$result = $sql->select("SELECT * FROM tab_usuario WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
			":LOGIN"=>$login,
			":PASSWORD"=>$password
		));
		if(count($result) > 0)
		{
			$this->setData($result[0]);
		}
		else
		{
			throw new Exception("Login e/ou senha Invalidos", 1);
		}

	}

	public function setData($data)
	{
		$this->setIdusuario($data['idusuario']);
		$this->setDeslogin($data['deslogin']);
		$this->setDessenha($data['dessenha']);
	}

	public function insert()
	{
		$sql = new Sql();
		$result = $sql->select("CALL sp_usuarios_insert(:LOGIN, :SENHA)", array(
			":LOGIN"=>$this->getDeslogin(),
			":SENHA"=>$this->getDessenha()
			));
		if(count($result) > 0 )
		{
			$this->setData($result[0]);
		}

	}

	public function update($login, $senha)
	{

		$this->setDeslogin($login);
		$this->setDessenha($senha);

		$sql = new Sql();

		$sql->query("UPDATE tab_usuario SET deslogin = :LOGIN , dessenha = :SENHA WHERE idusuario = :ID", array(
			":LOGIN"=>$this->getDeslogin(),
			":SENHA"=>$this->getDessenha(),
			":ID"=>$this->getIdusuario()
			));

	}

	public function deletUser()
	{
		$sql = new Sql();
		$sql->query("DELETE FROM tab_usuario WHERE idusuario = :ID", array(
			':ID'=>$this->getIdusuario()
			));
		$this->setIdusuario(0);
		$this->setDeslogin("");
		$this->setDessenha("");
	}

	public function __construct($login = "", $senha = "")
	{
		$this->setDeslogin($login);
		$this->setDessenha($senha);
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