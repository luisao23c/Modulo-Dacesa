
function obtener_id(partida) {
 localStorage.setItem('id', partida);
}
  async function asignar_herramienta(partida) {
    let output = "";
    const herramienta = document.getElementById("herramienta" + partida).value;
    const user = document.getElementById("user" + partida).value;
    const ide = document.getElementById("id" + partida).value;
    const cantidad = document.getElementById("cantidad" + partida).value;
    const faltan = document.getElementById("faltan" + partida).value;
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
    const data = await res.json();
    const table = document.getElementById("cuerpo");
    console.log(object);
    console.log(data);
    const cont = 1;
    const solicitud = Array.from(data[0]);
    const herramientas = Array.from(data[1]);
    const us = Array.from(data[2]);
    for (let i = 0; i < solicitud.length; i++) {
        output += `
   <br>
   `;

        if (solicitud[i].asignados > 0) output += `<tr class="table-active">`;
        if (solicitud[i].asignados == 0) output += `<tr>`;
        output += `
     <td>${cont}</td>
     <td>${solicitud[i].cantidad}</td>
     <td>${solicitud[i].descripcion}</td>
     <td>
           <form id="asignar_herramienta">
           <select class="form-select"id="herramienta${cont}" name="herramienta">
           `;
        for (let i = 0; i < herramientas.length; i++) {
            output += `

               <option selected value=" ${herramientas[i].id}"> ${herramientas[i].nombre} / ${herramientas[i].numero_serie} / ${herramientas[i].unidad} </option>
   
               `;
        }
        output += `
           </select>
           

     </td>
       <input id="user${cont}" name="user" type="hidden" value="${us[0].user}">
       <input id="id${cont}" name="id" type="hidden" value="${solicitud[i].id}">
       <input id="cantidad${cont}" name="cantidad" type="hidden" value="${solicitud[i].cantidad}">

     <td><input id="faltan${cont}" type="number" name="faltan" id=""></td>
     <td><button data-id="${cont}"  type="button" onclick="asignar_herramienta(${cont});" class="btn btn-1">
     

       <svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
         <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8Zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5Z"/>
       </svg>
     </button></td>
   </form>

   </tr>

   `;
    }

    table.innerHTML = output;
}


async function reasignacion(partida) {
    const herramienta = document.getElementById("herramienta" + partida).value;
    const user = document.getElementById("user" + partida).value;
    const ide = document.getElementById("id" + partida).value;
    const cantidad = document.getElementById("cantidad" + partida).value;
    const faltan = document.getElementById("faltan" + partida).value;
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
    const data = await res.json();
    const table = document.getElementById("reasignacion");

    let output = "";
    const cont = 1;
    const solicitud = Array.from(data[0]);
    const herramientas = Array.from(data[1]);
    const us = Array.from(data[2]);
    for (let i = 0; i < solicitud.length; i++) {
        output += `
   <br>
   `;

        if (solicitud[i].asignados > 0) output += `<tr class="table-active">`;
        if (solicitud[i].asignados == 0) output += `<tr>`;
        output += `
     <td>${cont}</td>
     <td>${solicitud[i].cantidad}</td>
     <td>${solicitud[i].descripcion}</td>
     <td>
           <form id="asignar_herramienta">
           <select class="form-select"id="herramienta${cont}" name="herramienta">
           `;
        for (let i = 0; i < herramientas.length; i++) {
            output += `

               <option selected value=" ${herramientas[i].id}"> ${herramientas[i].nombre} / ${herramientas[i].numero_serie} / ${herramientas[i].unidad} </option>
   
               `;
        }
        output += `
           </select>
           

     </td>
       <input id="user${cont}" name="user" type="hidden" value="${us[0].user}">
       <input id="id${cont}" name="id" type="hidden" value="${solicitud[i].id}">
       <input id="cantidad${cont}" name="cantidad" type="hidden" value="${solicitud[i].cantidad}">

     <td><input id="faltan${cont}" type="number" name="faltan" id=""></td>
     <td><button data-id="${cont}"  type="button" onclick="asignar_herramienta(${cont});" class="btn btn-1">
     

       <svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
         <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8Zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5Z"/>
       </svg>
     </button></td>
   </form>

   </tr>

   `;
    }

    table.innerHTML = output;
}

