<?php
	session_start();

	if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)){
		header('Location: glowna.php');
		exit();
	}
?>

<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UBEZ.PL - ubezpieczenia na każdą kieszeń</title>
    <meta name="keywords" content="ubezpieczenie, auto, zdrowotne, ubezpieczyczalnia, ubez.pl, dom, rodzina, tanie ubezpieczenie, firma ubezpieczeniowa">
    <meta name="description" content="Firma UBEZ.PL oferuje ubezpieczenia wszelkiego rodzaju (OC/AC, ubezpieczenie mienia..) w konkurencyjnej cenie. Skontaktuj się z nami już dziś!">
    <link rel="stylesheet" href="style-logowanie.css">
    <link rel="icon" type="x-icon" href="img/icon.png">
    <!--BoxIcons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://kit.fontawesome.com/5b97fedfc1.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="jquery.scrollTo.min.js"></script>

</head>
<body>
    <article>
        <div>
            <div class="container-main">
                <img src="img/csm_insurance_952d181a9a.png" alt="">
                <div class="go-back"><a href="index.php"><i class='bx bx-arrow-back arrow'></i></a></div>
                <div class="home-text1">
                    <div id="container">
                        <form action="login.php" method="post" enctype="multipart/form-data">
                            
                            <input type="text" name="login" placeholder="login" onfocus="this.placeholder=''" onblur="this.placeholder='login'" required>
                            
                            <input type="password" name="password" placeholder="hasło" onfocus="this.placeholder=''" onblur="this.placeholder='hasło'" required>
                            
                            <input type="submit" value="Zaloguj się">
                            
                        </form>
                        <div class="info">
                            <div class="pas"><a href="#">Nie pamiętasz hasła?</a></div>
                            <div class="rej"><a href="rejestracja.html">Zarejestruj się</a></div>
                            <div style="clear:both;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="copyright">
                <p>&copy; 2022 UBEZ.PL - wszelkie prawa zastrzeżone.</p>
            </div>
        </footer>
    </article>

<?php
	if(isset($_SESSION['blad'])){
		echo $_SESSION['blad'];
	}
?>

</body>
</html>