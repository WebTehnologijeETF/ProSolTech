/**
 * Created by Edin on 4/27/2015.
 */
function otvori_stranicu (param) {

    var ajax = new XMLHttpRequest();

    ajax.onreadystatechange = function() {


        if (ajax.readyState == 4 && ajax.status == 200){
            document.open();
            document.write(ajax.responseText);
            document.close();
        }

        if (ajax.readyState == 4 && ajax.status == 404){

            document.write("Greska:nepoznatURL");
        }

    }

    ajax.open("GET", param, true);
    ajax.send();
}
