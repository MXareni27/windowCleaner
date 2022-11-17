<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
  
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link href='fullcalendar/main.css' rel='stylesheet' />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.css">
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales-all.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    </head>
    <body class="font-sans antialiased">
        
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

        

            <div class="modal fade " id="modalAddService" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            Nombre: 
                                        </th>
                                        <td>
                                            <input  type="text" name="name">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Imagen: 
                                        </th>
                                        <td>
                                            <input id="day" type="file" name="img">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Descripción: 
                                        </th>
                                        <td>
                                            <div id='dinamic' name="divDescription"> </div>
                                            <button  id='add' type="button" class="btn btn-secondary">Agregar descripción</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>  
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      <input type="submit" class="btn btn-secondary"  value="Agregar">
                    </div>
                    </form>
                  </div>
                </div>
              </div>
    
