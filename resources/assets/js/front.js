/**
 * Created by jacob on 16/7/13.
 */
//new WOW().init();
$(document).ready(function() {
    $(".lazy").lazyload({
        effect : "fadeIn"
    });

     //Disable cut copy
    $('body').bind('cut copy', function (e) {
        e.preventDefault();
    });
   
    //Disable mouse right click
    $("body").on("contextmenu",function(e){
        return false;
    });
});