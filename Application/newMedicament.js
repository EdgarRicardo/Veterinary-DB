//Creacion de Variable incremental
var incremento = 2;
var options=[];


function ajouterMed(obj){
	if(incremento <= 5){
		var sele = "T" + incremento;
		var dos = "TT" + incremento;
		var dur = "D" + incremento;
		//document.getElementsByTagName(sele).attr("hidden", false)
		document.getElementById(sele).removeAttribute("hidden");
		document.getElementById(dos).removeAttribute("hidden");
		document.getElementById(dur).removeAttribute("hidden");
		document.getElementById(sele).setAttribute("required",true);
		document.getElementById(dos).setAttribute("required",true);
		document.getElementById(dur).setAttribute("required",true);
		incremento++;
	}
}
