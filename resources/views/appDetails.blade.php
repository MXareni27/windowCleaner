
        @include('layouts/app')
        <br><br>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                      <th scope="col"></th>
                      <th scope="col"></th>
                    </tr>
                </thead> 
                <tbody>
                    <tr>
                        <th>
                            Nombre: 
                        </th>
                        <td>
                            {{$app->username()->name}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Fecha: 
                        </th>
                        <td>  
                            {{$app->day}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Estatus: 
                        </th>
                        <td > 
                            <form action="/editStatus" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$app->id}}">
                                <div class="row">
                                    <div class="col">
                                        <select  name="selectStatus">
                                            <option value="Aceptada" @if($app->status == "Aceptada") selected @endif>Aceptar</option>
                                            <option value="Rechazada" @if($app->status == "Rechazada") selected @endif>Rechazar</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">Guardar estatus</button>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Dirección: 
                        </th>
                        <td> 
                            {{$app->alldirection()->street}}, Col. {{$app->alldirection()->colony}}, #{{$app->alldirection()->number}}, {{$app->alldirection()->city}}, CP.{{$app->alldirection()->cp}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Número de teléfono: 
                        </th>
                        <td> 
                            {{$app->alldirection()->phoneNumber}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Servicios: 
                        </th>
                        <td> 
                            <ul class="list-group">
                                               
                                @foreach($app->servicesApp() as $services)
                                    
                                    <li class="list-group-item">{{$services->service}}</li>
                                @endforeach
                            </ul>
                            
                        </td>
                    </tr>
                </tbody>
            </table> 
            
        </div>
        
       <!-- </div>-->
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
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