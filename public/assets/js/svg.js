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
						fill: '#BAD1CD', 
						opacity: 0.9, 
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

	// var reflet = martini.path("M58.89 8.61H30.23V100h14.68c1.46 0 2.48-.3 2.25-.67a7.23 7.23 0 0 0-3-1.4l-8.51-2.41A3.87 3.87 0 0 1 33 92.1l-1.08-38.3 28.14-43c.83-1.18.29-2.19-1.17-2.19z");

	// reflet.attr({
	// 	fill: '#D2D7D3',
	// 	opacity: 0.3,
	// 	isolation: 'isolate',
	// });

	// martini.attr({
 //    	filter : martini.filter(Snap.filter.shadow(0.7, 0, 0.3, '#AB392F', 0.7))
	// });


});






