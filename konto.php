<?php

	session_start();

	if((!isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==false)){
		header('Location: index.php');
		exit();	
	}
    $var2 = $_SESSION['user-name'];
?>

<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UBEZ.PL - ubezpieczenia na każdą kieszeń</title>
    <meta name="keywords" content="ubezpieczenie, auto, zdrowotne, ubezpieczyczalnia, ubez.pl, dom, rodzina, tanie ubezpieczenie, firma ubezpieczeniowa">
    <meta name="description" content="Firma UBEZ.PL oferuje ubezpieczenia wszelkiego rodzaju (OC/AC, ubezpieczenie mienia..) w konkurencyjnej cenie. Skontaktuj się z nami już dziś!">
    <link rel="stylesheet" href="style-konto.css">
    <link rel="icon" type="x-icon" href="img/icon.png">
    <!--BoxIcons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://kit.fontawesome.com/5b97fedfc1.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="jquery.scrollTo.min.js"></script>

    <script>
        jQuery(function($)
        {
            //zresetuj scrolla
            $.scrollTo(0);
            $('#link1').click(function(){$.scrollTo($('#proj-link'), 300);});
            $('.scrollup').click(function(){$.scrollTo($('body'), 500);});
        }
        );
        
        // pokaż podczas przewijania
        $(window).scroll(function()
        {
            if($(this).scrollTop()>300) $('.scrollup').fadeIn();
            else $('.scrollup').fadeOut();
        }
        
        );
    </script>

    <style>
    </style>
</head>
<body>
    <header>
        <a href="glowna.php" class="logo">UBEZ.PL</a>

        <ul class="navbar">
            <li><a href="glowna.php">Strona główna</a></li>
            <li><a href="oferta.php">Oferta</a></li>
            <li><a href="about.php">O nas</a></li>
            <li><a href="kontakt.php">Kontakt</a></li>
            <li><a href="#" class="usr" class="home-active"><i class='bx bxs-user'></i></a>
			    <ul>
				    <li><a href="konto.php">Konto</a></li>
				    <li><a href="logout.php">Wyloguj</a></li>
			    </ul>
		    </li>
        </ul>
        <a href="#" class="scrollup"></a>
    </header>
    <section class="offer">
        <div class="container3">
            <h1>Witaj!</h1>
            <div class="main-content">
                <h2>Wybierz co chcesz zrobić:</h2>
                <div class="person">
                    <a href="personal.php">
                        <div class="1">
                            <img src="img/person.png" width="200px" height="200px" alt="">
                        </div>
                        <div class="2">
                            <p>Informacje o osobie</p>
                        </div>
                    </a>
                </div>
                <div class="person2">
                    <a href="login-data.php">
                        <div class="1">
                            <img src="img/lock.png" width="200px" height="200px" alt="">
                        </div>
                        <div class="2">
                            <p>Dane logowania</p>
                        </div>
                    </a>
                </div>
                <div class="clear"></div>
                <div class="person3">
                    <a href="cennik.php">
                        <div class="1">
                            <img src="img/list.png" width="200px" height="200px" alt="">
                        </div>
                        <div class="2">
                            <p>Cennik pakietów ubezpieczenia</p>
                        </div>
                    </a>
                </div>
                <div class="person4">
                    <a href="zakupione.php">
                        <div>
                            <img src="img/price.png" width="200px" height="200px" alt="">
                        </div>
                        <div>
                            <p>Informacje o zakupionych pakietach</p>
                        </div>
                    </a>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </section>
    <footer>
        <div class="copyright">
            <p>&copy; 2022 UBEZ.PL - wszelkie prawa zastrzeżone.</p>
        </div>
    </footer>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="main.js"></script>

</body>
</html>