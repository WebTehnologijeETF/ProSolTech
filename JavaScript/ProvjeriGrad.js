/*----------------------------------------------------Validacija namijenjena za poredjenje izabranog grada i njegovog postanskog broja----------------------------------------*/
var ajax = new XMLHttpRequest();

ajax.onreadystatechange = function(){
        //Anonimna funkcija
    if(ajax.readyState == 4 && ajax.status == 200){

        document.getElementById("state").innerHTML = ajax.responseText;
        document.getElementById("input_zipcode").innerHTML =ajax.responseText;


            var odziv =  JSON.parse(ajax.responseText);

            var zipcode = document.getElementById('input_zipcode');
            var zipcode_error = document.getElementById('zipcode_error');


                    if(Object.keys(odziv)[0] == "ok"){

                        zipcode.style.background ="green";
                        document.getElementById('zipcode_error').style.display ="none";
                        document.getElementById('checked4').style.display="block";

                        return true;

                    }
                    else {

                        zipcode.style.background = "red";
                        document.getElementById('unchecked4').style.display="block";
                        zipcode_error.style.background ="red";
                        zipcode_error.innerHTML = "Niste unijeli Postanski broj mjesta ili je uneseni pogresan!";
                        document.getElementById('zipcode_error').style.display ="block";
                        return false;
                    }

    }

    if(ajax.readyState == 4 && ajax.status == 404){
        document.getElementById("state").innerHTML = "Greska:nepoznatGrad";
        document.getElementById("input_zipcode").innerHTML = "Greska:nepoznatPostanskiBroj";
    }


}

function  ProvjeriGrad (Grad, zipcode) {
    ajax.open("GET","http://zamger.etf.unsa.ba/wt/postanskiBroj.php?mjesto="+ Grad + "&postanskiBroj=" + zipcode, true);
    ajax.send();

}
