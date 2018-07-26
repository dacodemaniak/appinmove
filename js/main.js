
$(function(){
    
    $(".navbar a, .navbar-header a, #you a").on("click", function(event){
        
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

var isComplete = false;

$('#contact-form').on('change', function(event) {
    _checkForm();
    if (isComplete) {
        $('#btn-contact').removeAttr('disabled');
    } else {
        $('#btn-contact').attr('disabled', 'disabled');
    }
});

/*
* Soumission du formulaire
*/
$('#form-contact').on('submit', function() {

});


function _checkForm() {
    var fields = ['name', 'societe', 'email', 'telephone'];

    for(var index=0; index < fields.length; index++) {
        if ($('#' + fields[index]).val() !== '') {
            isComplete = true;
        }
    }

    if($('#message').val() === '') {
        isComplete = false;
    } else {
        isComplete = true;
    }

    console.log(isComplete ? ' Complet' : ' Incomplet');

    return isComplete;
}

// Traitement spécifique sur le textarea
$('#message').on('keyup', function(event) {
    if ($('#message').val() === '') {
        isComplete = false;
    } else {
        isComplete = true;
    }
    $('#contact-form').trigger('change');
});

/**
 * Traitement du lien interne vers le contact sur l'option Demande de stage
 */
$('#you').on('click', function() {
    // Déplacement vers le formulaire de contact
    var anchor = $('#contact');
    $("html, body").animate( { scrollTop: anchor.offset().top }, 1500);

    // Sélection de la dernière option dans le select
    $('#objet option:last').attr('selected', 'selected');
});