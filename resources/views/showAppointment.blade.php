@include('layouts/app')


        <br><br>
        <?php
            $fecha = date("Y-m-d");
            if($fecha < $app->day){
        ?>
            <form action="/editAppointment" method="post">
                @csrf
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width:30%" scope="col"></th>
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
                                    
                                    <input id="dateApp" name="dateApp"  class= "border-dark border-2 rounded"type="date" value={{$app->day}}>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Estatus: 
                                </th>
                                <td > 
                                    
                                        <input type="hidden" name="id" value="{{$app->id}}">
                                        <div class="row">
                                            <div class="col">
                                                <select  name="selectStatus " class=" rounded border-dark border-2">
                                                    <option value="Aceptada" @if($app->status == "Aceptada") selected @elseif($app->status == "Rechazada") disabled @endif>Aceptar</option>
                                                    <option value="Cancelada" @if($app->status == "Cancelada") selected @elseif($app->status == "Rechazada") disabled @endif>Cancelar</option>
                                                    <option value="Rechazada" @if($app->status == "Rechazada") selected @endif disabled>Rechazar</option>
                                                </select>
                                            </div>
                                        </div>
                                    
                                </td>
                            </tr>
                           
                            <tr>
                                <th>
                                    Ciudad
                                </th>
                                <td>
                                    <input type="text" class="rounded border-dark border-2" id="inputCity" name="city" value="{{$app->alldirection()->city}}" required>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Calle
                                </th>
                                <td>
                                  <input type="text" class="form-control border-dark border-2" name="street" id="street" value="{{$app->alldirection()->street}}" required>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Colonia
                                </th>
                                <td>
                                    <input type="text" class="form-control border-dark border-2" name="colony"  id="colony" value=" {{$app->alldirection()->colony}}" required>
                                </td>
                            </tr>
                              <tr>
                                <th>
                                    N??mero
                                </th>
                                <td>
                                    <input type="number"  class="form-control border-dark border-2" name="num"  id="num" value="{{$app->alldirection()->number}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                                </td>
                            </tr>
                              <tr>
                                <th>
                                    C??digo postal
                                </th>
                                <td>
                                    <input type="number" class="form-control border-dark border-2" name="cp" value="{{$app->alldirection()->cp}}" id="cp"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    N??mero de tel??fono: 
                                </th>
                                <td> 
                                    <input type="number" value="{{$app->alldirection()->phoneNumber}}" id="tel" class="form-control border-dark border-2" name="tel" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Servicios: 
                                </th>
                                <td> 
                                    <div class="form-group" required>
                                        <?php $arrayAds=array(); $arrayAppService=array(); ?>
                                        
                                        @foreach ($ads as $ad)
                                        <div class="form-check">
                                                <input class="form-check-input border-dark border-2" type="checkbox" value="{{$ad->id}}" id="flexCheckDefault{{$ad->id}}" name="service{{$ad->id}}" 
                                                @foreach($app->servicesApp() as $services)
                                                    @if($services->service == $ad->name)
                                                        checked
                                                    @endif
                                                @endforeach>
                                                <label class="form-check-label" for="flexCheckDefault{{$ad->id}}">
                                                    {{$ad->name}}
                                                </label>
                                           
                                            <?php $arrayAds[] = $ad->name;?>
                                        </div>
                                        @endforeach
                                        @foreach($app->servicesApp() as $services)
                                             <?php $arrayAppService[] = $services->service;?>
                                        @endforeach
                                        <?php $resultado=array_diff($arrayAppService,$arrayAds); ?>
                                        @foreach($resultado as $res)
                                            <div class="form-check">
                                                <input class="form-check-input border-dark border-2" type="checkbox" value="" id="" name="" checked disabled>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{$res}}   <span class="label warning" style="color:#f44336">Servicio ya no disponible</span>
                                                </label>
                                            </div>
                                            
                                        @endforeach
                                    
                                    </div>     

                                    
                                </td>
                            </tr>
                        </tbody>
                    </table> 
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mb-5">Guardar cambios</button>
                    </div>
                </div>
            </form>
        <?php
            }
            else{
        ?>
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
                                {{$app->status}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Direcci??n: 
                            </th>
                            <td> 
                                {{$app->alldirection()->street}}, Col. {{$app->alldirection()->colony}}, #{{$app->alldirection()->number}}, {{$app->alldirection()->city}}, CP.{{$app->alldirection()->cp}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                N??mero de tel??fono: 
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
        <?php
            }
        ?>
        

        <!--ToastFecha-->
        <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
            <div id="toastDate" class="toast " role="alert" aria-live="polite" aria-atomic="true" data-bs-delay="4">
              <div class="toast-header bg-danger">
                <strong class="me-auto"> </strong>
                <small></small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
              <div class="toast-body ">
                Ingresa una fecha v??lida
              </div>
            </div>
        </div>
       <!-- </div>-->
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
        <script>
            const dateSet = document.querySelector('#dateApp');
            

            dateSet.addEventListener('change', e => {
                var dateToday = new Date();
                var dateSetDay = dateSet.value;
                console.log(dateSetDay);
                const arrayDatasSetDay = dateSetDay.split('-');
                dateSetDay = arrayDatasSetDay[1] +" " +arrayDatasSetDay[2]+ " "+ arrayDatasSetDay[0];
                //console.log(dateSetDay);
                dateSetDay = new Date(dateSetDay);
                console.log(dateSetDay);
                var dateTomorrow = new Date();
                dateTomorrow.setDate(dateToday.getDate() + 1)
                var actualday = dateTomorrow.getFullYear()+ "-"+ (dateTomorrow.getMonth()+ 1) + "-"+ dateTomorrow.getDate();
                console.log(actualday);
                console.log("ppppppp");
                if(dateToday >= dateSetDay){
                    dateSet.value = actualday;
                    //$('#toastDate').toast({delay:5000});
                    //$('#toastDate').toast("show");
                    //toast.show('#toastDate');
                    //console.log("valida");
                    var toastElList = document.getElementById('toastDate');
                    var toast = new bootstrap.Toast(toastElList,{delay: 5000});
                    //toast.delay(10000);
                    toast.show();
                    
                }
            })
        </script>
    </body>
</html>