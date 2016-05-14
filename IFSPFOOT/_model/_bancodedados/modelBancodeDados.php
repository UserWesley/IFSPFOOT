<?php
	
	/*Este arquivo será responsável por realizar a conexão com o banco de dados*/

	$servername = "localhost";
	$username = "root";
	$password = "";

	try {
		
		$conn = new PDO("mysql:host=$servername;dbname=IFSPFOOT", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo "Connected successfully";
	}

	catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
		
?>