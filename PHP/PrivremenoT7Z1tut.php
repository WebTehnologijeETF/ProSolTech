<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Tutorijal 6, Uvod</title>
</head>
<body>
<table>
    <table border ="1">
        <tr><th>Ime</th><th>Prezime</th><th>BrojTelefona</th><th>Akcije</th></tr>
        <?php
        //Dodavanje u datoteku
        if(isset($_REQUEST["dodavanje"] )){
            $novired = $_REQUEST["ime"].",".$_REQUEST["prezime"].",".$_REQUEST["BrojTelefona"]."\n";
            file_put_contents("imenik.txt",$novired,FILE_APPEND);
        }
        //brisanje iz datoteke
        if(isset($_REQUEST["brisanje"] )){
            $red = $REQUEST ['red'];
            $novadatoteka ="";
            $brojac =0;
            foreach (file ("imenik.txt") as $clan ) {
                if($brojac !=$red) $novadatoteka .=$clan;
                $brojac++;
            }
            $niz =file("imenik.txt");

            array_splice($niz,$red,1);
            $novadatoteka=join("",$niz);
            file_put_contents("imenik.txt", $novadatoteka);
        }



        $brojac=0;
        foreach (file ("imenik.txt") as $clan ) {
            echo "<tr>";
            foreach (explode(",",$clan) as $celija) {
                echo "<td>$celija</td>";
            }
            echo '<td> <form action="z1t7wt.php" method="post"><input type="hidden" name="red" value="'.
                $brojac.'"><input type="submit" name="brisanje" value ="X"/></form></td>';
            echo "</tr>";
            $brojac++;
        }

        ?>
    </table>
    <form action="z1t7wt.php" method="post">

        ime
        <input type="text" name="ime" size="15" />
        <br><br>
        Prezime
        <input type="text" name="prezime" size="15" />
        <br><br>
        Broj Telefona
        <input type="text" name="BrojTelefona" size="15" />
        <br><br>
        <input type="submit" name="dodavanje" value="Dodaj">

    </form>

</body>
</html>