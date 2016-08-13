$(document).ready(function() {
	
	
	// Déclaration de la zone de dessin avec Snap
	var martini = Snap("#martini");
	

	// Dessin du verre
	var pied = martini.path("M47.15 99.33a7.28 7.28 0 0 0-3-1.4l-8.51-2.41A3.87 3.87 0 0 1 33 92.1l-1.16-41.67c0-1.48-.77-2.69-1.61-2.69s-1.57 1.26-1.61 2.69L27.44 92.1a3.89 3.89 0 0 1-2.64 3.41l-8.51 2.41a7.2 7.2 0 0 0-3 1.4c-.23.37.78.67 2.25.67h29.37c1.46.01 2.47-.3 2.24-.66z");
	pied.attr({fill: '#ECF0F1'});

	var haut = martini.path("M58.89 8.61H1.57c-1.46 0-2 1-1.18 2.24l28.37 43.33a1.63 1.63 0 0 0 2.94 0l28.38-43.33c.81-1.23.27-2.24-1.19-2.24z");
	haut.attr({fill: '#FFFFFF'});

	var pic = martini.path("M51.81 0l.36.21-3.24 6.86-17.36 30.38-4.26 6.26-.36-.21 3.24-6.86L47.56 6.26 51.81 0");
	pic.attr({
		fill: '#b99664',
		transform: 'translate(0 -50)',
	});

	var liquide = martini.path("M49.21 17.5h-38c-1.46 0-2 1-1.15 2.21l18.65 27.17a1.71 1.71 0 0 0 3 0l18.65-27.17c.82-1.22.32-2.21-1.15-2.21z");
	liquide.attr({
		fill: '#e08283',
		opacity: 0.7,
	});
	
	var olive = martini.path("M28.49 29.45c-3.12 5.46-1.48 7.86 1.3 9.48s5.67 1.86 8.79-3.6 1.48-7.86-1.3-9.49-5.67-1.84-8.79 3.61z");
	olive.attr({
		fill: '#bed630', 
		transform: 'translate(0 -50)',
	});

	var olivepink = martini.path("M28.49 29.45c-3.12 5.46-1.48 7.86 1.3 9.48s5.67 1.86 8.79-3.6 1.48-7.86-1.3-9.49-5.67-1.84-8.79 3.61z");
	olivepink.attr({
		fill: '#e08283',
		opacity: 0.2,
		transform: 'translate(0 -50)',
	});

	var olivepic = martini.group(pic, olive, olivepink);

	olivepic.animate({ 'transform' : 't0,50' }, 300);


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
						fill: '#e08283', 
						opacity: 0.5, 
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

	var reflet = martini.path("M58.89 8.61H30.23V100h14.68c1.46 0 2.48-.3 2.25-.67a7.23 7.23 0 0 0-3-1.4l-8.51-2.41A3.87 3.87 0 0 1 33 92.1l-1.08-38.3 28.14-43c.83-1.18.29-2.19-1.17-2.19z");

	reflet.attr({
		fill: '#DADFE1',
		opacity: 0.2,
		isolation: 'isolate',
	});



});






