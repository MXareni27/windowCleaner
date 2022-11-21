@include('layouts.app')
         
      
<div class="container mt-5">
    <div class="row justify-content-lg-center ">
        <div class="col col-lg-10">
            <br>
            <br>
            <div class="table-responsive hscroll">
                <table id="tableAppointmentsShow"  class="table table-condensed ">
                    <thead>
                        <tr>
                            <th style="width:15%">Día</th>
                            <th style="width:30%">Dirección</th>
                            <th style="width:30%">Servicios</th>
                            <th style="width:15%">Estatus</th>
                            <th style="width:10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($app as $appi)
                            <tr>
                                <td>{{$appi->day}}</td>
                                <td data-th="Direccion">{{$appi->alldirection()->street}}, Col. {{$appi->alldirection()->colony}}, #{{$appi->alldirection()->number}}, {{$appi->alldirection()->city}}, CP.{{$appi->alldirection()->cp}}</td>
                                <td>
                                    <ul class="list-group">
                                        @foreach($appi->servicesApp() as $services)
                                            
                                            <li class="list-group-item">{{$services->service}}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{$appi->status}}</td>
                                <td>
                                    <form action="/appointment/{{$appi->id}}">
                                        <input type="submit" class="btn btn-info" value="Ver" />
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
        
<script>
    $(document).ready( function () {
        $('#tableAppointmentsShow').DataTable({
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