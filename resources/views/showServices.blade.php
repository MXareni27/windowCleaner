@include('layouts.app')
         
      
<div class="container mt-2 mb-3">
    <div class="row justify-content-lg-center ">
        <div class="col col-lg-10">
            <br>
            <br>
            <div class="table-responsive hscroll">
                <table id="tableServicesShow"  class="table table-condensed ">
                    <thead>
                        <tr>
                            <th style="width:35%">Nombre</th>
                            <th style="width:35%">Descripción</th>
                            <th style="width:30%"></th>
                            
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
                                    <img src="img/services/{{$ad->img}}" class="d-block img-fluid" alt="..." >
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
        $('#tableServicesShow').DataTable({
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