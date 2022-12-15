function myFunction(val) {
    localStorage.setItem('observaciones', val);
  }
async function delete_herramientas_user(id_user,id,id_herramienta) { 
    observaciones = null;
    if(localStorage.getItem('observaciones')){
        observaciones =  localStorage.getItem('observaciones');
    }
    
    const object = {
        id: id,
        user: id_user,
        id_herramienta: id_herramienta,
        observacion : observaciones,
    };
     alert(JSON.stringify(object));
    const res = await fetch("delete_herramientas_user", {
        method: "POST",
        mode: "cors",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(object),
    });
  
}

