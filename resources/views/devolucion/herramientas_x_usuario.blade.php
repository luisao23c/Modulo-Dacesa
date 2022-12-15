<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Devolucion</title>

</head>

<body>
    <style>
        .botton {
            background: red;
            background-color: brown;
        }

        .espacio {
            height: 2rem;
        }

        .borde {
            border: 1px solid black;
            background: rgb(78, 245, 245);
        }

        .borde2 {
            border: 1px solid gray;
        }

        .wrapper {}

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
            box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, .5),
                7px 7px 20px 0px rgba(0, 0, 0, .1),
                4px 4px 5px 0px rgba(0, 0, 0, .1);
            outline: none;
        }

        .btn-1 {
            background: #ff4081;
            background: linear-gradient(0deg, #ff4081 0%, #ff4081 100%);
            border: none;
        }

        .btn-1:hover {
            background: #f82685;
            background: linear-gradient(0deg, #ff4081 0%, #e7227b 100%);
        }


        /* Estilos para el HEAD de la tabla */
        table.dataTable thead {
            background-color: #ff4081;
            color: azure;
        }

        /* Estilos para los botones de paginacion */
        .page-item.active .page-link {
            background-color: #ff4081 !important;
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
                <a href="{{ route('devolucion') }}">
                    <button type="button" class="btn btn-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="20" fill="currentColor"
                            class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                        </svg>
                    </button>
                </a>
            </div>
            <div class="offset-2 col-6">
                <h3>{{ $nombre }}</h3>
            </div>


        </div>
        <br>
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped" style="width:100%">
                        <thead>

                            <th>Articulo</th>
                            <th> Unidad</th>
                            <th> cantidad</th>
                            <th> No. serie</th>
                            <th> Devolucion</th>

                        </thead>

                        <tbody>

                            <script>
                    
                            </script>




                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
                    <h1>Estas seguro de regresarlo a almacen?</h1>
                    <div class="mb-3">
                        <div id="contenido">
                        
                        </div>


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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- datatables con bootstrap -->
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

    <!-- Para usar los botones -->
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>

    <script src="{{ asset('peticiones/devolucion.js') }}"></script>
    <!-- Para los estilos en Excel     -->
    <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.min.js">
    </script>
    <script
        src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.templates.min.js">
    </script>
    <script>
        new Promise(function(resolve) {

            resolve(get_herramientas_user());

        }).then(function(result) {

            generar_table();

        })


        let datos = null;
        async function get_herramientas_user() {
            const id = <?php echo $id; ?>;

            const res = await fetch("http://127.0.0.1:8000/get_herramientas_user/" + id, {
                    method: "GET",
                    mode: "cors",
                    headers: {
                        "Content-Type": "application/json",
                    }
                }).then((res) => res.json())
                .then((data) => {
                    datos = data;
                });
        }

        function generar_table() {


            $(document).ready(function() {


                table = $("#myTable").DataTable({
                    data: datos,
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                    },
                    pageLength: 5,

                    scrollY: "400px",
                    scrollX: true,
                    scrollCollapse: true,
                    paging: true,
                    "columns": [{
                            "data": "nombre"
                        },
                        {
                            "data": "unidad"
                        },
                        {
                            "data": "cantidad"
                        },
                        {
                            "data": "numero_serie"
                        },
                        {
                            targets: -1,
                            data: null,
                            defaultContent: ` 
                            <button type="button" class="btn btn-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5ZM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5Z"/>
                              </svg>  
                            </button>
                          `,
                        },
                    ],

                    dom: '<"row" B> <"row"<"col-md-6 "l> <"col-md-6"f> > rt <"row"<"col-md-6 "i> <"col-md-6"p> >',
                    buttons: {

                        buttons: []
                    },

                });
                $('#myTable tbody').on('click', 'button', function() {
                  var data = table.row($(this).parents('tr')).data();
                  document.getElementById('contenido').innerHTML =`  <form action="{{ route('delete_herramientas_user') }}" method="POST">
                            @csrf
                            <input type="text" class="form-control" placeholder="observaciones" name="observacion"  oninput="myFunction(this.value)">
      <br>
                                    <input id="id_user" name="id_user" type="hidden" value="${data.id_user}">
                                    <input id="id" name="id" type="hidden" value="${data.id}">
                        <input id="id_herramienta" name="id_herramienta" type="hidden" value="${data.id_herramienta}">
                        <div class="modal-header">
        <button type="button" id="eliminar" class="btn-1 btn" data-bs-dismiss="modal" aria-label="Close">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5ZM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5Z"/>
                </svg>
          </button>
      </div>
              
                          </form>`
                  $('#myModalExito').modal('demo-modal2');
                  const button = document.getElementById('eliminar');

                    button.addEventListener('click', (event) => {
                      table.row($(this).parents('tr')).remove().draw();
                      delete_herramientas_user(data.id_user,data.id,data.id_herramienta)
                    });
                 

                });
            });
        }
        $(document).ready(function() {
            $("#myTable2").DataTable({

                dom: '<"row" B> <"row"<"col-md-6 "l> <"col-md-6"f> > rt <"row"<"col-md-6 "i> <"col-md-6"p> >',
                buttons: {

                    buttons: []
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>

</body>

</html>
