/**
 * Created by Edin on 5/14/2015.
 */
function popuni_vijesti (input) {

    var vijest = new XMLHttpRequest();

    vijest.onreadystatechange = function() {


        if (vijest.readyState == 4 && vijest.status == 200){

            document.getElementById('novosti').innerHTML+=(vijest.responseText);

        }

        if (vijest.readyState == 4 && vijest.status == 404){

            document.write("Greska:Nije ucitana vijest");
        }

    }

    vijest.open("GET", "SkriptePHP/jednaNovost.php?sadrzajtxta="+input, true);
    vijest.send();
}
