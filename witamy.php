<?php
	session_start();

	if((!isset($_SESSION['udanarejestracja']))){
		header('Location: index.php');
		exit();
	}else{
        unset($_SESSION['udanarejestracja']);
    }

    //usuwamy zmiennych pamietajacych wartosci
    if(isset($_SESSION['fr_imie'])) unset($_SESSION['fr_imie']);
    if(isset($_SESSION['fr_nazwisko'])) unset($_SESSION['fr_nazwisko']);
    if(isset($_SESSION['fr_email'])) unset($_SESSION['fr_email']);
    if(isset($_SESSION['fr_tel'])) unset($_SESSION['fr_tel']);
    if(isset($_SESSION['fr_haslo1'])) unset($_SESSION['fr_haslo1']);
    if(isset($_SESSION['fr_haslo2'])) unset($_SESSION['fr_haslo2']);
    if(isset($_SESSION['fr_regulamin'])) unset($_SESSION['fr_regulamin']);

    //usuwanie bledow rejestracji
    if(isset($_SESSION['e_imie'])) unset($_SESSION['e_imie']);
    if(isset($_SESSION['e_nazwisko'])) unset($_SESSION['e_nazwisko']);
    if(isset($_SESSION['e_email'])) unset($_SESSION['e_email']);
    if(isset($_SESSION['e_tel'])) unset($_SESSION['e_tel']);
    if(isset($_SESSION['e_haslo1'])) unset($_SESSION['e_haslo1']);
    if(isset($_SESSION['e_haslo2'])) unset($_SESSION['e_haslo2']);
    if(isset($_SESSION['e_regulamin'])) unset($_SESSION['e_regulamin']);
?>


<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>UBEZ.PL - WITAMY!</title>
    <style>
        *{
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            text-decoration: none;
            scroll-padding-top: 2rem;
            scroll-behavior: smooth;

        }
        h1{
            font-size: 50px;
            margin-top: 100px;
            color: #004C99;
            text-align: center;
            font-weight: 1000;
        }
        h2{
            font-size: 40px;
            color: #fff;
            text-align: center;
            margin-top: 30px;
        }
        .btn1{
            padding: 0.7rem 1.4rem;
            background-color: #004C99;
            color: #fff;
            font-weight: 400;
            border-radius: 0.5rem;
            justify-content: none;
            align-items: none;
            position: relative;
            left: 50;
            top: 15%;
        }
        .btn1:hover{
            background-color: #115DAA;
        }
        body{
            background-image: url("img/csm_insurance_952d181a9a_1.png");
            color: #fff;
        }
    </style>
</head>
<body>
	
	<h1>Dziękujemy za rejestracje!</h1>
    <h2>Możesz już się zalogować na konto<h2><br>
	<a href="logowanie.php" class="btn1">LOGOWANIE</a>
</body>
</html>