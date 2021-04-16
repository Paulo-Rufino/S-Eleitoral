<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	$candidate = '';
	$pos_id = '';
	$cont = 0;
	if(isset($_POST['vote'])){
		if(count($_POST) == 1){
			$_SESSION['error'][] = 'Por favor, realize seu voto';
		}
		else{
			$_SESSION['post'] = $_POST;
			$sql = "SELECT * FROM positions";
			$query = $conn->query($sql);
			$error = false;
			
			$sql_array = array();
			while($row = $query->fetch_assoc()){
				$position = slugify($row['description']);
				$pos_id = $row['id'];
				if(isset($_POST[$position])){
					$cont = $cont + 1;
					$candidate = $_POST[$position];
				}
				
			}

			if($cont==1){
				$sql_array[] = "INSERT INTO votes (voters_id, candidate_id, position_id) VALUES ('".$voter['id']."', '$candidate', '$pos_id')";
			}
			else{
				$error = true;
				$_SESSION['error'][] = 'Você só pode escolher um candidato.';
			}

			if(!$error){
				foreach($sql_array as $sql_row){
					$conn->query($sql_row);
				}

				unset($_SESSION['post']);
				$_SESSION['success'] = 'Cédula Enviada';

			}

		}

	}
	else{
		$_SESSION['error'][] = 'Selecione o candidato para votar';
	}

	header('location: home.php');

?>