<?php

	/*Este arquivo realizará a destruição da sessão, após o encaminhará ao index*/

	//Destroi sessão e chama página do index.php
	session_start();
	session_destroy();
	header("LOCATION: ../index.php");

?>