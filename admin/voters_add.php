<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$filename = $_FILES['photo']['name'];
		$provincia = $_POST['provincia'];
		$bi = $_POST['bi'];
		$email = $_POST['email'];
		$log = 'false';
       
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		//generate voters id
		$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$voter = substr(str_shuffle($set), 0, 15);

       $sql = "SELECT * FROM voters WHERE BI ='".$bi."'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
	   
				if($row['BI'] == $bi){
					
					$_SESSION['error'] = 'O eleitor já foi cadastrado!';
				}else{
                 $sql = "INSERT INTO voters (voters_id, password, firstname, lastname, photo, provincia, BI, email, log) VALUES ('$voter', '$password', '$firstname', '$lastname', '$filename','$provincia', '$bi', '$email', '$log')";

                 	if($conn->query($sql) ){
			        	$_SESSION['success'] = 'Eleitor Inserido';
					}
					else{
						$_SESSION['error'] = $conn->error;
					}
				}
			

		/*ini_set('display_errors', 1);
		error_reporting( E_ALL );
		$emissor = "paulorufinomaria@gmail.com";
		$destinatario = $email;
		$assunto = "Credenciais de Acesso";
        $mensag = "Usuário:".$voter."\n". "Senha: ".$_POST['password'];
        $cab = "De:". $emissor;
        mail($destinatario, $assunto, $mensag, $cab);
        //echo "O Email foi enviado com sucesso!";*/


	}
	else{
		$_SESSION['error'] = 'Preencha o formulário';
	}

	header('location: voters.php');
?>