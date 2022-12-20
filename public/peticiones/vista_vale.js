async function nuevo_user(obra,user) {
 
    const object = {
        obra: obra,
        user: user,
      
    };
    const res = await fetch("http://127.0.0.1:8000/nuevo_user_obra", {
        method: "POST",
        mode: "cors",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(object),
    });
   
}
async function eliminar_user_obra(obra,user) {
    let msg = "";
    band = false

    let cont = 0;
    const object = {
        obra: obra,
        user: user,
      
    };
    const res = await fetch("http://127.0.0.1:8000/eliminar_user_obra", {
        method: "POST",
        mode: "cors",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(object),
    }).then((response) => response.json())
    .then((data) => msg = data.msg );
         // tu codigo aqui 
         if(!band){
            alert(msg)
            band = true
         }
    

    
   
}
