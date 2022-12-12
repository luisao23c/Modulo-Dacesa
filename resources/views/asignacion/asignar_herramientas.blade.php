<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Asignacion</title>

</head>
<body>
  <style>
    .botton{
        background: red;
        background-color: brown;
    }
    .espacio
    {
        height: 2rem;
    }
    .borde{
       border: 1px solid black;
       background: rgb(78, 245, 245);
    }
    .borde2{
       border: 1px solid gray;
    }
    .wrapper {
      
    }
    
    .wrapper a {
      display: inline-block;
      text-decoration: none;
      padding: 15px;
      background-color: #fff;
      border-radius: 3px;
      text-transform: uppercase;
      color: #585858;
      font-family: 'Roboto', sans-serif;
    }
    
    .modal {
      visibility: hidden;
      opacity: 0;
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      background: rgba(77, 77, 77, .7);
      transition: all .4s;
    }
    
    .modal:target {
      visibility: visible;
      opacity: 1;
    }
    
    .modal__content {
      border-radius: 4px;
      position: relative;
      width: 1000px;
      max-width: 90%;
      background: #fff;
      padding: 1em 2em;
    }
     body {
  background: white;
  
}
    .modal__footer {
      text-align: right;
      a {
        color: #585858;
      }
      i {
        color: #d02d2c;
      }
    }
    .modal__close {
      position: absolute;
      top: 10px;
      right: 10px;
      color: #585858;
      text-decoration: none;
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
@extends('../Menu/Menu')
@extends('../Menu/websocktet')

<div class="espacio"></div>
    <div class="container shadow-lg p-3 mb-5 mt-5 bg-body rounded">
      <div class="row">
        <div class="col-2">
             <a href="{{ route('asignacion') }}">
            <button  type="button" class="btn btn-1">
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="20" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
              </svg>
            </button>
          </a>
        </div>
        <div class=" offset-2 col-6"> 
          @if (strlen($name) > 0)   
                <h3> {{$name}}</h3>
          @endif
          @if(strlen($name_faltante)>0 && strlen($name) < 1)
          <h3> {{$name_faltante}}</h3>
          @endif                
    </div>

    </div>

        <div class="row">
            <div class="col">
              <div class="table-responsive">
              <table id="myTable" class="table table-striped" style="width:100%">
                <thead>
                <tr>
                <th>Partida</th>
                <th>Cantidad</th>
                <th> Descripcion</th>
                <th>Articulo / No.Serie / Unidad</th>
                <th> Si faltaron ingresa la cantidad</th>
                <th> Accion</th>
        </tr>
                </thead>
                
                 <tbody id="cuerpo">
                  @php $partida = 1 @endphp
                    <br>
                  @foreach ($solicitud as $items)
                    @if ($items->asignados>0)
                    <tr  class="table-active">
                    @endif
                    @if ($items->asignados==0)
                    <tr >
                    @endif
                 
        
                      <td>{{$partida}}</td>
                      <td>{{$items->cantidad}}</td>
                      <td>{{$items->descripcion}}</td>
                      <td>
                            <form id="asignar_herramienta">
                                @csrf
                            <select class="form-select"id="herramienta{{$partida}}" name="herramienta">
                    
                                @foreach ($herramientas as $item)
                                <option selected value="{{$item->id}}"> {{$item->nombre}} / {{$item->numero_serie}} / {{$item->unidad}}   </option>
                    
                                @endforeach
                            </select>
        
                      </td>
                        <input id="user{{$partida}}" name="user" type="hidden" value="{{$user}}">
                        <input id="id{{$partida}}" name="id" type="hidden" value="{{$items->id}}">
                        <input id="cantidad{{$partida}}" name="cantidad" type="hidden" value="{{$items->cantidad}}">
        
                      <td><input id="faltan{{$partida}}" type="number" name="faltan" id=""></td>
        
                      <td>

                        <button data-id="{{ $partida }}"  id="agregar_herramienta" type="button" role="agregar_herramienta" onclick="obtener_id({{ $partida }});"
                        class="btn btn-1">
                      
        
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8Zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5Z"/>
                        </svg>
                      </button></td>
                    </form>
        
                    </tr>
                  @php $partida ++ @endphp  
                @endforeach
        
                 </tbody>
             </table>
            </div>
        </div>
    </div>
  </div>


  <div class="container shadow-lg p-3 mb-5 mt-5 bg-body rounded">
    
      <div class="row">
          <div id="tabla_asignacion" class="col">
            <div  class="table-responsive">
              <table id="myTable2" class="table table-bordered " >
                <thead>
                <th>Partida</th>
                <th>Cantidad</th>
                <th> Descripcion</th>
                <th>Articulo / No.Serie / Unidad</th>
                <th> ingresa la cantidad</th>
                <th> Accion</th>
          
                </thead>
                
                <tbody id="reasignacion">
                  @php $partida = 1 @endphp
                    <br>
                  @foreach ($solicitud_faltante as $items)
                    @if ($items->asignados>0)
                    <tr class="table-active">
                    @endif
                    @if ($items->asignados==0)
                    <tr>
                    @endif
                 
          
                      <td>{{$partida}}</td>
                      <td>{{$items->cantidad}}</td>
                      <td>{{$items->descripcion}}</td>
                      <td>
                        <div class="mb-3">
                            <form id="reasignar_herramienta">
                                <input id="herramienta{{$partida}}" name="herramienta" type="hidden" value="{{$items->herramienta}}" >
                              <p>{{$items->nombre}} / {{$items->numero_serie}} / {{$items->unidad}} </p>
          
                          </div>
          
                      </td>
                        <input id="user{{$partida}}" name="user" type="hidden" value="{{$user}}">
                        <input id="id{{$partida}}" name="id" type="hidden" value="{{$items->id}}">
                        <input id="cantidad{{$partida}}" name="cantidad" type="hidden" value="{{$items->cantidad}}">
          
                      <td><input id="faltan{{$partida}}" type="number" name="faltan" id=""></td>
                      <td>
                        <button data-id="{{$partida}}"  type="button" onclick="reasignacion({{ $partida }});" class="btn btn-1">                      
                          
                          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8Zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5Z"/>
                          </svg>
                        </button>
                      </td>
                    </form>
          
                    </tr>
                  @php $partida ++ @endphp  
                @endforeach
          
                 </tbody>
             </table>
            </div>
          </div>
          
          
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
<script src="{{ asset("peticiones/asignacion.js") }}"></script>

<script>
$(document).ready(function () { 
 var dt = $("#myTable").DataTable({
  initComplete: function () {
            $( document ).on("click", "button[role='agregar_herramienta']", function(){
           id =  localStorage.getItem('id');
           asignar_herramienta(id);
           dt.draw(); 
           
            });
        },
      language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        pageLength: 2,
     
     scrollY:        "400px",
     scrollX:        true,
     scrollCollapse: true,
     paging:         true,
     columnDefs: [
         { width: 200, targets: 0 }
     ],
      dom: '<"row" B> <"row"<"col-md-6 "l> <"col-md-6"f> > rt <"row"<"col-md-6 "i> <"col-md-6"p> >',           buttons:{
           
            buttons: [ 
            ]            
        }    
      
        
    });
});
$(document).ready(function () {
    $("#myTable2").DataTable({
      language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        pageLength: 2,
     
        scrollY:        "400px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        columnDefs: [
         { width: 308, targets: 0 }
     ],
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
    
  </body>
</html>