jQuery.noConflict();
jQuery(function($) { 


	/* 1. Animação Menu Navegação Principal
	___________________________________________________________________ */

	// Muda a cor de background com mouseover e mouseout
	var colorOver = '#136e95';
	var colorOut = '#E2EDF3';

	// Adiciona um padding com mouseover
	var padLeft = '25px';
	var padRight = '05px';
		 
	// Default Padding
	var defpadLeft = $('#navPro li a').css('paddingLeft');
	var defpadRight = $('#navPro li a').css('paddingRight');

			
	//Animação dos LI com mouse over & mouse out
	$('nav #navPro li').click(function () {   
	    }).mouseover(function (){
			//Efeito mouse over li transition
			$(this).find('a.inactive')
			.animate( { paddingLeft: padLeft, paddingRight: padRight}, { queue:false, duration:100 } )
			.animate( { backgroundColor: colorOver }, { queue:false, duration:200 });
 
		}).mouseout(function () {
	        //Efeito mouse out li transition, e discartar o efeito mouse over transition
			$(this).find('a.inactive')
			.animate( { paddingLeft: defpadLeft, paddingRight: defpadRight}, { queue:false, duration:100 } )
			.animate( { backgroundColor: colorOut }, { queue:false, duration:200 });
	});


	/* 2. Aumentar/Diminuir Font
	___________________________________________________________________ */


	//Reset Font Size
	var originalFontSize = $('article p').css('font-size');
		$(".resetFont").click(function(){
		$('article p').css('font-size', originalFontSize);
	});
  
	//Aumentar Font Size
	$(".aumentaFont").click(function(){
		var currentFontSize = $('article p').css('font-size');
		var currentFontSizeNum = parseFloat(currentFontSize, 10);
		var newFontSize = currentFontSizeNum+1 /*1.2*/;
		if ( newFontSize < 20 ) {
			$('article p').css('font-size', newFontSize);
		}
		return false;
	});
	
	//Diminuir Font Size
	$(".diminuiFont").click(function(){
		var currentFontSize = $('article p').css('font-size');
		var currentFontSizeNum = parseFloat(currentFontSize, 10);
		var newFontSize = currentFontSizeNum-1 /*0.8*/;
		if ( newFontSize > 8 ) {
			$('article p').css('font-size', newFontSize);
		}
		return false;
	});	
	

	/* 5. Animação Lista
	___________________________________________________________________ */
	
		// Setar o tempo em milisegundos
	var fadeDuration = 400;

    $('.box-post a').hover(function() {
		$(this).animate({ "paddingLeft": '30px' , "color": "rgb(255, 116, 2)" },  fadeDuration);
		$(this).children('span').show().animate({ left: -5 }, fadeDuration);
	}, function() {
       	$(this).animate({ "paddingLeft": '0', "color": "rgb(2, 58, 97)" }, fadeDuration);
       	$(this).children('span').animate({ left: -35 }, fadeDuration).fadeOut(fadeDuration); 
	});
	
	
	/* 6. Animação Scroll to top
	___________________________________________________________________ */
	$('.scroll-top').click(function(){ 
		$('html, body').animate({scrollTop:0}, 600); return false; 
	});
	
	
	/* 7. Animação Tooltip
	___________________________________________________________________ */
	
	$("ul li .icorodape").tipTip({maxWidth: "auto", edgeOffset: 1, fadeOut: 500, fadeIn: 500});

});