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
    <title>Altas/Bajas</title>

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
            border: 1px solid rgba(0, 0, 0, 0.4);
            background-color: white;
            overflow: hidden;
            z-index: 2002;
            border-radius: 5px;
            box-shadow: 3px 3px 5px rgb(0 0 0 / 30%);
            box-sizing: border-box;
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

        .borde {
            border: 1px solid black;
            background: rgb(78, 245, 245);
        }

        .borde2 {
            border: 1px solid gray;
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

        .file-input__input {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        .file-input__label {
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 600;
            color: #fff;
            font-size: 14px;
            padding: 10px 12px;
            background-color: #f297c0;
            box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.25);
        }

        /*******/

        .btn-enviar {
            color: #fff;
            font-weight: 600;
            padding: 10px 45px;
            background-color: coral;
            border: none;
            border-radius: 2px;
        }

        .btn-enviar:hover {
            color: #333;
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

    <div class="espacio"></div>
    @extends('../Menu/websocktet')

    <div class="container shadow-lg p-3 mb-5 mt-5 bg-body rounded">

        <button type="button" class="btn btn-1" data-bs-toggle="modal" data-bs-target="#nuevaherramienta">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" fill="currentColor"
                class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
            </svg>
        </button>
        <div class="row">
            <div class="col">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>herramienta</th>
                            <th>Unidad</th>
                            <th>Numero Serie</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody class=" align-middle">
                        @foreach ($herramientas as $item)
                            <tr style="    background-color: #ffffff  ;
                ">
                                <td>{{ $item->nombre }}</td>
                                <td> {{ $item->unidad }}</td>
                                <td> {{ $item->numero_serie }}</td>
                                <td>
                                <div class="row">
                                  <div class="col-4">
                                    <form action="{{ route('reparacion') }}" method="POST">
                                      @csrf
                                      <input type="hidden" name="id" value="{{$item->id}}">
                                    <button type="submit" class="btn btn-1">
                                      <img src="https://cdn-icons-png.flaticon.com/512/777/777081.png"
                                          alt="" width="30px" height="20px">
                                  </button>
                                </form>
                                  </div>
                                  <div class=" offset-1 col-4">
                                    <a href="#demo-modal2" data-id="{{ $item->id }}"
                                      onclick="followUser(this); return true;">

                                      <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                          data-bs-target="#exampleModal">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20"
                                              fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                              <path
                                                  d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z">
                                              </path>
                                              <path fill-rule="evenodd"
                                                  d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z">
                                              </path>
                                          </svg>
                                      </button>
                                  </a>

                                  </div>
                                </div>
                                
                              
                                 

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function followUser(e) {
            var id = e.getAttribute('data-id');
            console.log(id);

            document.getElementById("contenido").innerHTML = `
            <form action="{{ route('bajaherramienta') }}" method="POST">
              @csrf  
              <input id="id" name="herramientas" type="hidden" value="${id}" >
            <button type="submit" class="btn btn-danger ">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
        </svg>
      </button>
      
      
              </form>
                `;

        }
    </script>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1>Estas seguro de dar de baja este material?</h1>
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

    <div class="modal fade" id="nuevaherramienta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nueva herramienta csv o formulario</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <form action="{{ route('add_herramienta_excel') }}" method="POST"
                                enctype="multipart/form-data" />
                            @csrf
                            <div class="file-input text-center  ">
                                <input type="file" name="dataCliente" id="file-input" class="file-input__input" />
                                <label class="file-input__label" for="file-input">
                                    <i class="zmdi zmdi-upload zmdi-hc-2x"></i>
                                    <span class="">
                                        <img src="https://cdn.icon-icons.com/icons2/195/PNG/256/Excel_2013_23480.png"
                                            width="30" height="20" alt="">

                                    </span></label>
                            </div>
                            <div class="text-center mt-5">
                                <input type="submit" name="subir" class="btn-1 btn" value="Subir Excel" />
                            </div>
                            </form>
                        </div>
                        <div class="col-6">
                            <form action="{{ route('addherramienta') }}" method="POST">
                                @csrf
                                <div class="mb-3" class="autocomplete">

                                    <label for="exampleInputEmail1" class="form-label">Nueva herramienta</label><br>
                                    <div class="autocomplete" style="widht:500px;">
                                        <input required id="myInput" type="text" name="nombre"
                                            class="form-control">
                                    </div>
                                </div>


                                <div class="mb-3" class="autocomplete">

                                    <label for="exampleInputEmail1" class="form-label">unidad</label><br>
                                    <div class="autocomplete" style="widht:500px;">
                                        <input required type="text" name="unidad" class="form-control">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-1 bi ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20"
                                        fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                                    </svg>
                                </button>
                            </form>
                        </div>

                    </div>

                    <div class="col-3 text-center">

                        <br>




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
    <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.min.js">
    </script>
    <script
        src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.templates.min.js">
    </script>
    <script>
        $(document).ready(function() {
            // Setup - add a text input to each footer cell


            var table = $('#example').DataTable({

                orderCellsTop: true,
                fixedHeader: true,
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                pageLength: 4,

                scrollY: "320px",
                scrollX: true,
                scrollCollapse: true,
                paging: true,
                dom: '<"row" B> <"row"<"col-md-6 "l> <"col-md-6"f> > rt <"row"<"col-md-6 "i> <"col-md-6"p> >',
                buttons: {
                    dom: {
                        button: {
                            className: 'custom-btn btn-1'
                        }
                    },
                    buttons: [{
                            //definimos estilos del boton de excel
                            extend: "copy",
                            text: 'COPIAR',
                            className: 'custom-btn btn-1',

                        },
                        'pdf',

                        {
                            //definimos estilos del boton de excel
                            extend: "print",
                            text: 'IMPRIMIR',
                            className: 'custom-btn btn-1',

                        },
                        {
                            //definimos estilos del boton de excel
                            extend: "colvis",
                            text: 'COLUMNAS',
                            className: 'custom-btn btn-1',

                        },



                        {
                            //definimos estilos del boton de excel
                            extend: "excel",
                            text: 'EXCEL',
                            className: 'custom-btn btn-1',

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

        function autocomplete(inp, arr) {
            /*the autocomplete function takes two arguments,
            the text field element and an array of possible autocompleted values:*/
            var currentFocus;
            /*execute a function when someone writes in the text field:*/
            inp.addEventListener("input", function(e) {
                var a, b, i, val = this.value;
                /*close any already open lists of autocompleted values*/
                closeAllLists();
                if (!val) {
                    return false;
                }
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
            document.addEventListener("click", function(e) {
                closeAllLists(e.target);
            });
        }

        /*An array containing all the country names in the world:*/
        var countries = JSON.parse('<?php echo json_encode($herramientas_select); ?>');
        console.log(countries);
        /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
        autocomplete(document.getElementById("myInput"), countries);
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
