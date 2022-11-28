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

    <title>Vista de vale</title>

</head>
<body>
  <style>
    div.dt-button-collection {
    position: absolute;
    top: 0;
    left: 0;
    width: 200px !important;
    margin-top: 1px;
    padding: 8px 5px 4px 8px;
    border: 1px solid #ccc;
    border: 1px solid rgba(0,0,0,0.4);
    background-color: white;
    overflow: hidden;
    z-index: 2002;
    border-radius: 5px;
    box-shadow: 3px 3px 5px rgb(0 0 0 / 30%);
    box-sizing: border-box;
}
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
.custom-icon {
  width: 80px;
  height: 40px;
  margin-bottom: 1.3rem;
  color: #fff;
  border-radius: 5px;
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
    
body {
  background: white ;
}  
    </style>
@extends('../Menu/MenuSupervisores')
<div class="espacio"></div>
    <div class="container shadow-lg p-3 mb-5 mt-5 bg-body rounded">
     <div class="row">
      <div class="col-1">
        <a  href="#demo-modal2">    
          <button type="button" class="btn  custom-icon btn-1" data-bs-toggle="modal" data-bs-target="#nuevoempleado">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="20" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
              <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
              <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
            </svg>   
          </button>
        </a>
      </div>
      <div class="col-1">

        @if ($condicion ==  0)
        <div class="  col-1">
          <form action="{{ route('add_caja') }}" method="POST">
            @csrf
            <input id="prodId" name="sup" type="hidden" value="{{$sup}}">
                  <input id="prodId" name="obra" type="hidden" value="{{$id_obra}}">
            <input id="prodId" name="id" type="hidden" value="{{$supervisor}}">
            <button type="submit" class="btn custom-icon btn-1">
              <img width="50" height="25" src="https://openclipart.org/image/300px/svg_to_png/210207/misc-bag-toolbox-red.png" alt="">
            </button>
          </form>
        </div>
      @endif

      </div>
      <div class="col-1">
        <a href="{{ route('welcome') }}">
          <button type="button" class="btn btn-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="25" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
              <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
              <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
            </svg>
          </button>
        </a>
      </div>
     </div>
      
        <div class="row">
            <div class="col">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Empleados en la obra</th>
                            <th style="visibility: hidden">rol</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody class=" align-middle">
                      @foreach ($emp as $item)
                      <tr style="    background-color: #ffffff  ;
                ">
                <td style="   background-color: #ffffff ;
                ">{{$item->name}}</td>
                 <td style="visibility: hidden"
                 >{{$item->rol}}</td>
            <td>  
              
              <form action="{{ route('asignacionxusuario') }}" method="GET">
              @csrf
                    @php
                        $id = $item->id
                    @endphp
                    <input id="prodId" name="id" type="hidden" value="{{$id}}">
                    <input id="prodId" name="empleadoname" type="hidden" value="{{$item->name}}">
                    <input id="prodId" name="empleado" type="hidden" value="{{$item->id}}">
                    <input id="prodId" name="supervisor" type="hidden" value="{{$sup}}">
                    <input id="prodId" name="obra" type="hidden" value="{{$obra}}">
                     <button type="submit" class=" custom-icon btn-1 " style=""> 
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                      </svg>  
                    </button>
                    <a  href="#demo-modal2" data-id="{{$id}}"data-sup ="{{$sup}}"data-obra ="{{$obra}}" onclick="followUser(this); return true;">
                     
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                        </svg>  
                      </button>
                    </a>
                   
                </form>
              
              </td>
                </tr>
                
    @endforeach
            </tbody>              
                </table>
            </div>
        </div>
    </div>
    <script>
      function followUser(e){
          var id = e.getAttribute('data-id');
          var sup = e.getAttribute('data-sup');
          var obra = e.getAttribute('data-obra');
  
          document.getElementById("contenido").innerHTML = `
          <form action="{{ route('eliminar_user_obra') }}" method="POST">
            @csrf
          <input id="prodId" name="id" type="hidden" value="${id}">
      
                <input id="prodId" name="supervisor" type="hidden" value="${sup}">
                <input id="prodId" name="obra" type="hidden" value="${obra}">
              <button type="submit" class=" btn-danger btn" > 
      
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                </svg>  
              </button>
            </form>
              `;
  
      }
      </script>
 
 <!-- jquery y bootstrap -->
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>   
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
 <!-- datatables con bootstrap -->
 <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

 <!-- Para usar los botones -->
 <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
 <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
 <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
 <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.53/build/pdfmake.min.js"></script>
 <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.53/build/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>  
<script src="cdn.datatables.net/colvis/1.1.1/js/dataTables.colVis.min.js"></script>
<script src="cdn.datatables.net/colvis/1.1.1/js/dataTables.colVis.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/4.2.1/js/dataTables.fixedColumns.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.colVis.min.js"></script>

<!-- Para los estilos en Excel     -->
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.templates.min.js"></script>
<script>
$(document).ready(function () {
    // Setup - add a text input to each footer cell
   
    var table = $('#example').DataTable({

      order: [[1, 'asc']],

        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        pageLength: 4,
        columnDefs: [
            {
                target: 1,
                visible: false,
                searchable: false,
            },
           
        ],
     scrollY:        "320px",
     scrollX:        true,
     scrollCollapse: true,
     paging:         true,
     dom: '<"row" B> <"row"<"col-md-6 "l> <"col-md-6"f> > rt <"row"<"col-md-6 "i> <"col-md-6"p> >',
     buttons:{
            dom: {
                button: {
                    className: 'custom-btn btn-1'
                }
            },
            buttons: [
              {
                //definimos estilos del boton de excel
                extend: "copy",
                text:'COPIAR',
                className:'custom-btn btn-1',
           
            },   
             'pdf',

              {
                //definimos estilos del boton de excel
                extend: "print",
                text:'IMPRIMIR',
                className:'custom-btn btn-1',
           
            },   
          
            
              
            {
                //definimos estilos del boton de excel
                extend: "excel",
                text:'EXCEL',
                className:'custom-btn btn-1',

                // 1 - ejemplo básico - uso de templates pre-definidos
                //definimos los parametros al exportar a excel
                
                excelStyles: {                
                    //template: "header_blue",  // Apply the 'header_blue' template part (white font on a blue background in the header/footer)
                    //template:"green_medium" 
                    
                    "template": [
                        "blue_medium",
                        "header_green",
                        "title_medium"
                    ] 
                    
                },
                

           
            },
          
           
            ],
          },         
      
    });
});

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<!-- Button trigger modal -->


<!-- Modal -->
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
<div class="modal fade" id="nuevoempleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h1>Agregar empleado</h1>
        <div class="mb-3">
          <form action="{{ route('nuevo_user_obra') }}" method="POST">
            @csrf
              <label for="exampleFormControlInput1" class="form-label">selecciona a los empleados para selecionar varios seleciona con Ctrl y click</label>
              <select class="form-select" multiple aria-label="multiple select example" name="empleados[]">
                @if ($usersemp)
                
                @foreach ($usersemp as $item)
                <option selected value="{{$item->id}}">{{$item->name}}</option>
    
                @endforeach
            @endif
              </select>
                      
                    <div class="wrapper">
                      <br>
                      <input id="prodId" name="supervisor" type="hidden" value="{{$sup}}">
                      <input id="prodId" name="obra" type="hidden" value="{{$obra}}">
                      <button type="submit" class=" btn btn-icon btn-1  "> 
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="25" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                        </svg>  
                      </button>
                    </div>
          </form>     
            
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if ($condicion == 1)

<script>
  swal({
  title: "Solicitud aceptada",
  text: "se ha solicitado la caja de herramientas",
  icon: "success",
  button: "Aceptar",
});
</script>
@endif
@if ($alerts ==  3)

<script>
  swal({
  title: "Solicitud rechazada",
  text: "No se puede eliminar al empleado por que tiene material que no a regresado",
  icon: "error",
  button: "Aceptar",
});
</script>
@endif
@if ($alerts ==  4)

<script>
swal({
  title: "Solicitud aceptada",
  text: "se ha eliminado al empleado de esta obra",
  icon: "success",
  button: "Aceptar",
});
</script>
@endif
@if ($alerts ==  5)

<script>
swal({
  title: "Solicitud aceptada",
  text: "se han agregdo los empleados a la obra",
  icon: "success",
  button: "Aceptar",
});
</script>
@endif
  </body>
</html>