// Carga mis funciones
$(document).on("ready", index);

/******** FUNCIONES PROPIAS *******************/
// Funcion inicio - ejecuta mis funciones
function index () {
	$(".orbit-container").hover(addControles, removeControles);
	removeControles();
}

// Funciones fade-in / fade-out para los controles del slider
function addControles() {
	$(".orbit-prev, .orbit-next").fadeIn();
}

function removeControles() {
	$(".orbit-prev, .orbit-next").fadeOut();
}