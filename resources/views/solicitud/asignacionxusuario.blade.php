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

    <title>Solicitud</title>

</head>

<body>
    @extends('../Menu/MenuSupervisores')

    <style>
    .botton {
        background: red;
        background-color: brown;
    }

    .espacio {
        height: .2rem;
    }

    .ajustar {
        height: 4rem;
    }

    .borde {
        background: #ff4081;
        color: #fff;
        font-weight: bold;
    }

    .borde2 {
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

    .botton {
        background: red;
        background-color: brown;
    }

    .espacio {
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
        box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, .5),
            7px 7px 20px 0px rgba(0, 0, 0, .1),
            4px 4px 5px 0px rgba(0, 0, 0, .1);
        outline: none;
    }

    /* 1 */
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
    <div class="ajustar"></div>
    <div class="container">
        <form>
            @csrf
            <br>
            <input id="prodId" name="id" type="hidden" value="{{$user}}">
            <div class="row">

                <div class=" offset-9 col-3">
                    @php $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                    $meses =
                    array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

                    $today = $diassemana[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;@endphp
                    <div class=""><b>{{$today}}</b></div>

                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <input id="user_id" name="user_id" type="hidden" value="{{$user_id}}">
                    <input id="obra_id" name="obra" type="hidden" value="{{$obra_id}}">
                    <div style="margin-top: 1rem;"></div>
                    <button type="button" role="agregar" class="btn btn-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="25" fill="currentColor"
                            class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
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
                                    <th> <b>descripcion</b></th>
                                    <th> <b>Accion</b></th>

                                </tr>
                            </thead>
                            <tbody>



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h1>Estas seguro de eliminarlo?</h1>
                            <div class="mb-3">

                                <button type="button" class="btn btn-danger" id="eliminar" data-bs-dismiss="modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" fill="currentColor"
                                        class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z">
                                        </path>
                                        <path fill-rule="evenodd"
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z">
                                        </path>
                                    </svg>
                                </button>

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
                integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
                crossorigin="anonymous"></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
                crossorigin="anonymous">
            <!-- datatables con bootstrap -->
            <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

            <!-- Para usar los botones -->
            <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <script src="{{ asset('peticiones/asignacionxusuario.js') }}"></script>


            <!-- Para los estilos en Excel     -->
            <script
                src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.min.js">
            </script>
            <script
                src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.templates.min.js">
            </script>
            <script>
            let herramientas = <?php echo json_encode($herramientas_select)?>;
            let herramientas_array = [];
            herramientas.forEach((element) => {
                let button =
                    '<button type="button" role="add" class="btn btn-1"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="25" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/></svg></button>';

                herramientas_array.push([element, button]);
            });
            let dt = null;
            let dt2 = null;
            $(document).on("click", "button[role='agregar']", function() {
                $('#Herramientas').modal('show'); // abrir

            });
            $(document).ready(function() {

                const user_id = <?php echo $user_id; ?>;
                const obra_id = <?php echo $obra_id; ?>;
                cont = 1;

                dt = $("#myTable").DataTable({
                    ajax: {
                        "url": "http://127.0.0.1:8000/herramientas_asignadas_user/" + user_id + "/" +
                            obra_id,
                        "dataSrc": ""
                    },
                    columnDefs: [{
                            width: 200,
                            targets: 0
                        },

                    ],
                    "columns": [{
                            data: null,
                            render: function(data, type, row) {
                                return cont++;
                            }
                        },

                        {
                            data: "descripcion",
                        },


                        {
                            targets: -1,
                            data: null,
                            defaultContent: ` 
                            <button type="button" role='eliminar_herramienta'  class="btn btn-danger" >
                              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z">
                                              </path>
                                              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z">
                                              </path>
                                          </svg>
                            </button>
                          `,
                        },
                    ],
                    initComplete: function() {
                        $(document).on("click", "button[role='eliminar_herramienta']", function() {
                            var data = dt.row($(this).parents('tr')).data();
                            $('#exampleModal').modal('show');
                            const button = document.getElementById('eliminar');

                            button.addEventListener('click', (event) => {
                                delete_herramientas_user(data.id);
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener(
                                            'mouseenter', Swal
                                            .stopTimer)
                                        toast.addEventListener(
                                            'mouseleave', Swal
                                            .resumeTimer)
                                    }
                                })

                                Toast.fire({
                                    icon: 'success',
                                    title: "se elimino " + data.descripcion,
                                })
                                let obra_id = document.getElementById("obra_id")
                                    .value;
                                let user_id = document.getElementById("user_id")
                                    .value;
                                const object = {
                                    obra_id: obra_id,
                                    id: user_id,
                                    descripcion: data[0],
                                };
                                dt.row($(this).parents('tr')).remove().draw();

                            });
                            // 
                        });

                    },
                    pageLength: 3,

                    scrollY: "180px",
                    scrollX: true,
                    scrollCollapse: true,
                    paging: true,

                    language: {
                        "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                    },
                    dom: '<"row" B> <"row"<"col-md-6 "l> <"col-md-6"f> > rt <"row"<"col-md-6 "i> <"col-md-6"p> >',
                    buttons: {

                        buttons: []
                    }
                });
                dt2 = $("#myTable2").DataTable({
                    data: herramientas_array,
                    columns: [{
                            title: 'Herramientas'
                        },
                        {
                            title: 'Accion'
                        },

                    ],
                    language: {
                        "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                    },
                    pageLength: 3,
                    initComplete: function() {
                        $(document).on("click", "button[role='add']", function() {
                            var data = dt2.row($(this).parents('tr')).data();
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal
                                        .stopTimer)
                                    toast.addEventListener('mouseleave', Swal
                                        .resumeTimer)
                                }
                            });

                            Toast.fire({
                                icon: 'success',
                                title: "se agrego " + data[0],
                            });
                            let obra_id = document.getElementById("obra_id").value;
                            let user_id = document.getElementById("user_id").value;
                            const object = {
                                obra_id: obra_id,
                                id: user_id,
                                descripcion: data[0],
                            };
                            const res = fetch("http://127.0.0.1:8000/addherramienta_user", {
                                method: "POST",
                                mode: "cors",
                                headers: {
                                    "Content-Type": "application/json",
                                },
                                body: JSON.stringify(object),
                            });
                            dt.ajax.reload();
                            dt2.row($(this).parents('tr')).remove().draw();


                            // 
                        });

                    },

                });
            });
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
                integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
                integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk"
                crossorigin="anonymous"></script>




            <!-- Modal -->
            <div class="modal fade modal-xl" id="Herramientas" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Seleccione las herramientas</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table id="myTable2" class="table table-striped" style="width:100%">

                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>

                        </div>
                    </div>
                </div>
            </div>

</html>