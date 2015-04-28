/**
 * Created by Edin on 4/27/2015.
 */

var ajax = new XMLHttpRequest();

ajax.onreadystatechange = function(){

    //Anonimna funkcija

    if(ajax.readyState == 4 && ajax.status == 200){


    }


    if(ajax.readyState == 4 && ajax.status == 404){

    }


}

function  unesiUBazu (){
    var naziv =document.getElementById('input_item_name').value;
    var opis =document.getElementById('input_item_description').value;
    var image =document.getElementById('input_image').value;
    var url =document.getElementById('input_URL').value;
    var dostupnost =document.getElementById('input_availability').value;
    var kolicina = document.getElementById('input_quantity').value;
    var cijena =document.getElementById('input_price').value;

    ajax.open("POST","http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa="+15754, true);


    ajax.send( "naziv=" + naziv +"&opis"+ opis+"&image"+image+"&url"+url+"&dostupnost"+dostupnost+"&kolicina"+kolicina+"&cijena"+cijena);

}