
$(function(){
    
    $(".navbar a, .navbar-header a").on("click", function(event){
        
        event.preventDefault();
        var hash = this.hash;
        
        $('body,html').animate({scrollTop: $(hash).offset().top} , 900 , function(){window.location.hash = hash;})
        
    });
    
})



$('.nav a').on('click', function(){
    var windowWidth = $(window).width();
    if(windowWidth <= 751){
        $('.navbar-toggle').click()
        console.log('windows width: ', windowWidth);
    }

});