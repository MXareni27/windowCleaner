
        
        @include('layouts/app')
        <br>
        <div class="container">
            <div class="row justify-content-md-center ">
                <div class="col col-lg-8">
                    <form action="/store" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$ad->id}}">
                        
                        <div class="table-responsive hscroll">
                        <table id="tableServices"  class="table table-condensed ">
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
                                        <input type="text" name="name" id = "" value="{{$ad->name}}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Descripción: 
                                    </th>
                                    <td>
                                        <div id='dinamicEdit' name="divDescription"> 
                                            @php
                                                $i = 1;
                                            @endphp 
                                            @foreach($ad->nameService() as $description) 
                                                <div>
                                                    <label>{{$i}}</label>
                                                     - 
                                                    <input type="text" name="description{{$i}}" id = "" value="{{$description->description}}">
                                                    <button onclick="eliminarEdit(this)" class="btn btn-info">Eliminar</button>
                                                    <br>
                                                </div>
                                                @php
                                                    $i = $i + 1;
                                                @endphp
                                            @endforeach
                                        </div>

                                        <button  id='addEdit' type="button" class="btn btn-secondary mt-2">Agregar descripción</button>
                                       
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Imagen:
                                    </th>
                                    <td>
                                        <img id="vis" src="img/services/{{$ad->img}}" alt="" width="250px">
                                        <input class="mt-2"id="imgEdit" type="file" name="img" src="img/services/{{$ad->img}}" value="img/services/{{$ad->img}}" onchange="updateImage()">
                                    </td>
                                </tr>
                            </tbody>
                        </table> 
                        </div>
                        <input type="submit" class="btn btn-secondary" value="Guardar cambios">
                    </form>
                </div>
            </div>
        </div>
        
       <!-- </div>-->
       
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
                <script>
                    // Constantes para el div contenedor de los inputs y el botón de agregar
        const contenedor = document.querySelector('#dinamic');
        const btnAgregar = document.querySelector('#add');
        const contenedorEdit = document.querySelector('#dinamicEdit');
        const btnAgregarEdit = document.querySelector('#addEdit');
        // Variable para el total de elementos agregados
        let total = 1;
        let totalEdit = 1;

        /**
         * Método que se ejecuta cuando se da clic al botón de agregar elementos
         */
        btnAgregar.addEventListener('click', e => {
            let div = document.createElement('div');
            div.innerHTML = `<label>${total++}</label> - <input type="text" name="description${total-1}" placeholder="Descripción" required><button onclick="eliminar(this)" class="btn btn-info">Eliminar</button>`;
            contenedor.appendChild(div);
        })

        btnAgregarEdit.addEventListener('click', e => {
            actualizarContadorEdit();
            let div = document.createElement('div');
            div.innerHTML = `<label>${totalEdit++}</label> - <input type="text" name="description${totalEdit-1}" placeholder="Descripción" required><button onclick="eliminarEdit(this)" class="btn btn-info ms-1">Eliminar</button>`;
            contenedorEdit.appendChild(div);
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

        const eliminarEdit = (e) => {
            const divPadre = e.parentNode;
            contenedorEdit.removeChild(divPadre);
            actualizarContadorEdit();
        };
        /**
         * Método para actualizar el contador de los elementos agregados
        */
        const actualizarContadorEdit = () => {
            let divs = contenedorEdit.children;
            totalEdit = 1;
            for (let i = 0; i < divs.length; i++) {
                divs[i].children[0].innerHTML = totalEdit++;
                let num = totalEdit-1;
                let text = num.toString();
                divs[i].children[1].name = "description"+ text;
            }//end for

        };

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

            const updateImage= () => {
            var x = document.getElementById("imgEdit");
            var vis = document.getElementById("vis");
            vis.src = "";
            //console.log(vis.src);
            };
        </script>
    </body>
</html>