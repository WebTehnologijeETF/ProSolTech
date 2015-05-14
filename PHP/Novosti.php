<div class="prikaz_novost">
<?php

$dir = scandir('PHP/novosti');

?> <br><?php
for( $j=2; $j< count($dir); $j++) {

   $novosti= file("PHP/novosti/".$dir[$j]);


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

                if( $novosti[$i]=="--\r\n") {

                    ?><a href="jednaNovost.php?sadrzajtxta=<?=urlencode($dir[$j])?>"> [detaljnije]  </a><?php
                    break;
                }
                else{
                    echo $novosti[$i];
                    continue;
                }


            /*Sada prolazimo kroz preostali string novosti karakter po karakter dok ne dodjemo do -- a zatim sve stavljamo u <a> tag sa linkom za opsirnije*/

        }

    }?> <br><br><br><?php

}/*Zatvaramo dir for petlju*/
?>
</div>
