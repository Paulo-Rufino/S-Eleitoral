<?php
	$conn = new mysqli('localhost', 'root', '', 'votesystem');

	if ($conn->connect_error) {
	    die("Conexão falhada: " . $conn->connect_error);
	}
	
?>