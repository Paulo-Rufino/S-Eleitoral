<?php
	$conn = new mysqli('localhost', 'root', '', 'votesystem');

	if ($conn->connect_error) {
	    die("Conexão Falhou: " . $conn->connect_error);
	}
	
?>