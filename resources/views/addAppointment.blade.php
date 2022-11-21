
       <!--<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">-->
        @include('layouts.app')
         
      
      <div class="container mt-5">

      <form class="row g-3" action="/addApp" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label for="dateApp" class="form-label">Fecha de reservación</label>
            <input type="date" id="dateApp"  class="form-control border-dark border-2" name="dateApp" required>
        </div>
        
        <div class="col-md-6">
            <label for="tel" class="form-label">Número telefónico</label>
            <input type="number" id="tel" class="form-control border-dark border-2" name="tel" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
        </div>
        <div class="col-md-4">
          <label for="inputCity" class="form-label">Ciudad</label>
          <input type="text" class="form-control border-dark border-2" id="inputCity" name="city" required>
        </div>
        <div class="col-md-4">
            <label for="street" class="form-label">Calle</label>
            <input type="text" class="form-control border-dark border-2" name="street" id="street" required>
        </div>
        <div class="col-md-4">
            <label for="colony" class="form-label">Colonia</label>
            <input type="text" class="form-control border-dark border-2" name="colony"  id="colony" required>
        </div>
        <div class="col-md-4">
            <label for="num" class="form-label">Número</label>
            <input type="number"  class="form-control border-dark border-2" name="num"  id="num" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
        </div>
        <div class="col-md-4">
            <label for="cp" class="form-label">Código postal</label>
            <input type="number" class="form-control border-dark border-2" name="cp"  id="cp"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
        </div>
        <div class="col-md-4">
         
          
            <label for="basic-url" class="form-label">Servicios</label>
            <div class="form-group" required>
                @foreach ($ads as $ad)
                <div class="form-check">
                    <input class="form-check-input border-dark border-2" type="checkbox" value="{{$ad->id}}" id="flexCheckDefault{{$ad->id}}" name="service{{$ad->id}}">
                    <label class="form-check-label" for="flexCheckDefault{{$ad->id}}">
                        {{$ad->name}}
                    </label>
                </div>
                @endforeach
            </div>      
             
        </div>
        
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
      </form>
        </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
       
    </body>
</html>