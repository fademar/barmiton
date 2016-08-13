// FONCTIONS SVG

// Renvoie un nombre entre 0 et 1
function getRandom() {
  random = Math.random()
  return random;
}

// Renvoie un nombre entre min et max (max exclu)
function getRandomArbitrary(min, max) {
	random = Math.random() * (max - min) + min;
  return random;
}

// Renvoie un entier entre min et max (max exclu)
function getRandomInt(min, max) {
  	min = Math.ceil(min);
 	max = Math.floor(max);
  	random = Math.floor(Math.random() * (max - min)) + min; 

  return random;
}

// Fonction de détermination si un point est dans un triangle

//credits: https://koozdra.wordpress.com/2012/06/27/javascript-is-point-in-triangle/ et http://www.blackpawn.com/texts/pointinpoly/default.html

function is_in_triangle (px,py,ax,ay,bx,by,cx,cy){
	var v0 = [cx-ax,cy-ay];
	var v1 = [bx-ax,by-ay];
	var v2 = [px-ax,py-ay];

	var dot00 = (v0[0]*v0[0]) + (v0[1]*v0[1]);
	var dot01 = (v0[0]*v1[0]) + (v0[1]*v1[1]);
	var dot02 = (v0[0]*v2[0]) + (v0[1]*v2[1]);
	var dot11 = (v1[0]*v1[0]) + (v1[1]*v1[1]);
	var dot12 = (v1[0]*v2[0]) + (v1[1]*v2[1]);

	var invDenom = 1/ (dot00 * dot11 - dot01 * dot01);

	var u = (dot11 * dot02 - dot01 * dot12) * invDenom;
	var v = (dot00 * dot12 - dot01 * dot02) * invDenom;

	return ((u >= 0) && (v >= 0) && (u + v < 1));
}



