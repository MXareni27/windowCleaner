


        
          <div class="modal fade" id="modalAppointment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo servicio</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/add" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                        @csrf
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
                                        Nombre de usuario: 
                                    </th>
                                    <td>
                                        <input type="text" id="nameUser" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Día: 
                                    </th>
                                    <td>
                                        <p id="day"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Servicios: 
                                    </th>
                                    <td>
                                      <p id="status"></p>
                                    </td>
                                </tr>
                                <tr>
                                  <th>
                                      Estatus: 
                                  </th>
                                  <td>
                                      <p id="status"></p>
                                  </td>
                              </tr>
                            </tbody>
                        </table>  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  
                </div>
                </form>
              </div>
            </div>
          </div>
        @include('layouts/app')
        <br><br>
        <div class="container"><div class="container"><div id='calendar'></div></div></div>
       <!-- </div>-->
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>

          document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
              initialView: 'dayGridMonth',
              locale:'es',
              headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
              },
              events: [
          /*deberia de crear tantos eventos como reguistros de la tabla de la bbdd, y los datos interlos deberian completarse con atributos de la tabla*/
          
                @foreach ($app as $appi)
                {
                  
                  title: 'Reservación de ' + '{{$appi->username()->name}}' ,/*esto deberia de cogerlo de la base de datos*/
                  start: '{{$appi->day}}',
                  //id: '{{$appi->id}}',
                  url: '/calendar/' + '{{$appi->id}}',
                  backgroundColor: @if($appi->status == 'Aceptada')
                     'rgba(0,255,100,1)',
                     textColor: 'rgba(0,0,0,1)',
                  @else
                    'rgba(255,0,0,1)',
                  @endif
                },
                @endforeach
            
            
        
        // other events here
              ],
              eventClick:function(info){
                //$('#idUser').val(info.event.title);
                //$('#idUser').val('2022-11-17');
                var day = ("0" + (info.event.start).getDate()).slice(-2);
                var month = ("0" + ((info.event.start).getMonth() + 1)).slice(-2);
                var today = (info.event.start).getFullYear()+"-"+(month)+"-"+(day) ;
                //$('#datePicker').val(today);
                //document.getElementById('day').setAttribute('value',info.event.start);
                console.log(info.event.start);
                // today = Date.parse(today);
                //$('#day').val(today.format('YYYY-MM-DD'));
                //
                $('#nameUser').val(info.event.id);
                //$('#day').val(today);
                //document.getElementById("#day").value = today;
                $('#modalAppointment').modal({ show:false });
                //$('#day').val(today);
                $('#modalAppointment').modal('show');
                
              },
              eventColor: '#2C3E50'
            });
            calendar.render();
          });
            
            </script>
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