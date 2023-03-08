
function obtener_id(partida) {
 localStorage.setItem('id', partida);
}
function myFunction(val) {
  localStorage.setItem('faltan', val);
}



  async function asignar_herramienta(partida,num_vale) {
    const herramienta = document.getElementById("herramienta" + partida).value;
    const user = document.getElementById("user" + partida).value;
    const ide = document.getElementById("id" + partida).value;
    const vale = num_vale;

    
    
    const object = {
        id: ide,
        user: user,
        herramienta: herramienta,
        vale: vale,

    };
    const res = await fetch("asignar_herramienta", {
        method: "POST",
        mode: "cors",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(object),
    });
   
}


async function reasignacion(partida) {

    const herramienta = document.getElementById("herramientaa" + partida).value;
    const user = document.getElementById("userr" + partida).value;
    const ide = document.getElementById("idd" + partida).value;
    const cantidad = document.getElementById("cantidadd" + partida).value;
    const faltan =  localStorage.getItem('faltan');

    console.log(herramienta + " " + user + " faltan" + faltan );
    if( faltan <= 0) {
      return alert("Debes agregar un valor"); 
    }
    console.log(faltan + " >" + cantidad);
    const object = {
        id: ide,
        user: user,
        cantidad: cantidad,
        faltan: faltan,
        herramienta: herramienta,
    };
    const res = await fetch("reasignar_herramienta", {
      method: "POST",
      mode: "cors",
      headers: {
          "Content-Type": "application/json",
      },
      body: JSON.stringify(object),
  });
  }

function limpiar(){
  localStorage.removeItem("id");
  localStorage.removeItem("faltan");  
  localStorage.removeItem("cantidad");  
}