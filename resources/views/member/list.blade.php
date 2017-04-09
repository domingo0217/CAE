@extends('layouts.main')
    @section('title')
        Lista de Miembros
    @endsection

    @section('content')
        <div class="row">
            <div class="col s12 section white z-depth-1">
                @include('layouts.status')
                <div class="">
                    <form action="searchMember" method="post">
                        {{ csrf_field() }}
                        <div class="input-field">
                            <input id="search" type="search" name="search" required class="tooltipped" data-position="top" data-delay="50" data-tooltip="Buscar">
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                </div>
                <table class="highlight responsive-table">
                    <thead>
                        <tr>
                            <th data-field="id">C&eacute;dula</th>
                            <th data-field="name">Nombre</th>
                            <th data-field="lastname">Apellido</th>
                            {{-- <th data-field="nationality">Nacionalidad</th> --}}
                            {{-- <th data-field="birthdate">Fecha de Nacimiento</th> --}}
                            {{-- <th data-field="civil_status">Estado Civil</th> --}}
                            <th data-field="telephone">Telef&oacute;no</th>
                            {{-- <th data-field="email">Correo Electr&oacute;nico</th> --}}
                            {{-- <th data-field="address">Direcci&oacute;n</th> --}}
                            {{-- <th data-field="city">Ciudad</th> --}}
                            {{-- <th data-field="delegation">Delegaci&oacute;n</th> --}}
                            <th data-field="">
                                <a class="btn-floating tooltipped btn-large waves-effect waves-light yellow darken-3 hoverable center" href="/member/create" data-position="top" data-delay="50" data-tooltip="Agregar">
                                    <i class="material-icons">add</i>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($member as $members)
                            <tr>
                                <td>{{ $members->id }}</td>
                                <td>{{ $members->name }}</td>
                                <td>{{ $members->lastname }}</td>
                                <td>{{ $members->telephone }}</td>
                                <td>
                                    <a href="member/{{ $members->id }}" class="btn-floating btn-flat waves-effect waves-dark tooltipped" data-position="top" data-delay="50" data-tooltip="Ver">
                                        <i class="material-icons yellow-text text-darken-3">visibility</i>
                                    </a>
                                    <a href="member/{{ $members->id }}/edit" class="btn-floating btn-flat waves-effect waves-dark tooltipped" data-position="top" data-delay="50" data-tooltip="Editar">
                                        <i class="material-icons yellow-text text-darken-3">edit</i>
                                    </a>
                                </td>
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
