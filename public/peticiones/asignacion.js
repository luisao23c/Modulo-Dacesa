
function obtener_id(partida) {
 localStorage.setItem('id', partida);
}
function myFunction(val) {
  localStorage.setItem('faltan', val);
}
  async function asignar_herramienta(partida) {
    const herramienta = document.getElementById("herramienta" + partida).value;
    const user = document.getElementById("user" + partida).value;
    const ide = document.getElementById("id" + partida).value;
    const cantidad = document.getElementById("cantidad" + partida).value;
    const faltan = document.getElementById("faltan" + partida).value;
    console.log(faltan + "-- " + cantidad );
    const f = parseInt(faltan);
    const c = parseInt(cantidad);
    
    if(f > c) {
      window.location.reload();
      alert("no se puede dar mas material del pedido");
    }
    
    const object = {
        id: ide,
        user: user,
        cantidad: cantidad,
        faltan: faltan,
        herramienta: herramienta,
    };

    const res = await fetch("asignar_herramienta", {
        method: "POST",
        mode: "cors",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(object),
    });
    if(c > f){
      window.location.reload();
    }
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