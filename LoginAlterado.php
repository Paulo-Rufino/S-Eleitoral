<?php
	include 'includes/session.php';
  
	if(isset($_POST['logar'])){
		
		$eleitor = $_POST['eleitor'];
		$Senha = $_POST['Senha'];
		$NovaSenha = $_POST['NovaSenha'];
		
		$sql = "SELECT * FROM voters WHERE voters_id = '$eleitor'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		
			$NovaSenha = password_hash($NovaSenha, PASSWORD_DEFAULT);
	     	 $sql = "UPDATE voters SET password = '$NovaSenha', log = 'true' WHERE voters_id = '$eleitor'";
	     	 
		 
	
		if($conn->query($sql)){
			$_SESSION['success'] = 'Senha Alterada';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
          
    }
	
header('location: home.php');
?>