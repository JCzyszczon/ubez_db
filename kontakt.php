<?php

	session_start();

	if((!isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==false)){
		header('Location: index.php');
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
    <link rel="stylesheet" href="style-kontakt.css">
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

</head>
<body>
    <header>
        <a href="glowna.php" class="logo">UBEZ.PL</a>

        <ul class="navbar">
            <li><a href="glowna.php">Strona główna</a></li>
            <li><a href="oferta.php">Oferta</a></li>
            <li><a href="about.php">O nas</a></li>
            <li><a href="kontakt.php" class="home-active">Kontakt</a></li>
            <li><a href="#" class="usr"><i class='bx bxs-user'></i></a>
			    <ul>
				    <li><a href="konto.php">Konto</a></li>
				    <li><a href="logout.php">Wyloguj</a></li>
			    </ul>
		    </li>
        </ul>
        <a href="#" class="scrollup"></a>
    </header>

    <div class="container">
        <h1>KONTAKT</h1>
        <section class="location">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2561.0332267342296!2d19.918417951652774!3d50.066939379323294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47165ba6e4f1b1f7%3A0x8c640afa3e1e1140!2sCzarnowiejska%2C%20Krak%C3%B3w!5e0!3m2!1spl!2spl!4v1654965513913!5m2!1spl!2spl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
    </div>
        <section class="contact-us">
            <div class="row">
                <div class="contact-col">
                    <div>
                        <i class="fa fa-home"></i>
                        <span>
                            <h3>Bystra, Podhalańska 616</h3>
                            <p>34-240, Małopolska, Polska, PL</p>
                        </span>
                    </div>
                    <div>
                        <i class="fa fa-phone"></i>
                        <span>
                            <h3>+48 515 041 119</h3>
                            <p>Od poniedziałku do soboty</p>
                        </span>
                    </div>
                    <div>
                        <i class="fa fa-envelope-o"></i>
                        <span>
                            <h3>email@gmail.com</h3>
                            <h3>galkaandrzej4@gmail.com</h3>
                            <p>Zadaj pytanie na nasz adres email</p>
                        </span>
                    </div>
                </div>
                <div class="contact-col">
                    <form action="form-handler.php" method="post">
                        <input type="text" name="name" placeholder="Podaj imię" required>
                        <input type="email" name="email" placeholder="Podaj adres email" required>
                        <input type="text" name="subject" placeholder="Podaj temat" required>
                        <textarea rows="8" name="message" placeholder="Treść wiadomości" required></textarea>
                        <button type="submit" class="hero-btn red-btn">Wyślij</button>
                    </form>
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