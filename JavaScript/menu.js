/*function otvori_podmeni() {
    $("#katalog_podmeni").slideDown("slow");

}
function zatvori_podmeni(){

    $("#katalog_podmeni").slideUp("slow");
}

$(document).ready(function(){
    $("#aaa").click(function(){
        $(this).animate({height:'100px' },"slow");
        alert("blaaah");
    }) ;
});*/
function showMenu(){
     document.getElementById("katalog_podmeni").style.display="block";

}
function hideMenu(){
    document.getElementById("katalog_podmeni").style.display="none";
}