@extends('layouts.main')

    @section('title')
        Ver {{ $charge->charge }}
    @endsection

    @section('content')
        <div class="row card-panel white">
            @include('layouts.status')
            <table class="responsive-table highlight centered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Miembro</th>
                        <th>Cargo</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if($charge->member->count() > 0)
                        @foreach($charge->member as $member)
                            <tr>
                                <td>{{ $member->id }}</td>
                                <td>{{ $member->name.' '.$member->lastname }}</td>
                                <td>{{ $member->charge[0]->charge }}</td>
                                <td>{{ $member->pivot->starting_date }}</td>
                                <td>{{ $member->pivot->ending_date }}</td>
                                <td>
                                    <a href="/edit2Charge/{{ $member->id }}/{{ $member->charge[0]->id }}" class="btn-flat btn-floating "><i class="material-icons yellow-text text-darken-3">edit</i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            @if($charge->member->count() == 0)
                <h5 class="center grey-text text-lighten-1 card-panel z-depth-0">No hay {{ $charge->charge }} actualmente!</h5>
            @endif
            <div class="divider"></div>
            <a href="/charge" class="btn btn-flat">Atras</a>
            <div class="fixed-action-btn">
                <a class="btn-floating btn-large red pulse" href="/create2Charge/{{ $charge->id }}">
                    <i class="large material-icons">add</i>
                </a>
            </div>
        </div>
    @endsection
