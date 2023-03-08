function myFunction(val) {
    localStorage.setItem('nombre', val);
}

function myFunction2(val) {
    localStorage.setItem('unidad', val);
}
function myFunction3(val) {
    localStorage.setItem('numero_serie', val);
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
async function addherramienta(nombre,unidad,numero_serie,elements) { 
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
    if (nombre === "" || unidad === "" || numero_serie === ""){
      return  Toast.fire({
        icon: 'error',
        title: 'No se puede debido a los campos vacios',
      })
    }
      if(elements)
      {
        Toast.fire({
            icon: 'success',
            title: 'Se a dado de alta la herramientas ',
          })
      }
    else{
        Toast.fire({
            icon: 'success',
            title: 'Se a dado de alta la herramienta ' +nombre,
          })
    }

    const object = {
        nombre: nombre,
        unidad: unidad,
        numero_serie:numero_serie,

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

  localStorage.clear();
}
async function addherramienta_excel(json) {
    json.forEach(element => {
        addherramienta(element.Herramienta,element.Unidad,element.Codigo,1);
        
    });
  
   
}

