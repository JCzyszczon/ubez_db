<?php
    session_start();

    $var = $_SESSION['variable'];

    require_once "connect.php";

    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    if($polaczenie->connect_errno!=0){
		echo "Error: ".$polaczenie->connect_errno;
	}
    else{
        $polaczenie->query("UPDATE uzytkownicy SET ubezID = 4 WHERE id = $var");
        header('Location: oferta.php');
    }

?>