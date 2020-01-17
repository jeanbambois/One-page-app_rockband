let indice = 0;
var images = new Array();
images[0] = "./img/globe.png";
images[1] = "./img/regularshow.png";
images[2] = "./img/homer.jpg";

function rotationImages(){
	console.log('fonction rotation');
	document.getElementById("img_header").src = images[indice];

	$('#img_header').click(indices_fonction);
}

 function indices_fonction(){
		if(indice < images.length - 1){
			indice += 1;
		} else {
			indice = 0;
		}
		rotationImages();
	}