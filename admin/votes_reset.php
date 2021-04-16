<?php
	include 'includes/session.php';

	$sql = "DELETE FROM votes";
	if($conn->query($sql)){
		$_SESSION['success'] = "Votos Redefinidos com Sucesso";
	}
	else{
		$_SESSION['error'] = "Erro na redefinição";
	}

	header('location: votes.php');

?>