<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link href="ProSolTech.css" rel ="stylesheet"/>
    <title>Padajuci Header Efekat</title>
    <script src="JavaScript/menu.js"></script>
</head>
<body>

<div id = "container">
    <header>
        <a onclick ="otvori_stranicu('index.html')"> <img id="Logo" src="PSTLogo.png" alt="ProSolTech Logo"></a>
        <ul id =lista_headera>

            <li class = "lista_u_headeru"><a onclick ="otvori_stranicu('index.html')">NASLOVNA</a></li> <!-- ovo treba odraditi tj povezati linkove kasnije na moje stranice -->
            <li class = "lista_u_headeru"><a onclick =" otvori_stranicu('about_us.html')">O NAMA</a></li>
            <li class = "lista_u_headeru"><a onclick ="otvori_stranicu('news.php')" >NOVOSTI</a></li>
            <li id="meni" class = "lista_u_headeru" onmouseover="showMenu()" onmouseout="hideMenu()" ><a onclick ="otvori_stranicu('catalogue.html')">KATALOG</a>
                <ul id = "katalog_podmeni">
                    <li class = "test"><a onclick ="otvori_stranicu('index.html')">Godina 2009</a> </li>
                    <li class = "test"><a onclick ="otvori_stranicu('index.html')">Godina 2010</a> </li>
                    <li class = "test"><a onclick ="otvori_stranicu('index.html')">Godina 2011</a></li>
                    <li class = "test"><a onclick ="otvori_stranicu('index.html')">Godina 2012</a></li>
                    <li class= "test"><a onclick ="otvori_stranicu('noviKatalog.html')">novi item</a></li>
                </ul>
            </li>
            <li class = "lista_u_headeru"><a onclick ="otvori_stranicu('contact.html')">KONTAKT</a></li>

        </ul>
        <div id="header_Underline"></div>
    </header>
</div>
<main>
    <div id="banner">
        <img src="images/TheNews.jpg" alt="The news banner">
    </div>

    <div id="content_upperline"></div>

    <div id="content"  >
        <div id="novosti" >


            <?php

                $id_poslani=0;

                if(isset($_GET['sadrzajtxta']))
                    $id_poslani=$_GET['sadrzajtxta'];
                elseif(isset($_POST['hidden_vijest_id']))
                    $id_poslani =$_POST['hidden_vijest_id'];

                $veza_s_bazom = new PDO("mysql:dbname=prosoltechdatabase;host=localhost;charset=utf8", "Strojki", "semsudin123");
                $veza_s_bazom->exec("set names utf8");
                $rezultat = $veza_s_bazom->query("SELECT ID, UNIX_TIMESTAMP(vrijeme) as vrijeme2, autor ,naslov,URL, tekst, detaljnijiTekst
                                                  From novost
                                                  Order by vrijeme desc");
                $komentari_load = $veza_s_bazom->query("SELECT novost_id,naslov,email, tekst, autor, UNIX_TIMESTAMP(vrijeme) AS vrijeme3
                                                        FROM komentar
                                                        WHERE komentar.novost_id ='.$id_poslani.'");


            if (!$rezultat) {
                $greska = $veza_s_bazom->errorInfo();
                print "SQL greška: ".$greska[2];
                exit();
            }

            foreach ($rezultat as $vijest) {


                    if($vijest['ID']==$id_poslani){

                        $broj_komentara = $veza_s_bazom->query("SELECT count(*)
                                                          From novost n, komentar k
                                                          where n.id=k.novost_id and k.novost_id=".$vijest['ID']);

                        $broj_komentara=$broj_komentara->fetchColumn();


                        if($vijest['detaljnijiTekst']!=NULL){

                                if($vijest['URL']!=NULL )
                                    print  '<div id="vijest_linija"></div><br><br>'.'<small>'.date("d.m.Y. (h:i)", $vijest['vrijeme2']).'</small>'." ".'<br>'.'<p>'.$vijest['autor'].'</p>'.'<h1>'.$vijest['naslov'].'</h1>'." ".'<img src='.$vijest["URL"].' width="200"  > <br>'." ".'<p>'.$vijest['tekst'].'</p><a href="jednaNovost.php?sadrzajtxta=' . urlencode($vijest['ID']) . '"> [komentari('.$broj_komentara.')]</a><br>'.'<div id="vijest_linija"></div><br><br>';

                                else
                                    print  '<div id="vijest_linija"></div><br><br>'.'<small>'.date("d.m.Y. (h:i)", $vijest['vrijeme2']).'</small>'." ".'<br>'.'<p>'.$vijest['autor'].'</p>'.'<h1>'.$vijest['naslov'].'</h1>'." ".'<p>'.$vijest['tekst'].'</p><a href="jednaNovost.php?sadrzajtxta=' . urlencode($vijest['ID']) . '"> [komentari('.$broj_komentara.')]</a><br>'.'<div id="vijest_linija"></div><br><br>';

                            }

                        }


            }

            foreach($komentari_load as $komentar){

                $broj_komentara = $veza_s_bazom->query("SELECT count(*)
                                                          From novost n, komentar k
                                                         where n.id=k.novost_id and k.novost_id=".$id_poslani);
                $broj_komentara = $broj_komentara->fetchColumn();

                if($komentar['novost_id']==$id_poslani){
                    print  '<br><br>'.'<small>'.date("d.m.Y. (h:i)", $komentar['vrijeme3']).'</small>'." ".'<br><a href="mailto:'.$komentar['email'].'" target="_blank" >Send Mail :</a><small>'.$komentar['email'].'</small> <br>'." ".'<p>'.$komentar['tekst'].'</p><p>'.$komentar['autor'].'</p>'.'<br>'.'<div id="komentar_linija"></div><br><br>';

                }

            }
            ?>


        </div>
        <?php if(isset($_POST['posalji_komentar'])){
            include('SkriptePHP/novosti/validacijaKomentara.php');
            if(provjera_validnosti()) include('SkriptePHP/unosUBazu.php');
            else echo '<br>'."Greska";
        }

        ?>
        <!---------------------------------forma za unos komentara u bazu na zadatu vijest--------------------------------------------->
                         <form name="unesi_komentar_forma" id="komentar_form" action="jednaNovost.php"  method="post" >

                             <input type="hidden" value="<?php  if(isset($_REQUEST['hidden_vijest_id'])) echo $_REQUEST['hidden_vijest_id']; else echo $_REQUEST['sadrzajtxta'];?>" name="hidden_vijest_id">
                             Your name<br>
                                <input id="input_name" type="text" name="kf_name" placeholder="Ime">
                                <img id="checked" alt ="checked" src="images/check_icon.png">
                                <img id="unchecked" alt="unchecked" src="images/red-x.png">
                                <span id="ime_error" ></span><br>
                            Your e-mail<br>

                                <input id="input_email" type="email" name="kf_email">
                                <img id="checked2" alt ="checked" src="images/check_icon.png">
                                <img id="unchecked2" alt="unchecked" src="images/red-x.png">
                                <span id="mail_error"></span><br>

                            Message<br>

                                <img id="checked3" alt ="checked" src="images/check_icon.png">
                                <img id="unchecked3" alt="unchecked" src="images/red-x.png">
                                <textarea id="message_text_area" name="kf_message" placeholder="Vasa poruka" ></textarea>
                                <span id="message_error"></span><br>

                            <input id="button_input" onclick ="validateForm()" type="submit" value="Send" name="posalji_komentar"  >
                            <input id="button_clear" onclick ="formReset()" type="reset" value="Clear">
                        </form>
        <!--------------------------------------------------------------------------------------------------->

    </div>
    <div id="bottom_upperline"></div>
    <div id="bottom">

        <div id="facebook">
            <img src = "images/facebook_ico.png" alt="Facebook Logo" >
        </div>
        <div id="twitter">
            <img src = "images/twitter_ico.png" alt="Twitter Logo">
        </div>
    </div>

    <div id="bottom_underline"></div>

</main>

<footer id="Copy">
    Copyright &copy; Edin Strojil 2014/2015.
</footer>

<script src="JavaScript/popuniVijest.js"></script>
<script src="JavaScript/otvaranjePodstranice.js"></script>
<script src ="JavaScript/validateForm.js"></script>
</body>
</html>
