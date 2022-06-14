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
    <link rel="stylesheet" href="style-glowna.css">
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
            <li><a href="glowna.php" class="home-active">Strona główna</a></li>
            <li><a href="oferta.php">Oferta</a></li>
            <li><a href="about.php">O nas</a></li>
            <li><a href="kontakt.php">Kontakt</a></li>
            <li><a href="#" class="usr"><i class='bx bxs-user'></i></a>
			    <ul>
				    <li><a href="konto.php">Konto</a></li>
				    <li><a href="logout.php">Wyloguj</a></li>
			    </ul>
		    </li>
        </ul>
        <a href="#" class="scrollup"></a>
    </header>

    <section class="main">
        <div>
            <div class="container-main">
                <img src="img/csm_insurance_952d181a9a.png" alt="">
                <div class="home-text1">
                    <div class="container1">
                        <h1>"Wiele osób mówi, że pieniądze nie są w życiu najważniejsze. Może to i prawda. Jednakże pieniądze mają wpływ na wszystko, co jest ważne – zdrowie, wykształcenie, jakość życia."</h1>
                        <h2>- KIM KIYOSAKI</h2>
                        <div class="button-div">
                            <a href="#" class="btn3-1" id="link1">Zobacz ofertę</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    <section class="offer" id="proj-link">
        <div class="car">
            <div class="description">
                <h1>Ubezpieczenie OC</h1>
                <h2>Obowiązkowe ubezpieczenie odpowiedzialności cywilnej posiadaczy pojazdów mechanicznych gwarantuje ochronę ubezpieczonego i pokrycie kosztów naprawy szkody wyrządzonej osobom trzecim. Jeżeli jesteś kierowcą, ubezpieczenie OC jest doskonałym zabezpieczeniem twojej sytuacji finansowej, która mogłaby ulec znaczącemu pogorszeniu w przypadku wystąpienia szkody komunikacyjnej z twojej winy. Posiadanie dobrej polisy OC to absolutny must have.</h2>
                <a href="oferta.php">Dowiedz się więcej.</a>
            </div>
            <div class="img-car">
                <img src="img/OC.png" width="450" height="450" alt="">
            </div>
        </div>
        <div class="car">
            <div class="img-car-AC">
                <img src="img/Automobilhersteller_AC_Logo.svg.png" width="450" height="450" alt="">
            </div>
            <div class="description-AC">
                <h1>Ubezpieczenie AC</h1>
                <h2>To dobrowolne ubezpieczenie komunikacyjne może być produktem dodatkowym do ubezpieczenia komunikacyjnego lub osobną polisą. Ubezpieczenie Auto Casco to znakomite rozszerzenie standardowej polisy OC. Ubezpieczenie Auto Casco zapewnia ochronę pojazdu od zdarzeń losowych, takich jak kolizje, wypadki, stłuczki, a także kradzież auta, działań sił natury oraz aktów wandalizmu.</h2>
                <a href="oferta.php">Dowiedz się więcej.</a>
            </div>
            <div class="clear"></div>
        </div>
        <div class="car">
            <div class="description">
                <h1>Ubezpieczenie Podróżne</h1>
                <h2>Wyjeżdżając na wycieczkę, warto zakupić dobrowolne ubezpieczenie podróżne. Karta EKUZ (Europejska Karta Ubezpieczenia Zdrowotnego) działa tylko na obszarze Unii Europejskiej, nie pokryje więc wszystkich kosztów. Natomiast ubezpieczenie podróżne, oprócz kosztów leczenia, które są podstawowym elementem ubezpieczenia, oferuje szereg innych, dodatkowych produktów, takich jak ubezpieczenie bagażu, sprzętu sportowego i inne.</h2>
                <a href="oferta.php">Dowiedz się więcej.</a>
            </div>
            <div class="img-car">
                <img src="img/Zrzut ekranu 2022-06-11 001536_1.png" width="450" alt="">
            </div>
        </div>
        <div class="car">
            <div class="img-car-AC">
                <img src="img/Zrzut ekranu 2022-06-11 003057_1.png" width="450" height="450" alt="">
            </div>
            <div class="description-AC">
                <h1>Ubezpieczenie Zdrowia / Życia</h1>
                <h2>Ubezpieczenie na życie to finansowe zabezpieczenie przyszłości bliskich ubezpieczonego na wypadek jego śmierci. W przypadku śmierci zostanie wypłacone świadczenie równe sumie ubezpieczenia. Przy ubezpieczeniu na życie, oprócz podstawowej ochrony, oferowane są dodatkowe produkty, które można dobrać do polisy.</h2>
                <a href="oferta.php">Dowiedz się więcej.</a>
            </div>
            <div class="clear"></div>
        </div>
    </section>
    <section class="about">
        <div>
            <div class="container-main">
                <img src="img/pacific-office-building_optimized-1024x683.jpg" alt="">
                <div class="home-text">
                    <div class="container3">
                        <h1>O NASZEJ FIRMIE</h1>
                        <h2>Firma UBEZ.PL, założona przez Marka Markowskiego - oferuje wszelkiego rodzaju ubezpieczenia na terenie całej Polski od 2005 roku. Od tego czasu stale spełnia oczekiwania swoich klientów zyskując miano jednej z najbardziej wiarygodnych firm ubezpieczeniowych. Już w 2006 roku, firma uzyskała prestiżowy certyfikat bezpieczeństwa, za jeden z najwyższych współczynników zadowolenia w Polsce. Nasza główna placówka znajduje się w Krakowie przy ulicy Czarnowiejskiej 216. W naszej ofercie znajduje się m.in. ubezpieczenie samochodu (OC/AC), domu czy zdrowia i życia.</h2>
                        <div class="button-div">
                            <a href="kontakt.php" class="btn3">Skontaktuj się z nami</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact">
        <h1 class="cntct">Kontakt</h1>
        <div class="additional">
          <div class="contact-col">
            <div>
                <i class="fa fa-home"></i>
                <span>
                    <h3>Kraków, Czarnowiejska 216</h3>
                    <p>34-240, Małopolska, Polska, PL</p>
                </span>
            </div>
            <div>
                <i class="fa fa-phone"></i>
                <span>
                    <h3>+48 675 321 123</h3>
                    <p>Od poniedziałku do soboty</p>
                </span>
            </div>
            <div>
                <i class="fa fa-envelope-o"></i>
                <span>
                    <h3>kontakt@ubez.com</h3>
                    <p>Zadaj pytanie na nasz adres email</p>
                </span>
            </div>
          </div>
          <div class="map-contact">
            <div class="mapouter"><div class="gmap_canvas"><iframe width="734" height="442" id="gmap_canvas" src="https://maps.google.com/maps?q=Krak%C3%B3w,%20Czarnowiejska%20216&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org">123 movies</a><br><style>.mapouter{position:relative;text-align:right;height:442px;width:734px;}</style><a href="https://www.embedgooglemap.net">embed google map in wordpress</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:442px;width:734px;}</style></div></div>
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