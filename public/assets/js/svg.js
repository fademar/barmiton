$(document).ready(function() {
	
	
	// Déclaration de la zone de dessin avec Snap
	var martini = Snap("#martini");



	var createBubbles = function() {

		setTimeout(function(){

			var i = 0;

			var interval =	setInterval(function(){
				i++;
			    if(i === 400){
			        clearInterval(interval);
			    }		
				var rbulle 		= getRandom();
				var xbulle 		= getRandomArbitrary(11, 49);
				var ybulle		= getRandomArbitrary(18.5, 46.5);
				
				if (is_in_triangle(xbulle, ybulle, 11.5, 21.5, 49, 21.5, 30, 46.5)) {
					
					var bubble = martini.circle(xbulle, ybulle, rbulle)
					bubble.attr({
						fill: '#ED8D07', 
						opacity: 0.60, 
						stroke: '#ffffff', 
						strokeWidth: 0.1,
					});
					var ymov = ybulle + 18.5;				
					bubble.animate({'transform':'t0, -3'}, 500, mina.easeIn);
					bubble.attr({
						class: "fade-out",
					});
					$( ".fade-out" ).fadeOut(1000);
				}

			}, 1);

		}, 350);
	}


	createBubbles();

	martini.click( createBubbles );


});






