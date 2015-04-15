var validirano = false;
var validacija_emaila =false;
var validacija_imena =false;

function validateForm(){

      validirano = true;

    /*----------------------------------------Validacija---------------------------------------------------------------*/

    /*----------------------------------------Validacija imena---------------------------------------------------------*/
    var name = document.getElementById('input_name');
    var name_error = document.getElementById('ime_error');
    document.getElementById('unchecked').style.display= "none";
    document.getElementById('checked').style.display= "none";
    document.getElementById('unchecked2').style.display= "none";
    document.getElementById('checked2').style.display= "none";
    document.getElementById('unchecked3').style.display= "none";
    document.getElementById('checked3').style.display= "none";

        if(name.value.length == 0) {

            validirano=false;
            name.style.backgroundColor = "red";
            name_error.innerHTML = "Unijeli ste prazno ime.";
            name_error.style.display = "block";
            document.getElementById('unchecked').style.display= "block";

        }
        else if(!name.value.match(/^[a-zA-Z ČčĆćŠšĐđŽž]*$/) ){
            validirano=false;
            name.style.backgroundColor = "red";
            name_error.innerHTML = "Ime mora sadrzavati samo slova.";
            name_error.style.display = "block";
            document.getElementById('unchecked').style.display= "block";



        }
        else{
            name_error.style.display ="none";
            name.style.backgroundColor ="green";
            if(document.getElementById('unchecked').style.display= "block") {
                document.getElementById('unchecked').style.display= "none";
                document.getElementById('checked').style.display = "block";
                validacija_imena =true;
            }
        }

    /*------------------------------------------------------------------------------------------------------------------*/
    /*----------------------------------------Validacija email-a--------------------------------------------------------*/
    var email = document.getElementById('input_email');
    var mail_error =document.getElementById('mail_error');

        if(email.value.length == 0){

            validirano = false;
            email.style.backgroundColor = "red";
            mail_error.innerHTML = "Niste unijeli email.";
            mail_error.style.display = "block";
            document.getElementById('unchecked2').style.display= "block";

        }
        else if(!email.value.match(/^[a-z\._0-9]+@[a-z]+\.[a-z]{2,4}$/)) {
            validirano=false;
            email.style.background ="red";
            mail_error.innerHTML = "Neispravan format emaila.";
            mail_error.style.display = "block";
            document.getElementById('unchecked2').style.display= "block";
        }
        else{

            mail_error.style.display ="none";
            email.style.backgroundColor ="green";
            document.getElementById('checked2').style.display= "block";
            validacija_emaila=true;

    }
    /*------------------------------------------------------------------------------------------------------------------*/
    /*----------------------------------------Validacija email-a--------------------------------------------------------*/

    if(validacija_emaila == true && validacija_imena){

        var message = document.getElementById('message_text_area');
        var message_error =document.getElementById('message_error');
        message.disabled=false;

        if(message.value.length == 0 ){

            validirano = false;
            message.style.backgroundColor = "red";
            message_error.innerHTML = "Niste unijeli poruku.";
            message_error.style.display = "block";
            document.getElementById('unchecked3').style.display= "block";
        }
        else {
            message_error.style.display ="none";
            message.style.backgroundColor="green";
            document.getElementById('checked3').style.display= "block";
        }
    }
    else{
        var message = document.getElementById('message_text_area');
        var message_error =document.getElementById('message_error');

        message.disabled =true;

        message.style.backgroundColor = "red";
        message_error.style.display = "block";
        document.getElementById('unchecked3').style.display= "block";
        message_error.innerHTML = "Za slanje poruke morate ispuniti ime/email pravilno !";
    }

    /*------------------------------------------------------------------------------------------------------------------*/

    if(validirano == true){

        document.getElementById('button_input').type = "button";/*Privremeno je stavljeno na button treba promijeniti na submit kansije*/
    }
}