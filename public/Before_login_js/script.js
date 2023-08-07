function onClickMenu(){
    document.getElementById("ham").classList.toggle("icon");
    document.getElementById("nav1").classList.toggle("change");
}
function fun2(){
    document.getElementById("snap").classList.toggle("snap1");
}
$(document).ready(function(){
$("#snap").click(function(){
    $(".cc").fadeToggle(5000);
 });
});
$(document).ready(function(){
    $("#bu1").click(function(){
        $(".pro button").hide();
     });
    });
$(document).ready(function(){
        $("#bu2").click(function(){
            $(".pro button").show();
         });
        });
