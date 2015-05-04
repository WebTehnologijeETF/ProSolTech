/* Created by Edin on 4/27/2015.*/

function sakrijElementeForme(){

    var element = document.getElementById('forma_za_bazu');
    element.style.display="none";
}
function prikaziElementeForme(){

    var element = document.getElementById('forma_za_bazu');
    element.style.display="block";
}

function global(){

    var akcija = document.getElementById('item_akcija').selectedIndex;

    if( akcija== 0){
        unesiUBazu();
    }

    else if (akcija== 2) {
        obrisiIzBaze();
    }
    else{
        modifikujUBazi();
    }

}
function elementiForme () {
    var akcija = document.getElementById('item_akcija').selectedIndex;

    if( akcija== 0){
        prikaziElementeForme();
    }

    else if (akcija== 2) {
        sakrijElementeForme();
    }
    else{
        prikaziElementeForme();
    }
}

//Unosenje Itema u bazu
function  unesiUBazu (){

    var ajax = new XMLHttpRequest();
    var akcija = document.getElementById('item_akcija').value;
    alert(akcija);
    var proizvod ={
        /* unos svih potrebnih informacija vezanih za proizvod iz forme*/
        naziv: document.getElementById('input_item_name').value,
        opis :document.getElementById('input_item_description').value,
        slika: document.getElementById('input_image').value,
        url: document.getElementById('input_URL').value,
        dostupnost: (document.getElementById('input_availability').checked ? 1:0),
        kolicina: document.getElementById('input_quantity').value,
        cijena: parseFloat(document.getElementById('input_price').value)

    }
    ajax.onreadystatechange = function() {

        if (ajax.readyState == 4 && ajax.status == 200){

            // prolazi kroz citav niz JSON objekata i dodaje IDjeve istih u select

            napuniIDjeve();
        }

        if (ajax.readyState == 4 && ajax.status == 404){

            document.write("Greska:nije obrisan proizvod");
        }

    }

    ajax.open("POST","http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=15754", true);
    ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");

    ajax.send("akcija="+akcija+"&proizvod="+ JSON.stringify(proizvod));

}
//Brisanje itema iz baze
function obrisiIzBaze(){

    var brisanje = new XMLHttpRequest();
    var akcija = document.getElementById('item_akcija').value;
    var selektovaniID = parseInt(document.getElementById("id_change").options[document.getElementById("id_change").selectedIndex].text);

    var proizvod ={
        /* brisanje informacija vezanih za proizvod iz forme preko IDa*/
        id: selektovaniID,
        naziv: "",
        opis :"",
        slika: "",
        url:"",
        dostupnost: "",
        kolicina: "",
        cijena:""

    }
    brisanje.onreadystatechange = function() {

        if (brisanje.readyState == 4 && brisanje.status == 200){

            // prolazi kroz citav niz JSON objekata i dodaje IDjeve istih u select

            napuniIDjeve();
        }

        if (brisanje.readyState == 4 && brisanje.status == 404){

            document.write("Greska:nije obrisan proizvod");
        }

    }

    brisanje.open("POST","http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=15754", true);
    brisanje.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    alert(akcija);
    brisanje.send("akcija="+akcija+"&proizvod="+ JSON.stringify(proizvod));
}
//Modifikacija itema po IDu

function modifikujUBazi(){

    var modifikacija = new XMLHttpRequest();
    var akcija = document.getElementById('item_akcija').value;
    var selektovaniID = parseInt(document.getElementById("id_change").options[document.getElementById("id_change").selectedIndex].text);

    var proizvod ={
        /* brisanje informacija vezanih za proizvod iz forme preko IDa*/
        id: selektovaniID,
        naziv: document.getElementById('input_item_name').value,
        opis :document.getElementById('input_item_description').value,
        slika: document.getElementById('input_image').value,
        url: document.getElementById('input_URL').value,
        dostupnost: (document.getElementById('input_availability').checked ? 1:0),
        kolicina: document.getElementById('input_quantity').value,
        cijena: parseFloat(document.getElementById('input_price').value)

    }
    modifikacija.onreadystatechange = function() {

        if (modifikacija.readyState == 4 && modifikacija.status == 200){

            napuniIDjeve();
            }

        if (modifikacija.readyState == 4 && modifikacija.status == 404){

            document.write("Greska:nije obrisan proizvod");
        }

    }

    modifikacija.open("POST","http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=15754", true);
    modifikacija.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    alert(akcija);
    modifikacija.send("akcija="+akcija+"&proizvod="+ JSON.stringify(proizvod));
}




//Punjenje IDeva iz baze
 function napuniIDjeve() {
    napuniTabelu();
    var ucitajBazu = new XMLHttpRequest();

    ucitajBazu.onreadystatechange = function() {

                var unosIdLista = document.getElementById("id_change");

                if (ucitajBazu.readyState == 4 && ucitajBazu.status == 200){

                    var duzina= JSON.parse(ucitajBazu.responseText);

                    // prolazi kroz citav niz JSON objekata i dodaje IDjeve istih u select

                    for(i =0 ; i < duzina.length ; i++ ){

                        var option = document.createElement("option");
                        option.text = duzina[i].id;
                        unosIdLista.add(option);
                    }
                }

                if (ucitajBazu.readyState == 4 && ucitajBazu.status == 404){

                    document.write("Greska:nepoznatURL");
                }

            }
    ucitajBazu.open("POST","http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=15754", true);
    ucitajBazu.send();
}
onload =napuniIDjeve();
//Funkcija za popunjavanje tabele
function napuniTabelu(){

    var ucitaj = new XMLHttpRequest();

    ucitaj.onreadystatechange = function() {

        var unosUTabelu = document.getElementById("lista_itema");

        if (ucitaj.readyState == 4 && ucitaj.status == 200){

            var tabela = "<tr><th>Id</th><th>Naziv</th><th>Opis</th><th>Image</th><th>URL</th><th>Dostupnost</th><th>Kolicina</th><th>Cjena</th></tr>";
            var duzina= JSON.parse(ucitaj.responseText);
            // prolazi kroz citav niz JSON objekata i dodaje elemente u tabelu

            for(i =0 ; i < duzina.length ; i++ ){

                tabela +="<tr><td>"+duzina[i].id+"</td><td>"+duzina[i].naziv+"</td> <td>"+duzina[i].opis+"</td><td><img width=100 src='"+duzina[i].slika+"'></td><td><a target='_blank' href ='"+duzina[i].url+"'>Link</a></td><td>"+duzina[i].dostupnost+"</td><td>"+duzina[i].kolicina+"</td><td>"+duzina[i].cijena+"</td></tr>";
                unosUTabelu.innerHTML =tabela;

            }
        }
        if (ucitaj.readyState == 4 && ucitaj.status == 404){

            document.write("Greska:nepoznatURL");
        }

    }
    ucitaj.open("POST","http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=15754", true);
    ucitaj.send();
}
