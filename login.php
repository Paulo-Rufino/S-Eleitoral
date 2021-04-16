<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$voter = $_POST['voter'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM voters WHERE voters_id = '$voter'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Não Encontramos o Eleitor com este ID';
		}
		else{
			$row = $query->fetch_assoc();
			if(password_verify($password, $row['password'])){
				$_SESSION['voter'] = $row['id'];
				$_SESSION['log'] = $row['log'];

			}
			else{
				$_SESSION['error'] = 'Palavra passe incorrecta';
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'Digite as credenciais';
	}

	header('location: index.php');

?>