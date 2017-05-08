@extends('layouts.main')

    @section('title')
        Seleccionar Miembros
    @endsection

    @section('content')
        <div class="card-panel white">
            {{-- <p>
                <strong>Capacitacion: </strong>{{ $capacitation->capacitation }} &nbsp;
                <strong>Impartidor: </strong>{{ $capacitation->imparting }} &nbsp;
                <strong>Duracion:</strong> {{ $capacitation->hours }}  horas &nbsp;
                <strong>Lugar: </strong>{{ $capacitation->place }} &nbsp;
                <strong>Fecha de Inicio: </strong>{{ $capacitation->imparted_date }} &nbsp;
                <strong>Fecha de finalizacion: </strong>{{ $capacitation->finalized_date }}
            </p>
            <div class="divider"></div> --}}
            @include('layouts.statusNeg')
            {{-- <div class="col s12 m4">
                <form action="/search2CapacitationMember/{{ $capacitation->id }}" method="post">
                    {{ csrf_field() }}
                    <div class="input-field">
                        <input id="search" type="search" name="search" required class="tooltipped" data-position="top" data-delay="50" data-tooltip="Buscar">
                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                    </div>
                </form>
            </div> --}}
            <form action="/update2CapacitationMember/{{ $capacitation->id }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    @if(!empty($members[0]))
                        <div class="collection">
                            <?php $i = 0; ?>
                            @foreach($members as $member)
                                <a class="collection-item">
                                    <input type="checkbox" name="members[]" id="{{ $i }}" value="{{ $member->id }}">
                                    <label class="black-text" for="{{ $i }}">{{ $member->id.' &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; '.$member->name.' '.$member->lastname }}</label>
                                </a>
                                <?php $i++; ?>
                        @endforeach
                        </div>
                    @else
                        <h5 class="grey-text center">Actualmente no hay miembros!</h5>
                    @endif
                    <a href="/capacitation/{{ $capacitation->id }}" class="btn btn-flat waves-effect">Atras</a>
                    <button type="submit" class="btn red darken-1 hoverable waves-effect right" name="button">Eliminar de Capacitacion</button>
            </form>
        </div>
    @endsection
