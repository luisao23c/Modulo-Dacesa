async function delete_herramientas_user(id) { 
const object = {
    id: id,
    
};

const res = await fetch("http://127.0.0.1:8000/eliminar_peticion_herramienta", {
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


    