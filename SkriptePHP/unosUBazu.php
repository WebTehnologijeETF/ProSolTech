<?php
/**
 * Created by PhpStorm.
 * User: Edin
 * Date: 5/27/2015
 * Time: 3:22 PM
 */

    $veza_s_bazom = new PDO( "mysql:dbname=prosoltechdatabase; host=localhost;charset=utf8", "Strojki", "semsudin123");
    $rezultat = $veza_s_bazom->prepare("INSERT INTO komentar (novost_id, autor, email, tekst) values (?, ?, ?, ?)");

    $id_vijesti= htmlentities($_POST['hidden_vijest_id']);
    $ime= htmlentities($_POST['kf_name']);
    $email= htmlentities($_POST['kf_email']);
    $poruka= htmlentities($_POST['kf_message']);

    $rezultat->bindParam(1,$id_vijesti);
    $rezultat->bindParam(2,$ime);
    $rezultat->bindParam(3,$email);
    $rezultat->bindParam(4,$poruka);
    $rezultat->execute();

    $veza_s_bazom=NULL;
    header("Location: jednaNovost.php?sadrzajtxta=".$id_vijesti);


        ?>