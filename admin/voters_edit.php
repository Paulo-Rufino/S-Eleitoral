<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$password = $_POST['password'];

        $provincia = $_POST['provincia'];
		$bi = $_POST['bi'];
		$email = $_POST['email'];

		$sql = "SELECT * FROM voters WHERE id = $id";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		if($password == $row['password']){
			$password = $row['password'];
		}
		else{
			$password = password_hash($password, PASSWORD_DEFAULT);
		}

		$sql = "UPDATE voters SET firstname = '$firstname', lastname = '$lastname', password = '$password', provincia = '$provincia', BI = '$bi', email = '$email'  WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Eleitor Editado com Sucesso';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Preencha o formulário';
	}

	header('location: voters.php');

?>