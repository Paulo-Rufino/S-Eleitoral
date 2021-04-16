<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM voters WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Eleitor Eliminado com Sucesso';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Seleccione o item';
	}

	header('location: voters.php');
	
?>