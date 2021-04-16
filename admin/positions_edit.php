<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$description = $_POST['Nome'];
		$max_vote = $_POST['Sigla'];

		$sql = "UPDATE positions SET description = '$description', max_vote = '$max_vote' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Partido Editado com Sucesso';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Preencha o formulário';
	}

	header('location: positions.php');

?>