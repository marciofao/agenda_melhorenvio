<?php
require_once "conecta.php";

if ($_POST) {
	//VERIFICA SE TODOS OS CAMPOS FORAM PREENCHIDOS
	if(in_array(null, $_POST)) die("Favor preencher todos os campos!"); 

	try{
		$stmt = $con->prepare('INSERT INTO organizacoes VALUES(NULL, :nome, :telefone)');
		$stmt->execute(array(
			':nome' => $_POST['nome'],
			':telefone' => $_POST['telefone']
			));

		echo $stmt->rowCount(); 
	} catch(PDOException $e) {
		echo 'Error: ' . $e->getMessage();
		die();
	}
}

	header(	"location:organizacoes.php");
	?>