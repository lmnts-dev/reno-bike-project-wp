$(document).ready(function(){
    $('#main-nav li').hover(function(){ 
        $(this).find('ul').fadeIn("medium");
    }, function() {
        $(this).find('ul').fadeOut("medium");
    });

});