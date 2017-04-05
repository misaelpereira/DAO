<?php 

require_once("config.php");
/* tras apenas 1 registro
$root = new Usuario();
$root->loadById(3);
echo $root;
*/
//$lista = Usuario::getList();

//echo json_encode($lista);

//$search = Usuario::search("m");
//echo json_encode($search);

//$acesso = new Usuario();
//$acesso->logar("maite", "321");

//echo $acesso;


//$newUsuario = new Usuario("Misael Pereira", "123213213132131");
//$newUsuario->insert();
//echo $newUsuario;

//$usuarioAtt = new Usuario();
//$usuarioAtt->loadById(8);
//$usuarioAtt->update("Pedro", "password");
//echo $usuarioAtt;


//DELETANDO USUARIO

$deletUser = new Usuario();
$deletUser->loadById(10);
$deletUser->deletUser();
echo $deletUser;

?>