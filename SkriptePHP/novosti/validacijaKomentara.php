<?php
/**
 * Created by PhpStorm.
 * User: Edin
 * Date: 5/28/2015
 * Time: 6:35 PM
 */
    function provjera_validnosti(){

        $validirano =true;


        $ime= htmlentities($_POST['kf_name']);
        $email= htmlentities($_POST['kf_email']);
        $poruka= htmlentities($_POST['kf_message']);

        if(trim($ime)==""){
            $validirano = false;

        }
        elseif(!preg_match('/^[a-zA-Z ČčĆćŠšĐđŽž]*$/',$ime)){
            $validirano = false;
            echo '<br>'."Nije ispravno uneseno ime ";
        }


        /*------------------------------Email validacija--------------------------------------------------
        */
        if(trim($email)==""){
            $validirano =false;
        }
        elseif(!preg_match('/^[a-z\._0-9]+@[a-z]+\.[a-z]{2,4}$/',$email)){
            $validirano = false;
            echo '<br>'."Niste unijeli ispravan email";
        }

        /*-------------------------------------Tekst validacija------------------------------------------*/
        if(trim($poruka)==""){
            $validirano =false;
            echo '<br>'."Niste unijeli nikakv tekst";
        }



        return $validirano;
    }
?>