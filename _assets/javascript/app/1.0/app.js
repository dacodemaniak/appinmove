/**
 * @name app.js Gestion des pages de l'application
 * @author web-Projet.com (contact@web-projet.com)
 * @package _assets/javascript/app/1.0
 * @version 1.0
 */

(function( $ ) {
	// Comptabilise le nombre de lignes
	var lines = $('.box-items ul li').length;
	
	// Récupère les lignes dans un tableau
	var activities = $('.box-items ul li');
	
	// Initialise le compteur de parcours
	var counter = 0;
	
	var sliding = setInterval(
		animateSlider,
		5000
	);		

	
	function animateSlider(){
		
		var activeLine = $(activities[counter]);
		var activeContent = $('#' + activeLine.data('rel'));
		
		var effect = 'drop';
		var options = {};
		
		
		activeContent.hide(effect, options, 500);
		activeLine.removeClass('active').addClass('unactive');
		
		// Incrémente le compteur
		counter++;
		if(counter > (lines - 1)){
			counter = 0;
		}
		var nextLine = $(activities[counter]);
		var nextContent = $('#' + nextLine.data('rel'));
		
		nextLine.removeClass('unactive').addClass('active');
		
		nextContent.show(effect, options, 200);
		
	}
})( jQuery );

$(document).ready(function(){
	
});