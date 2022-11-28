async function asignar_herramienta(e) {
    var id = e.getAttribute('data-id');
    console.log('id: ' + id);
   const herramienta = document.getElementById("herramienta" + id).value;
   console.log('herramienta: ' + herramienta);

}
