
/**
 * Définition du mode développement ou production
 */
var devMode = true;

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
$('#contact-form').on('submit', function(event) {

    // Blocage de l'événement par défaut
    event.preventDefault();

    var api = 'http://api.appinmove.wrk/web/app_dev.php/MailProcess/';
    if (!devMode) {
        api = 'http://api.appinmove.com/MailProcess/'
    }

    // Récupère le données du formulaire
    var formDatas = $(this).serializeArray();
    var postedDatas = {};

    for (var i = 0; i < formDatas.length; i++) {
        postedDatas[formDatas[i]['name']] = formDatas[i]['value'];
    }

    $.ajax({
        url: api,
        data: postedDatas,
        dataType: 'json',
        method: 'post',
        success: function(data) {
            console.log('Affiche le toast avec : ' + data);
            $.toaster({
                message: data,
                title: 'Message envoyé',
                priority: 'success'
            });
            $('#contact-form').reset();
        },
        error: function(error) {
            $.toaster({
                message: 'Une erreur est survenue lors de l\'envoi de votre message',
                title: 'Erreur',
                priority: 'warning'
            });
        }
    })
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