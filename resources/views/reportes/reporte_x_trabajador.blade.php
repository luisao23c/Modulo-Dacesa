<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/2.1.0/css/searchPanes.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.5.0/css/select.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="style.css">
    <title > Reporte de :{{$nombre}}  </title>

</head>
<body>
  <style>
     .dataTables_wrapper .dataTables_paginate .paginate_button {
    box-sizing: border-box;
    display: inline-block;
    min-width: 1.5em;
     padding: 0em !important;
    margin-left: 2px;
    text-align: center;
    text-decoration: none !important;
    cursor: pointer;
    color: inherit !important;
    border: 1px solid transparent;
    border-radius: 2px;
}
div.dataTables_wrapper div.dataTables_length select {
    width: 3.5rem !important;
    display: inline-block;
}  
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
@extends('../Menu/websocktet')

<div class="espacio"></div>
    <div class="container shadow-lg p-3 mb-5 mt-5 bg-body rounded">
      <div class="row" style="margin:0px; padding:0px;">
        <div class="col-2">
         
        </div>
        <div class=" offset-2 col-6"> 
          <h3>{{$nombre}}  
     </h3>        
     </div>
     <div class="col-2"> 
   
 </h3>        
 </div>
      </div>
        <div class="row">
          <div class="col-3">
            
              Fecha minima
              <input class="form-control" type="text" id="min" name="min">
          </div>
          <div class="col-3">
              Fecha Maxima:
             <input class="form-control" type="text" id="max" name="max">
          </div>
          <div class="col-3">
            Dias minimos Transcuridos:
            <input class="form-control" type="text" id="mindias" name="mindias">
          </div>
          <div class="col-3">
            Dias Maximos Transcuridos:
            <input  class="form-control" type="text" id="maxdias" name="maxdias">
          </div>
        </div>
        <div class="row">
            <div class="col">

           
            
                  
                 
            <div ></div>
                <table id="example" class="table table-striped" style="width:100%">
                    
                    <thead>
                        
                        <tr>
                          <th>Partida</th>
                          <th>Articulo</th>
                          <th> No.Serie </th>
                          <th>Unidad</th>
                          <th>cantidad</th>
                          <th>Fecha de pedido</th>
                          <th>Dias Transcurridos</th>
                    

                          </tr>
                    </thead>
                    <tbody class=" align-middle">
    @php $partida = 1; $rojo =0;@endphp
    <br>
  @foreach ($reporte_trabajador as $items)
  @php
 
 
  $fecha_hoy=date("y-m-d");
 $fecha_creacion = strtotime ( $items->created_at);
$fecha_creacion = date('y-m-d', $fecha_creacion);
$date1=date_create($fecha_hoy);
$date2=date_create($fecha_creacion);
$diff=date_diff($date2,$date1);
$transcurso_dias=$diff->format("%a");
$string = $transcurso_dias;
$transcurso_dias = (int) $string;
$fecha_creacion = strtotime ( $items->created_at);
$fecha_creacion = date('d-m-y', $fecha_creacion);
$amarillo = 0;
$rojo = 0;
if ($transcurso_dias >=30 && $transcurso_dias <59){
  $amarillo =1;
}
else if ($transcurso_dias >=60) {
 $rojo = 1;
}




@endphp
@if ($amarillo ==1 && $items->estado != 1)
<tr style="background: #fdfd96">
@endif
@if ($rojo ==1 && $items->estado != 1)
<tr style="background: #f98381">
@endif



  <td>{{$partida}}</td>
  <td>{{$items->nombre}}</td>

  <td>{{$items->numero_serie}}</td>
 
  
  <td>{{$items->unidad}}</td>
  @if ($items->asignados>0)
  <td>{{$items->asignados}}</td>
  @endif
  @if ($items->asignados==null)
  <td>{{$items->cantidad}}</td>
  @endif
  <td>{{$items->created_at}}</td>
  @if ($items->estado==1)
          <td>Ya se encuentra en almacen</td>
          @endif
          @if ($items->estado!=1)
          <td>{{$transcurso_dias}}</td>
          @endif


 
</form>

</tr>
@php $partida ++@endphp  
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
 <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
<!-- fecha    -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.2.0/js/dataTables.dateTime.min.js"></script>
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

<script src="https://cdn.datatables.net/searchpanes/2.1.0/js/dataTables.searchPanes.min.js"></script>
<script src="https://cdn.datatables.net/select/1.5.0/js/dataTables.select.min.js"></script>
<!-- Para los estilos en Excel     -->
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.templates.min.js"></script>
<script>
  var minDate, maxDate;
  $.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = minDate.val();
        var max = maxDate.val();
        var date = new Date( data[6] );


        if (
            ( min === null && max === null ) ||
            ( min === null && date <= max ) ||
            ( min <= date   && max === null ) ||
            ( min <= date   && date <= max )
        ) {
            return true;
        }
        return false;
    }
);
$.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
   var mindias = parseInt($('#mindias').val(), 10);
   var maxdias = parseInt($('#maxdias').val(), 10);
   var Dias = parseFloat(data[7]) || 0; // use data for the age column
console.log(mindias);
   if (
       (isNaN(mindias) && isNaN(maxdias)) ||
       (isNaN(mindias) && Dias <= maxdias) ||
       (mindias <= Dias && isNaN(maxdias)) ||
       (mindias <= Dias && Dias <= maxdias)
   ) {
       return true;
   }
   return false;
});
  $(document).ready(function() {
    minDate = new DateTime($('#min'), {
       format: 'MMMM Do YYYY'
   });
   maxDate = new DateTime($('#max'), {
       format: 'MMMM Do YYYY'
   });
   $('#example thead tr ')
   $('#mindias, #maxdias').keyup(function () {
       table.draw();
   });    
   $('#min, #max').on('change', function () {
       table.draw();
   });
 
  var table = $('#example').DataTable({
    orderCellsTop: true,
      fixedHeader: true,
      select: true,

      language: {
          "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
      },
      pageLength: 4,
      searchPanes: {
          viewTotal: true,
          columns: [6]
      },
    scrollY:        "320px",
   scrollX:        true,
   scrollCollapse: true,
   paging:         true,
      dom: '<"row" P> <"row" B> <"row"<"col-md-6 "l> <"col-md-6"f> > rt <"row"<"col-md-6 "i> <"col-md-6"p> >',
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
      columnDefs: [ 
      
        {
                        searchPanes: {
                            options: [{
                                    label: ' menores a 30 dias',
                                    value: function(rowData, rowIdx) {
                                        return rowData[6] < 30;
                                    }
                                },
                                {
                                    label: '30 a 60 dias',
                                    value: function(rowData, rowIdx) {
                                        return rowData[6] >= 30 && rowData[7] <= 60;
                                    }
                                },
                                {
                                    label: 'mayor 60 dias',
                                    value: function(rowData, rowIdx) {
                                        return rowData[6] >=60;
                                    }
                                }
                            ],
                            combiner: 'and'
                        },
                        targets: [6]
                    }, 
       
      ],
    
      order: [[ 1, 'asc' ]]
  });

 
});
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    
</body>
</html>