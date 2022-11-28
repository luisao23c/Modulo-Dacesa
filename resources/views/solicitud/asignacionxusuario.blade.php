<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Solicitud</title>

</head>
<body>
  @extends('../Menu/MenuSupervisores')

     <style>
        .botton{
            background: red;
            background-color: brown;
        }
        .espacio
{
    height: .2rem;
}
.ajustar
{
    height: 4rem;
}
.borde{
  background: #ff4081;
  color: #fff;
  font-weight: bold;
}
.borde2{
  background: #f2f2f2;
}

.autocomplete {
  position: relative;
  display: inline-block;
}




.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
    .botton{
        background: red;
        background-color: brown;
    }
    .espacio
    {
        height: 2rem;
    }
    
   
    
     body {
  background: white;
}
    
    button {
  margin: 30px;
}
.custom-btn {
  width: 170px;
  height: 40px;
  margin-bottom: 1.3rem;
  color: #fff;
  border-radius: 5px;
  padding: 10px 25px;
  font-family: 'Lato', sans-serif;
  font-weight: 500;
  background: transparent;
  cursor: pointer;
  transition: all 0.3s ease;
  position: relative;
  display: inline-block;
   box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
  outline: none;
}

/* 1 */
.btn-1 {
  background: #ff4081;
  background: linear-gradient(0deg, #ff4081 0%,#ff4081 100%);
  border: none;
}
.btn-1:hover {
   background: #f82685;
background: linear-gradient(0deg,#ff4081 0%, #e7227b 100%);
}
    
 
/* Estilos para el HEAD de la tabla */
table.dataTable thead {background-color:#ff4081;color: azure;}

/* Estilos para los botones de paginacion */
.page-item.active .page-link {
  background-color:#ff4081 !important;
    color: azure !important;
    /* border: 1px solid black; */
}
.page-link {
    color: black !important;
}
    
    
    </style>
<div class="ajustar"></div>
<div class= "container">
  <form  action="{{ route('addherramienta_user') }}"  method="POST" name="sample">
    @csrf
  <br>
  <input id="prodId" name="id" type="hidden" value="{{$user}}">
  <div class="row">
    <div class="col-3">
    <a href="{{ route('vistavale',['sup'=>$sup,'id_obra'=>$obra_id]) }}">
      <button type="button" class="btn btn-1 ">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="20" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
        </svg>  
      </button>
      
  </a>
    </div>
    <div class=" offset-6 col-3">
    @php $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
     
    $today = $diassemana[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;@endphp
    <div class=""><b>{{$today}}</b></div>
  
  </div>
  </div>
    <div class="row">
    <div class="col-3">
    
      <input id="prodId" name="empleadoname" type="hidden" value="{{$name}}">
      <input id="prodId" name="empleado" type="hidden" value="{{$emp}}">
      <input id="prodId" name="supervisor" type="hidden" value="{{$sup}}">
      <input id="prodId" name="obra" type="hidden" value="{{$obra}}">
       
      
      cantidad:<br>
      <input required  name="cantidad"type="number" min="1" name="cantidad">
  
    </div>
    <div class="autocomplete" style="width:300px;">
  
    <div class="col-6">Descripcion: <br>
         <input required   id="myInput" name="descripcion" rows="2" cols="70" required> 
        </div>
  
  
    </div>
    <div class="col-3">
      <div style="margin-top: 1rem;"></div>
      <button type="submit" class="btn btn-1">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="25" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
        </svg>
      </button>
    </div>
  
    </div>
    <br>

    </form>
    
                <div class="row g-0 text-center">
                    <div class="col-sm-6 col-md-8 borde">Supervisor</div>
                    <div class="col-6 col-md-4 borde ">Persona Autorizada</div>
                    <div class="col-sm-6 col-md-8  borde2">{{$sup}}</div>
                    <div class="col-6 col-md-4 borde2">{{$name}}</div>
                    <div class="espacio"></div>
                    <div class="col-sm-6 col-md-8 borde ">Obra</div>
                    <div class="col-6 col-md-4 borde">Cliente</div>
                    <div class="col-sm-6 col-md-8 borde2 ">{{$obra}}</div>
                    <div class="col-6 col-md-4 borde2 ">{{$cliente}}</div>
                    
    <div class="container shadow-lg p-3 mb-5 mt-5 bg-body rounded">
      
        <div class="row">
            <div class="col">
                <table id="myTable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                          <th><b>Partida</b></th> 
                          <th><b>Cantidad</b></th>
                          <th> <b>descripcion</b></th>
                          <th> <b>Codigo</b></th>
                          <th> <b>Accion</b></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                      @php $partida = 0; $cont =0 @endphp
    
                      
                      @foreach ($herramientas_asignadas as $item)
                      @if( $cont > 0)
    
                      <tr>
                          <td>{{$partida}}</td>
                          <td>{{$item->cantidad}}</td>
                          <td>{{$item->descripcion}}</td>
                          <td>{{$item->numero_serie}}</td>
                          @if($item->herramienta)
                          <td>Ya fue Asignado</td>
                          @endif
                        @if(!$item->herramienta)

                          <td>
                            <a href="#demo-modal2" data-id_usuario ="{{$user}}"   data-supervisor="{{$sup}}"  data-empleado="{{$emp}}" data-empleadoname="{{$name}}" data-obra="{{$obra_id}}"  data-id="{{$item->id}}" onclick="followUser(this); return true;">                     
                              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                </svg>  
                              </button>
                            </a>
                          <script>
                         
                            function followUser(e){
                                var id_usuario= e.getAttribute('data-id_usuario');
                                var supervisor = e.getAttribute('data-supervisor');
                                var empleado = e.getAttribute('data-empleado');
                                var empleadoname = e.getAttribute('data-empleadoname');
                                var obra = e.getAttribute('data-obra');
                                var id = e.getAttribute('data-id');
                                console.log(id_usuario, supervisor, empleado, empleadoname,obra,id);
                                document.getElementById("contenido").innerHTML = `
                                <form action="{{ route('eliminar_peticion_herramienta') }}" method="POST">
                              @csrf
                              <input id="prodId" name="id_usuario" type="hidden" value="${id_usuario}">
                              <input id="prodId" name="supervisor" type="hidden" value="${supervisor}">
                              <input id="prodId" name="empleado" type="hidden" value="${empleado}">
                              <input id="prodId" name="empleadoname" type="hidden" value="${empleadoname}">
                              <input id="prodId" name="obra" type="hidden" value="${obra}">
                              <input id="prodId" name="id" type="hidden" value="${id}">
                                <td><button type="submit" class="btn btn-danger">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                  </svg>  
                                </button></td>
                  
                          </form> 
                         `;
            
                        
                            }
                            </script>
                      
                          </td>
                      @endif
                        </tr>
                      @endif
                      @php $cont = 1; $partida ++ @endphp  
                    @endforeach
                     </tbody>      
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h1>Estas seguro de eliminarlo?</h1>
            <div class="mb-3">
                            <div id="contenido"></div>
    
                
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

 <!-- jquery y bootstrap -->
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>   
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
 <!-- datatables con bootstrap -->
 <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

 <!-- Para usar los botones -->
 <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>


<!-- Para los estilos en Excel     -->
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.templates.min.js"></script>
<script>
$(document).ready(function () {
    $("#myTable").DataTable({
      pageLength: 3,
     
     scrollY:        "180px",
     scrollX:        true,
     scrollCollapse: true,
     paging:         true,
    
      language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
      dom: '<"row" B> <"row"<"col-md-6 "l> <"col-md-6"f> > rt <"row"<"col-md-6 "i> <"col-md-6"p> >',           buttons:{
           
            buttons: [ 
            ]            
        }            
    });
});
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

    @if ($alert == 1)

    <script>
      swal({
      title: "Solicitud aceptada",
      text: "se ha agregado su peticion",
      icon: "success",
      button: "Aceptar",
    });
    </script>
    @endif
    @if ($alert == 2)
    
    <script>
      swal({
      title: "Solicitud aceptada",
      text: "se ha eliminado su peticion",
      icon: "success",
      button: "Aceptar",
    });
    </script>
    @endif
    </html>
    <script>
    function autocomplete(inp, arr) {
      /*the autocomplete function takes two arguments,
      the text field element and an array of possible autocompleted values:*/
      var currentFocus;
      /*execute a function when someone writes in the text field:*/
      inp.addEventListener("input", function(e) {
          var a, b, i, val = this.value;
          /*close any already open lists of autocompleted values*/
          closeAllLists();
          if (!val) { return false;}
          currentFocus = -1;
          /*create a DIV element that will contain the items (values):*/
          a = document.createElement("DIV");
          a.setAttribute("id", this.id + "autocomplete-list");
          a.setAttribute("class", "autocomplete-items");
          /*append the DIV element as a child of the autocomplete container:*/
          this.parentNode.appendChild(a);
          /*for each item in the array...*/
          for (i = 0; i < arr.length; i++) {
            /*check if the item starts with the same letters as the text field value:*/
            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
              /*create a DIV element for each matching element:*/
              b = document.createElement("DIV");
              /*make the matching letters bold:*/
              b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
              b.innerHTML += arr[i].substr(val.length);
              /*insert a input field that will hold the current array item's value:*/
              b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
              /*execute a function when someone clicks on the item value (DIV element):*/
              b.addEventListener("click", function(e) {
                  /*insert the value for the autocomplete text field:*/
                  inp.value = this.getElementsByTagName("input")[0].value;
                  /*close the list of autocompleted values,
                  (or any other open lists of autocompleted values:*/
                  closeAllLists();
              });
              a.appendChild(b);
            }
          }
      });
      /*execute a function presses a key on the keyboard:*/
      inp.addEventListener("keydown", function(e) {
          var x = document.getElementById(this.id + "autocomplete-list");
          if (x) x = x.getElementsByTagName("div");
          if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
            increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
          } else if (e.keyCode == 38) { //up
            /*If the arrow UP key is pressed,
            decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
          } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
              /*and simulate a click on the "active" item:*/
              if (x) x[currentFocus].click();
            }
          }
      });
      function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
      }
      function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
          x[i].classList.remove("autocomplete-active");
        }
      }
      function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
          if (elmnt != x[i] && elmnt != inp) {
            x[i].parentNode.removeChild(x[i]);
          }
        }
      }
      /*execute a function when someone clicks in the document:*/
      document.addEventListener("click", function (e) {
          closeAllLists(e.target);
      });
    }
    
    /*An array containing all the country names in the world:*/
    var countries = JSON.parse('<?php echo json_encode($herramientas_select); ?>');
    console.log(countries);
    /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
    autocomplete(document.getElementById("myInput"), countries);
    autocomplete(document.getElementById("myInput"), countries);
     $(document).ready( function () {
        $('#table_id').DataTable();
    } );
    </script>
  </body>
</html>