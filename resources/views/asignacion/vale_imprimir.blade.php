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

    <title>Vale</title>

</head>
<body>
  @extends('../Menu/MenuSupervisores')

     <style>       
 .espacio
{
    height: .3rem;
}
.ajustar
{
    height: 4rem;
}
.borde{
    border: 1px solid #000;

}
.borde_table{
    color: rgb(0, 0, 0);
    background-color: rgb(143, 134, 134);
}
.vacio{
    height:  25px;

}
@media print {
    @page { margin: 0;
     size: auto; }
}
    </style>

    <div id= "impresion">
<div class="ajustar"></div>
<div class= "container">
    @extends('../Menu/Menu')
    @csrf
  <br>
  <div class="row">
    <div class="col-3">
        <img width="100" height="50" src="https://th.bing.com/th/id/R.d6ebd8615133da9ab2cb18f584d8449d?rik=aGC1%2bU%2bZXB6knA&riu=http%3a%2f%2ferp.dacesa.com.mx%2fimg%2flogo.png&ehk=Ovu%2fa%2bjmTbZ6Admuzsy7Qv5jlnndW61CxCjaZIWcz5I%3d&risl=&pid=ImgRaw&r=0" alt="">
        </div>
        <div  class="col-7">
            <b>Calz. Saltillo 400 No. 207 ur Col. Ampl La Rosita C.P 27250 Torreón, Coahuila. Tels. y Fax (871) 720-59-33 y 720-65-62 E-mail: dacesa@dacesa.com.mx</b>
        </div>
        <div class="col-2">
            <span class="text-danger" style="font-size: 25px;"> N {{ $vale }}</span>
        </div>
        <div class="espacio"></div>
        <div class="espacio"></div>

    <div class="  borde  col-12">
    @php $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
     
    $today = $diassemana[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;@endphp
    <div class="">FECHA : {{$today}}</div>
    </div>
    <div class=" borde col-12 text-left"> <p> NOMBRE DEL TRABAJADOR: {{ $us }}</p></div>
<div class="col-6 borde ">{{ $cliente }}</div>
<div class="col-6 borde vacio"></div>
<div class="col-6 borde vacio"></div>
<div class="col-6 borde vacio"></div>

<div class="espacio"></div>          
      
       
                <table class="table table-bordered">
                    <thead class=" borde_table ">
                        <tr>
                          <th><b>Partida</b></th> 
                          <th> <b>unidad</b></th>
                          <th> <b>Descripcion del Articulo</b></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                      @php $partida = 1; @endphp
    
                      
                      @foreach ($reporte_vale as $item)
                      <tr>
                          <td>{{$partida}}</td>
                          <td>{{$item->unidad}}</td>
                          <td>{{$item->nombre}}</td>
                        </tr>
                      @php  $partida ++ @endphp  
                    @endforeach
                     </tbody>      
                </table>
      

    <div class="col-4 borde">
        Recibi:
    </div>
    <div class="col-2 borde">
        Autorizo:
    </div>
    <div class="col-2 borde">
        Entrego:
    </div>
    <div class="col-2 borde vacio">
    </div>
    <div class="col-2 borde vacio">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<!-- Para los estilos en Excel     -->
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.templates.min.js"></script>
<script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

  
    </html>
    <script>
        var printContents = document.getElementById('impresion').innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;

 
    </script>
  </body>
</html>