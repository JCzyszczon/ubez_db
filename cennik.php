<?php
    session_start();

	require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    if($polaczenie->connect_errno!=0){
		echo "Error: ".$polaczenie->connect_errno;
	}
    else{
        $var1 = $_SESSION['variable'];
        $sql = " SELECT pakiet_ubezpieczenia.nazwa_ubez, typ_ubezpieczenia.nazwa_typu, typ_ubezpieczenia.cena  FROM pakiet_ubezpieczenia INNER JOIN typ_ubezpieczenia ON pakiet_ubezpieczenia.typID=typ_ubezpieczenia.id WHERE typ_ubezpieczenia.id > 1 ";
        $result = $polaczenie->query($sql);
        $polaczenie->close();
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

    <style>
        body{
            background-image: url("img/csm_insurance_952d181a9a_1.png");
        }

        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
            margin-top: 30px;
        }
 
        h1 {
            text-align: center;
            color: #004C99;
            font-size: 50px;
            font-family: 'Poppins', sans-serif;
        }
 
        td {
            background-color: #76b5c5;
            border: 1px solid black;
        }
 
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            font-size: 25px;
        }

        th{
            color: #000;
        }
 
        td {
            font-weight: lighter;
        }
        footer{
            position: absolute;
            bottom: -20%;
            width: 100%;
        }
        .arrow{
            font-size: 80px;
            text-decoration: none;
            color: var(--main-color);
            margin-left: 30px;
            margin-top: 30px;
            transition: 0.3s all ease-in-out;
        }

        .arrow:hover{
            color: #115DAA;
        }
    </style>
</head>
<body>
    <div class="go-back"><a href="konto.php"><i class='bx bx-arrow-back arrow'></i></a></div>
    <section>
        <h1>Cennik:</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>Rodzaj ubezpieczenia</th>
                <th>Nazwa pakietu</th>
                <th>Cena pakietu (zł/rok)</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows['nazwa_ubez'];?></td>
                <td><?php echo $rows['nazwa_typu'];?></td>
                <td><?php echo $rows['cena'];?></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </section>
    <footer>
        <div class="copyright">
            <p>&copy; 2022 UBEZ.PL - wszelkie prawa zastrzeżone.</p>
        </div>
    </footer>
</body>
 
</html>