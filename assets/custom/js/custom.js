

$(document).ready(function() {

	$('.mdb-select').materialSelect();

	$('body').scrollspy({
    	target: '.dotted-scrollspy'
	});

	// initialize lightbox
	$(function () {
	  	$("#mdb-lightbox-ui").load("../mdb-addons/mdb-lightbox-ui.html");
	});

	$('#collapseEx a').click(function (e) {
	  	$('#collapseEx').collapse('hide');
	});

	/* WOW.js init */
	new WOW().init();
	/* 
	$('.navbar-collapse a').click(function () {
	  	$(".navbar-collapse").collapse('hide');
	});
	*/
});

