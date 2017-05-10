@extends('layouts.main')

    @section('title')
        Dashboard
    @endsection

    @section('content')
        <div class="row">
            {{-- <h1 class="center">Bienvenido!</h1> --}}
            <div class="row">
                <div class="col s12 m6 l4 offset-l1">
                    <div class="card small hoverable white">
                        <div class="card-content">
                            <span class="card-title red-text text-darken-2">Miembros</span>
                            <p class="grey-text text-darken-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        </div>
                        <div class="card-action">
                            <a href="/member" class="black-text">Ir a miembros...</a>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l4 offset-l1">
                    <div class="card small hoverable white">
                        <div class="card-content">
                            <span class="card-title red-text text-darken-2">Asamblea</span>
                            <p class="grey-text text-darken-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        </div>
                        <div class="card-action">
                            <a href="/assembly" class="black-text">Ir a asambleas...</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6 l4 offset-l1">
                    <div class="card small hoverable white">
                        <div class="card-content">
                            <span class="card-title red-text text-darken-2">Capacitaciones</span>
                            <p class="grey-text text-darken-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        </div>
                        <div class="card-action">
                            <a href="/capacitation" class="black-text">Ir a capacitaciones...</a>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l4 offset-l2">
                    <div class="card small z-depth-0 transparent">
                        <img class="img-size" src="img/logo3.png">
                    </div>
                </div>
            </div>
            </div>
        </div>
    @endsection
