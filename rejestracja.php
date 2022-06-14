<?php
	session_start();

    if(isset($_POST['email'])){
        $wszystko_OK=true;

        $imie=$_POST['imie'];
        if((strlen($imie)<3) || (strlen($imie)>20)){
            $wszystko_OK=false;
            $_SESSION['e_imie']="Imię musi posiadać od 3 do 20 znaków!";
        }
        if(ctype_alnum($imie)==false){
            $wszystko_OK=false;
            $_SESSION['e_imie']="Imię może składać się tylko z liter";
        }
        $nazwisko=$_POST['nazwisko'];
        if((strlen($nazwisko)<3) || (strlen($nazwisko)>20)){
            $wszystko_OK=false;
            $_SESSION['e_nazwisko']="Nazwisko musi posiadać od 3 do 20 znaków!";
        }
        if(ctype_alnum($nazwisko)==false){
            $wszystko_OK=false;
            $_SESSION['e_nazwisko']="Nazwisko może składać się tylko z liter";
        }
        $email=$_POST['email'];
        $emailB=filter_var($email,FILTER_SANITIZE_EMAIL);

        if((filter_var($emailB,FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email)){
            $wszystko_OK=false;
            $_SESSION['e_email']="Podaj poprawny adres e-mail!";
        }
        $tel=$_POST['tel'];
        if((strlen($tel)!=9)){
            $wszystko_OK=false;
            $_SESSION['e_tel']="Telefon może się składać z 9 cyfr!";
        }
        if(ctype_alnum($tel)==false){
            $wszystko_OK=false;
            $_SESSION['e_tel']="Telefon może składać się tylko z cyfr";
        }
        $login=$_POST['login'];
        if((strlen($login)<3) || (strlen($login)>20)){
            $wszystko_OK=false;
            $_SESSION['e_login']="Imię musi posiadać od 3 do 20 znaków!";
        }
        if(ctype_alnum($login)==false){
            $wszystko_OK=false;
            $_SESSION['e_login']="Imię może składać się tylko z liter";
        }
        $haslo1=$_POST['haslo1'];
        $haslo2=$_POST['haslo2'];

        if((strlen($haslo1)<8) || (strlen($haslo1)>20)){
            $wszystko_OK=false;
            $_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
        }

        if($haslo1!=$haslo2){
            $wszystko_OK=false;
            $_SESSION['e_haslo']="Podane hasła nie są identyczne!";
        }

        //$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);

        //czy zaakceptowano regulamin
        if(!isset($_POST['regulamin'])){
            $wszystko_OK=false;
            $_SESSION['e_regulamin']="Potwierdź akceptacje regulaminu!";
        }

       //Zapamiętaj wprowadzone dane
       $_SESSION['fr_imie'] = $imie;
       $_SESSION['fr_nazwisko'] = $nazwisko;
       $_SESSION['fr_email'] = $email;
       $_SESSION['fr_tel'] = $tel;
       $_SESSION['fr_login'] = $login;
       $_SESSION['fr_haslo1'] = $haslo1;
       $_SESSION['fr_haslo2'] = $haslo2;
       if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;

       require_once "connect.php";
       mysqli_report(MYSQLI_REPORT_STRICT);

       try 
       {
           $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
           if ($polaczenie->connect_errno!=0)
           {
               throw new Exception(mysqli_connect_errno());
           }
           else
           {
               //Czy email już istnieje?
               $rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");
               
               if (!$rezultat) throw new Exception($polaczenie->error);
               
               $ile_takich_maili = $rezultat->num_rows;
               if($ile_takich_maili>0)
               {
                   $wszystko_OK=false;
                   $_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
               }		

               //Czy nick jest już zarezerwowany?
               $rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$login'");
               
               if (!$rezultat) throw new Exception($polaczenie->error);
               
               $ile_takich_nickow = $rezultat->num_rows;
               if($ile_takich_nickow>0)
               {
                   $wszystko_OK=false;
                   $_SESSION['e_login']="Istnieje już osoba o takim loginie! Wybierz inny.";
               }
               if ($wszystko_OK==true)
               {
                                       
                   if ($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$imie', '$nazwisko', '$email',$tel, '$login', '$haslo1', 1)"))
                   {
                       $_SESSION['udanarejestracja']=true;
                       header('Location: witamy.php');
                   }
                   else
                   {
                       throw new Exception($polaczenie->error);
                   }
                   
      
               }
               
               $polaczenie->close();
           }
           
       }
       catch(Exception $e)
       {
           echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
           echo '<br />Informacja developerska: '.$e;
       }

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
    <link rel="stylesheet" href="style-rejestracja.css">
    <link rel="icon" type="x-icon" href="img/icon.png">
    <!--BoxIcons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://kit.fontawesome.com/5b97fedfc1.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="jquery.scrollTo.min.js"></script>
    <!--
    <style>
        .error{
            color: red;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        #container {
            margin-left: auto;
            margin-right: auto;
            position: absolute;
            width: 600px;
            height: 900px;
            left: 34%;
            top: 5%;
            padding: 80px 40px 40px;
            background: rgba(0,0,0,0.7);
            border-radius: 10px;
            color: #fff;
            box-shadow: 0 15px 25px rgba(0,0,0,0.5);
        }
        input[type=text],
        input[type=password],
        input[type=email],
        input[type=tel]
        {
            margin-left: 120px;
            width: 300px;
            background-color: #333;
            color: #efefef;
            border: 2px solid var(--bg-color);
            border-radius: 5px;
            font-size: 20px;
            padding: 10px;
            box-sizing: border-box;
            outline: none;
            margin-top: 20px;
        }

        input[type=text]:focus,
        input[type=password]:focus
        {
            border: 3px solid #fa1216;
            background-color: #222;
            color: #fa1216;
        }

        input[type=submit]
        {
            margin-left: 120px;
            width: 300px;
            background-color: var(--main-color);
            font-size:20px;
            color: var(--bg-color);
            padding: 15px 10px;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            letter-spacing: 2px;
            outline: none;
            transition: 0.2s all ease-in-out;
        }

        .accept{
            margin-left: 120px;
        }

        .error{
            color: red;
            margin-top: 10px;
            margin-bottom: 10px;
        }

    </style> -->
    <style>
        /* Google Fonts */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap');

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

:root{
    --main-color: #004C99;
    --text-color: #020307;
    --bg-color: #fff;
}

html::-webkit-scrollbar{
    width: 0.5rem;
    background: var(--text-color);

}

html::-webkit-scrollbar-thumb{
    background: var(--main-color);
    border-radius: 5rem;
}

body{
    color: var(--bg-color);
}

.container-main{
    width: 100%;
    height: 96%;
    /*position: relative;*/
    /*display: flex;*/
    align-items: center;
    background: rgb(2,3,7,0.4);
    border-bottom: 2px solid var(--main-color);
}

.container-main img{
    position: absolute;
    width: 100%;
    height: 96%;
    object-fit: cover;
    object-position: left;
    z-index: -10000000;
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

#container {
    margin-left: auto;
    margin-right: auto;
    position: absolute;
    width: 1000px;
    height: 850px;
    left: 25%;
    top: 5%;
    padding: 80px 40px 40px;
    background: rgba(0,0,0,0.7);
    border-radius: 10px;
    color: #fff;
    box-shadow: 0 15px 25px rgba(0,0,0,0.5);
  }

  legend{
    margin-left: 44%;
    color:var(--main-color);
}

.log{
    margin-top: 50px;
}

h1{
    text-align: center;
    font-size: 3rem;
    color: var(--main-color);
    padding: 20px;
    margin-bottom: 10px;
    letter-spacing: 3px;
    text-transform: uppercase;
}

.sub{
    margin-top: 30px;
}

input[type=text],
input[type=password],
input[type=email],
input[type=tel]
{
    margin-left: 100px;
	width: 300px;
	background-color: #333;
	color: #efefef;
	border: 2px solid var(--bg-color);
	border-radius: 5px;
	font-size: 20px;
	padding: 10px;
	box-sizing: border-box;
	outline: none;
    margin-top: 20px;
}

.login-data{
    margin-top: 30px;
    margin-bottom: 50px;
}

input[type=text]:focus,
input[type=password]:focus,
input[type=email]:focus,
input[type=tel]:focus
{
	border: 3px solid var(--main-color);
	background-color: #222;
	color: var(--main-color);
}

input[type=submit]
{
    margin-left: 60px;
	width: 300px;
	background-color: var(--main-color);
	font-size:20px;
	color: var(--bg-color);
	padding: 15px 10px;
	margin-top: 30px;
	border: none;
	border-radius: 5px;
	cursor: pointer;
	letter-spacing: 2px;
	outline: none;
    transition: 0.2s all ease-in-out;
}

input[type=submit]:focus
{
	-webkit-box-shadow: 0px 0px 15px 5px rgba(204,204,204,0.9);
	-moz-box-shadow: 0px 0px 15px 5px rgba(204,204,204,0.9);
	box-shadow: 0px 0px 15px 5px rgba(204,204,204,0.9);
}

input[type=submit]:hover
{
	background-color: #115DAA;
}

input[type=reset]
{
    margin-left: 180px;
	width: 300px;
	background-color: var(--main-color);
	font-size:20px;
	color: var(--bg-color);
	padding: 15px 10px;
	margin-top: 20px;
	border: none;
	border-radius: 5px;
	cursor: pointer;
	letter-spacing: 2px;
	outline: none;
    transition: 0.2s all ease-in-out;
}

input[type=reset]:focus
{
	-webkit-box-shadow: 0px 0px 15px 5px rgba(204,204,204,0.9);
	-moz-box-shadow: 0px 0px 15px 5px rgba(204,204,204,0.9);
	box-shadow: 0px 0px 15px 5px rgba(204,204,204,0.9);
}

input[type=reset]:hover
{
	background-color: #115DAA;
}

.pas{
    margin-top: 30px;
    font-size: 20px;
}

.pas a{
    text-decoration: none;
    color: var(--bg-color);
}

.pas a:hover{
    color: var(--main-color);
    text-decoration: underline;
}

.rej{
    font-size: 20px;
    margin-top: 30px;
}

.rej a{
    text-decoration: none;
    color: var(--main-color);
}

.rej a:hover{
    color: var(--bg-color);
    text-decoration: underline;
}

.footer{
    clear:both;
}

.copyright{
    padding: 5.5px;
    background-color: var(--main-color);
}

.copyright p{
    font-size: 18px;
    text-align: center;
    color: var(--bg-color);
    background-color: var(--main-color);
}
.error{
            color: red;
            margin-top: 10px;
            margin-bottom: 10px;
        }

.accept{
            margin-left: 120px;
        }

        .error{
            color: red;
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>

</head>
<body>
    <article>
    <div class="container-main">
        <img src="img/csm_insurance_952d181a9a.png" alt="">
        <div class="go-back"><a href="index.php"><i class='bx bx-arrow-back arrow'></i></a></div>
        <div class="home-text1">
            <div id="container">
                <h1>Rejestracja</h1>
                <form method="post">
                
                    <input type="text" value="<?php
                    if(isset($_SESSION['fr_imie'])){
                        echo $_SESSION['fr_imie'];
                        unset($_SESSION['fr_imie']);
                    }
                    ?>"name="imie" placeholder="Imię*" onfocus="this.placeholder=''" onblur="this.placeholder='Imię*'">
                    <?php
                        if(isset($_SESSION['e_imie'])){
                            echo '<div class="error">'.$_SESSION['e_imie'].'</div>';
                            unset($_SESSION['e_imie']);
                        }
                    ?>
                    <input type="text" value="<?php
                        if(isset($_SESSION['fr_nazwisko'])){
                            echo $_SESSION['fr_nazwisko'];
                            unset($_SESSION['fr_nazwisko']);
                        }
                    ?>"name="nazwisko" placeholder="Nazwisko*" onfocus="this.placeholder=''" onblur="this.placeholder='Nazwisko*'">
                    <?php
                        if(isset($_SESSION['e_nazwisko'])){
                            echo '<div class="error">'.$_SESSION['e_nazwisko'].'</div>';
                            unset($_SESSION['e_nazwisko']);
                        }
                    ?>
                    <input type="email" value="<?php
                        if(isset($_SESSION['fr_email'])){
                            echo $_SESSION['fr_email'];
                            unset($_SESSION['fr_email']);
                        }
                    ?>" name="email" placeholder="Adres e-mail*" onfocus="this.placeholder=''" onblur="this.placeholder='Adres e-mail*'">
                    <?php
                        if(isset($_SESSION['e_email'])){
                            echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                            unset($_SESSION['e_email']);
                        }
                    ?>
                    <input type="tel" value="<?php
                        if(isset($_SESSION['fr_tel'])){
                            echo $_SESSION['fr_tel'];
                            unset($_SESSION['fr_tel']);
                        }
                    ?>" name="tel" placeholder="Telefon" onfocus="this.placeholder=''" onblur="this.placeholder='Telefon*'">
                    <?php
                        if(isset($_SESSION['e_tel'])){
                            echo '<div class="error">'.$_SESSION['e_tel'].'</div>';
                            unset($_SESSION['e_tel']);
                        }
                    ?>
                    <input type="text" value="<?php
                        if(isset($_SESSION['fr_login'])){
                            echo $_SESSION['fr_login'];
                            unset($_SESSION['fr_login']);
                        }
                    ?>" name="login" placeholder="login*" onfocus="this.placeholder=''" onblur="this.placeholder='login*'">
                    <?php
                        if(isset($_SESSION['e_login'])){
                            echo '<div class="error">'.$_SESSION['e_login'].'</div>';
                            unset($_SESSION['e_login']);
                        }
                    ?>
                    <input type="password" value="<?php
                    if(isset($_SESSION['fr_haslo1'])){
                        echo $_SESSION['fr_haslo1'];
                        unset($_SESSION['fr_haslo1']);
                    }
                    ?>" name="haslo1" placeholder="haslo*" onfocus="this.placeholder=''" onblur="this.placeholder='haslo*'">
                    <?php
                        if(isset($_SESSION['e_haslo'])){
                            echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
                            unset($_SESSION['e_haslo']);
                        }
                    ?>
                    <input type="password" value="<?php
                    if(isset($_SESSION['fr_haslo2'])){
                        echo $_SESSION['fr_haslo2'];
                        unset($_SESSION['fr_haslo2']);
                    }
                    ?>" name="haslo2" placeholder="powtórz haslo*" onfocus="this.placeholder=''" onblur="this.placeholder='powtórz haslo*'">
                    <br><br>
                    <label><input type="checkbox" name="regulamin" <?php
                        if(isset($_SESSION['fr_regulamin'])){
                            echo "checked";
                            unset($_SESSION['fr_regulamin']);
                        }
                    ?> class="accept"> Akceptuje regulamin</label>

                    <?php
                        if(isset($_SESSION['e_regulamin'])){
                            echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
                            unset($_SESSION['e_regulamin']);
                        }
                    ?>
                    <?php
                        if(isset($_SESSION['e_bot'])){
                        echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
                        unset($_SESSION['e_bot']);
                        }
                    ?>

                    <input type="submit" value="Zarejestruj się"/>           
                </form>
            </div>
                    
        </div>
    </div>
    <footer>
            <div class="copyright">
                <p>&copy; 2022 UBEZ.PL - wszelkie prawa zastrzeżone.</p>
            </div>
    </footer>
    </article>
</body>
</html>