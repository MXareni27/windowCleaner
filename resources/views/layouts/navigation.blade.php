<nav x-data="{ open: false }" class=" border-b  navbar navbar-expand-lg navbar navbar-dark bg-dark">
    <!-- Primary Navigation Menu -->
    
        <div class="flex justify-between h-16 container-fluid">
            <div class="flex sm:flex sm:items-center sm:ml-6">
                <!-- Logo -->
                @auth
                <div class="shrink-0 flex items-center">
                    <a class="text-decoration-none font-italic" href="{{ route('dashboard') }}">
                        <img src="img/logo.png" class="img-fluid" alt="CleanyDallas" width= 100px>
                    </a>
                </div>

                <!-- Navigation Links -->
                
                <ul class="navbar-nav">
                    @if (Auth::user()->hasRole('registered'))
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Reservaciones
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="/addAppointment">Realizar</a></li>
                            <li><a class="dropdown-item" href="/viewAppointment">Ver</a></li>
                        </ul>
                        
                        </li>
                    
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Servicios  
                      </a>
                      <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink">
                          <li><a class="dropdown-item" href="/showServices">Ver</a></li>
                      </ul>
                    </li>
                    @endif
                </ul>
                @if (Auth::user()->hasRole('admin'))
                <ul class="navbar-nav">
        
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Reservaciones
                      </a>
                      <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="/admiAppointment">Administrar</a></li>
                        <li><a class="dropdown-item" href="/calendar">Calendario</a></li>
                      </ul>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Servicios
                      </a>
                      <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalAddService">Agregar nuevo servicio</a></li>
                        <li><a class="dropdown-item" href="/admiService">Administrar</a></li>
                      </ul>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Usuarios
                      </a>
                      <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Administrar</a></li>
                      </ul>
                    </li>
                </ul>
                @endif
                @else
                <div class="shrink-0 flex items-center">
                    <a class="text-decoration-none font-italic" href="{{ route('dashboard') }}">
                        <img src="img/logo.png" class="img-fluid" alt="no se pudo manito" width= 100px>
                    </a>
                </div>
                <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Servicios  
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="/showServices">Ver</a></li>
                    </ul>
                  </li>
                </ul>
                @endauth
                
            </div>

            <!-- Settings Dropdown -->
            @auth
            @if (Route::has('login'))
            <div class="hidden sm:flex sm:items-center sm:ml-6 float-end">
                <x-dropdown align="right" width="48">
                    
                    <x-slot name="trigger">
                        
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                        
                        
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                    
                </x-dropdown>
            </div>
            @endif
                    @else
                    <div class="sm:flex sm:items-center sm:ml-6">
                        <div align="right" width="48">
                            
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                @endif
                            
                        </div>
                     </div>
            @endauth
            
            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    
    

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        @auth
        @if (Route::has('login'))
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @endif
        @endauth
    </div>
</nav>
