function myFunction(val) {
    localStorage.setItem('observaciones', val);
}
async function delete_herramientas_user(id_user,id,id_herramienta) { 
        observaciones = await localStorage.getItem('observaciones');    
    const object = {
        id: id,
        user: id_user,
        id_herramienta: id_herramienta,
        observacion : observaciones,
    };

    const res = await fetch("http://127.0.0.1:8000/delete_herramientas_user", {
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

