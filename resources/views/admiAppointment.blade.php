
        @include('layouts/app')
        <div class="container">
            <div class="row justify-content-md-center ">
                <div class="col col-lg-8">
                    <div class="table-responsive hscroll">
                        <table id="tableServices"  class="table table-condensed ">
                            <thead>
                                <tr>
                                    <th style="width:70%">{{ 'Nombre' }}</th>
                                    <th style="width:15%"></th>
                                    <th style="width:15%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($app as $appi)
                                    <tr>
                                        <td data-th="Nombre">{{ $appi->id }}</td>
                                        <td data-th="idUser">{{ $appi->idUser }}</td>
                                        <td data-th="day">{{ $appi->day }}</td>
                                        
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
       <!-- </div>-->
       
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
       <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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
    </body>
</html>