<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Reporte</title>

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

<div class="espacio"></div>
    <div class="container shadow-lg p-3 mb-5 mt-5 bg-body rounded">
      
        <div class="row">
            <div class="col">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Empleado</th>
                            <th>Seleccion</th>
                          
                        </tr>
                    </thead>
                    <tbody class=" align-middle">
    @foreach($users as $item)
              <tr>
                <td>{{$item->name}}</td>
                <td>
                    
                    <form action="{{ route('reporte_trabajador') }}" method="GET">
                        @csrf
                        <input type="hidden" name="id" value="{{$item->id}}">
                    <button class="btn btn-1"> 
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                          </svg> 
                    </button>   
                 </form>
                </td>
              </tr>
              
            
    @endforeach
            </tbody>              
                </table>
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

        orderCellsTop: true,
        fixedHeader: true,
        language: {
          "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json",
          searchPanes: {
                clearMessage: 'Limpiar Filtros',
                collapseMessage: "Colapasar",
                showMessage:"Ver Filtros",
                title:"Filtros Activos",
            }
      },
        pageLength: 4,
     
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
                extend: "colvis",
                text:'COLUMNAS',
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
</body>
</html>