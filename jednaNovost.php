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
            $novosti= file("PHP/novosti/".urlencode($_GET["sadrzajtxta"]));

            for ($i = 0; $i < count($novosti); $i++) {

                if ($i == 0) {
                    echo htmlentities($novosti[$i]);
                    ?><br><?php
                }
                else if ($i == 1) {
                    echo htmlentities($novosti[$i]);
                    ?><br><?php
                }
                else if ($i == 2) {
                    echo htmlentities($novosti[$i]);
                    ?> <br><?php

                } /*slika*/
                else if ($i == 3) {
                    if ($novosti[$i] == "\r\n") {
                        ?><br><?php
                    }
                    else {

                        ?><img src="<?php echo htmlentities($novosti[$i])?>" width="200"  > <?php
                        ?> <br><?php
                    }
                }
                else {

                    /*usao u recenicu nekog rednog broja i provjerava da li ona ima samo -- sto oznacava detaljnije link*/

                    echo $novosti[$i];


                    /*Sada prolazimo kroz preostali string novosti karakter po karakter dok ne dodjemo do -- a zatim sve stavljamo u <a> tag sa linkom za opsirnije*/

                }

            }?> <br><br><br><?php

            /*Zatvaramo dir for petlju*/
            ?>

        </div>

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
</body>
</html>
