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
            <li class = "lista_u_headeru"><a onclick ="otvori_stranicu('news.php')">NOVOSTI</a></li>
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

    <div id="content" >
        <div id="novosti">

                <?php include("SkriptePHP/Novosti.php");

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
<script src="JavaScript/otvaranjePodstranice.js"></script>

</body>
</html>