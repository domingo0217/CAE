@extends('layouts.main')
    @section('title')
        Lista de Pagos
    @endsection

    @section('content')
        <div class="row">
            <div class="col s12 section white z-depth-1">
                @include('layouts.status')


                <table class="highlight responsive">
                    <thead>
                        <tr>
                            <th data-field="id">C&eacute;dula</th>
                            <th data-field="name">Nombre</th>
                            <th data-field="lastname">Apellido</th>
                             <th data-field="monto">Monto</th>
                             <th data-field="fecha_pago">Fecha de pago</th>

                            <th data-field="">
                                <a class="btn-floating tooltipped btn-large waves-effect waves-light yellow darken-3 hoverable center" href="/pagos/create" data-position="top" data-delay="50" data-tooltip="Agregar">
                                    <i class="material-icons">add</i>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pago as $Pago)
                            <tr>
                                <td>{{ $Pago->id }}</td>
                                <td>{{ $Pago->name }}</td>
                                <td>{{$Pago->lastname }}</td>
                                 <td>{{ $Pago->monto }}</td>
                             <td>{{ $Pago->fecha_pago }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $member->links() }} --}}
                <ul class="pagination center">
                    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                    <li class="active"><a href="#!">1</a></li>
                    <li class="waves-effect"><a href="#!">2</a></li>
                    <li class="waves-effect"><a href="#!">3</a></li>
                    <li class="waves-effect"><a href="#!">4</a></li>
                    <li class="waves-effect"><a href="#!">5</a></li>
                    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                </ul>
            </div>
        </div>
    @endsection
