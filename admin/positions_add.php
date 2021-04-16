<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$description = $_POST['Nome'];
		$max_vote = $_POST['Sigla'];
		$maximovoto = 1;

		$sql = "SELECT * FROM positions ORDER BY priority DESC LIMIT 1";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		$priority = $row['priority'] + 1;
		
		$sql = "INSERT INTO positions (description, max_vote, priority, maximovoto) VALUES ('$description', '$max_vote', '$priority', '$maximovoto')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Partido adicionado com sucesso';
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