function myFunction(val) {
    localStorage.setItem('nombre', val);
}

function myFunction2(val) {
    localStorage.setItem('unidad', val);
}
async function baja_herramienta(id) { 
    const object = {
        id: id,
    };

    const res = await fetch("http://127.0.0.1:8000/bajaherramienta", {
        method: "POST",
        mode: "cors",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(object),
    }).then((res) => res.json())
    .then((data) => {

    });

  
}
async function addherramienta(nombre,unidad) { 
    if (nombre === null || unidad === null){
      return alert("Los campos no pueden ir vacios");
    }
    const object = {
        nombre: nombre,
        unidad: unidad,
    };
    const res = await fetch("http://127.0.0.1:8000/addherramienta", {
        method: "POST",
        mode: "cors",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(object),
    }).then((res) => res.json())
    .then((data) => {

    });

  
}
async function addherramienta_excel(json) {
    json.forEach(element => {
        addherramienta(element.Herramienta,element.Unidad);
    });
  
   
}

