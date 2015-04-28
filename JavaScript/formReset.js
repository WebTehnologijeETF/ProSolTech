/**
 * Created by Edin on 4/25/2015.
 */


function formReset(){

    var name_error = document.getElementById('ime_error');
    var name = document.getElementById('input_name');
    var mail_error = document.getElementById('mail_error');
    var mail = document.getElementById('input_email');
    var message_error = document.getElementById('message_error');
    var message = document.getElementById('message_text_area');
    var zipcode_error = document.getElementById('zipcode_error');
    var zipcode = document.getElementById('input_zipcode');

    name_error.style.display = "none";
    name.style.backgroundColor ="white";
    mail_error.style.display = "none";
    mail.style.backgroundColor ="white";
    message_error.style.display ="none";
    message.style.backgroundColor ="white";
    zipcode_error.style.display ="none";
    zipcode.style.backgroundColor ="white";

    document.getElementById('unchecked').style.display= "none";
    document.getElementById('checked').style.display= "none";
    document.getElementById('unchecked2').style.display= "none";
    document.getElementById('checked2').style.display= "none";
    document.getElementById('unchecked3').style.display= "none";
    document.getElementById('checked3').style.display= "none";
    document.getElementById('unchecked4').style.display= "none";
    document.getElementById('checked4').style.display= "none";





}