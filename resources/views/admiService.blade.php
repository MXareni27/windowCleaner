
        @include('layouts/app')
        <br>
        <div class="">
            <div class="row justify-content-lg-center ">
                <div class="col col-lg-8">
                    <a href="{{route('download-ServicesPDF')}}" class="btn btn-primary btn-sm">Exportar en PDF</a>
                    <br>
                    <br>
                    <div class="table-responsive hscroll">
                        <table id="tableServices"  class="table table-condensed ">
                            <thead>
                                <tr>
                                    <th style="width:35%">Nombre</th>
                                    <th style="width:35%">Descripción</th>
                                    <th style="width:15%"></th>
                                    <th style="width:15%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ads as $ad)
                                    <tr>
                                        <td data-th="Nombre">{{ $ad->name }}</td>
                                        <td data-th="Nombre">
                                            <ul class="list-group">
                                               
                                            @foreach($ad->nameService() as $services)
                                                
                                                <li class="list-group-item">{{$services->description}}</li>
                                            @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <form action="/editService" method="POST" >
                                                @csrf
                                                <input type="hidden" name="adIDEdit" value={{$ad->id}} >
                                                <input type="submit" class="btn btn-info"  value="Editar">
                                            </form>
                                        </td>
                                        <td>
                                            <form action="/deleteService" method="POST" >
                                                @csrf
                                                <input type="hidden" name="adID" value={{$ad->id}}>
                                                <input type="submit" class="btn btn-secondary"  value="Eliminar">
                                            </form>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
       <!-- </div>-->
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
        
    
    
    

        <script>
                    // Constantes para el div contenedor de los inputs y el botón de agregar
            const contenedor = document.querySelector('#dinamic');
            const btnAgregar = document.querySelector('#add');

            // Variable para el total de elementos agregados
            let total = 1;

            /**
             * Método que se ejecuta cuando se da clic al botón de agregar elementos
             */
            btnAgregar.addEventListener('click', e => {
                let div = document.createElement('div');
                div.innerHTML = `<label>${total++}</label> - <input type="text" name="description${total-1}" placeholder="Descripción" required><button onclick="eliminar(this)">Eliminar</button>`;
                contenedor.appendChild(div);
            })

            /**
             * Método para eliminar el div contenedor del input
             * @param {this} e 
             */
            const eliminar = (e) => {
                const divPadre = e.parentNode;
                contenedor.removeChild(divPadre);
                actualizarContador();
            };

            /**
             * Método para actualizar el contador de los elementos agregados
            */
            const actualizarContador = () => {
                let divs = contenedor.children;
                total = 1;
                for (let i = 0; i < divs.length; i++) {
                    divs[i].children[0].innerHTML = total++;
                    let num = total-1;
                    let text = num.toString();
                    divs[i].children[1].name = "description"+ text;
                }//end for

            };
        </script>
        <script>
            $(document).ready( function () {
                $('#tableServices').DataTable({
                    ordering: true,
            language: {
            lengthMenu: 'Mostrando _MENU_ servicios por página',
            zeroRecords: 'No se encontró ninguna coincidencia',
            info: 'Mostrando página _PAGE_ de _PAGES_',
            infoEmpty: 'No hay servicios',
            infoFiltered: '(Filtrados de _MAX_ pedidos totales)',
            "search":         "Buscar:",
            "paginate": {
                "first":      "Primero",
                "last":       "Último",
                "next":       "Siguiente",
                "previous":   "Anterior"
            },}
                });
            } );
        </script>
    </body>
</html>