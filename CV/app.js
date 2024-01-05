//Menu lateral

var menu_visible =false;

let menu= document.getElementById("nav")

function mostrarOcultarMenu(){
if(menu_visible==false){

    menu.style.display="block";
    menu_visible=true;
}
else{

    menu.style.display ="none";
    menu_visible= false;
}

}

//oculto el menu que selecciono la opcion 

let links = document.querySelectorAll("nav a");
for(var x =0; x <links.length;x++){

    links[x].onclick = function(){

        menu.style.display = "none";
        menu_visible=false;
    }
}
// creacion de las barritas de una barra particular identificada por su id
function crearBarra(id_barra) {
    for (let i = 0; i <= 10; i++) {
        let div = document.createElement("div");
        div.className = "e";
        id_barra.appendChild(div);
    }
}

let c = document.getElementById("c");
crearBarra(c);

let cSharp = document.getElementById("csharp");
crearBarra(cSharp);

let Php = document.getElementById("Php");
crearBarra(Php);

let Python = document.getElementById("Python");
crearBarra(Python);

let SQLSERVER = document.getElementById("SQLSERVER");
crearBarra(SQLSERVER);

let MYSQL = document.getElementById("MYSQL");
crearBarra(MYSQL);

let Javascritp = document.getElementById("Javascritp");
crearBarra(Javascritp);

let Git = document.getElementById("Git");
crearBarra(Git);


//ahora voy a guardar la cantidad de barritas que se cargaran segun el porcentaje 

let contadores= [-1,-1,-1,-1,-1,-1,-1,-1];
//esta variable es para la animacion
let entro = false;
//funcion que aplica las animaciones de las habilidades
function efectoHabilidades(){

    var habilidades=document.getElementById("habilidades");
    var distancia_skills= window.innerHeight -habilidades.getBoundingClientRect().top;
if(distancia_skills>=300 && entro==false){

    entro=true;
    const intervalC = setInterval(function(){
pintarBarra(c, 7, 0, intervalC);


    },100);
    const intervalcsharp = setInterval(function(){
        pintarBarra(cSharp, 6, 1, intervalcsharp);
        
        
            },100);
            const intervalPhp = setInterval(function(){
                pintarBarra(Php, 6, 2, intervalPhp);
                
                
                    },100);
                    const intervalPython = setInterval(function(){
                        pintarBarra(Python, 6, 3, intervalPython);
                        
                        
                            },100);
                            const intervalSQLSERVER = setInterval(function(){
                                pintarBarra(SQLSERVER, 7, 4, intervalSQLSERVER);
                                
                                
                                    },100);
                                    const intervalMYSQL = setInterval(function(){
                                        pintarBarra(MYSQL, 6, 5, intervalMYSQL);
                                        
                                        
                                            },100);

                                            const intervalJavascritp = setInterval(function(){
                                                pintarBarra(Javascritp, 5, 6, intervalJavascritp);
                                                
                                                
                                                    },100);
                                                    const intervalGit = setInterval(function(){
                                                        pintarBarra(Git, 5, 7, intervalGit);
                                                        
                                                        
                                                            },100);
                }
        }

//lleno una barra particular con la cantidad indicada

function pintarBarra(id_barra,cantidad,indice, interval){

    contadores[indice]++;
    x=contadores[indice];
    if(x < cantidad){

        let elementos = id_barra.getElementsByClassName("e");
        elementos[x].style.backgroundColor = "#940253"
    }else{
        clearInterval(interval)
    }
}

//detecto el scrolling del mause la animacion de la barra

window.onscroll = function(){

    efectoHabilidades();
}