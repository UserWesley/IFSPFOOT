<?php

	//Destroi sessão e chama página do index.php
	session_start();
	session_destroy();
	header("LOCATION: ../index.php");

?>