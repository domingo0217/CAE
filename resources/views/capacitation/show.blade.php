@extends('layouts.main')

    @section('title')
        Ver Capacitación
    @endsection

    @section('content')
        <div class="card-panel white">
            <p>
                <strong>Capacitacion: </strong>{{ $capacitation->capacitation }} &nbsp;
                <strong>Impartidor: </strong>{{ $capacitation->imparting }} &nbsp;
                <strong>Duracion:</strong> {{ $capacitation->hours }}  horas &nbsp;
                <strong>Lugar: </strong>{{ $capacitation->place }} &nbsp;
                <strong>Fecha de Inicio: </strong>{{ $capacitation->imparted_date }} &nbsp;
                <strong>Fecha de finalizacion: </strong>{{ $capacitation->finalized_date }}
                <div class="fixed-action-btn">
                    <a class="btn-floating btn-large red pulse">
                      <i class="large material-icons">add</i>
                    </a>
                    <ul>
                      <li><a href="/capacitation_member/{{ $capacitation->id }}/edit" class="btn-floating yellow darken-3 hoverable tooltipped" data-position="left" data-delay="50" data-tooltip="Agregar Miembros a la capacitacion"><i class="material-icons">group_add</i></a></li>
                      <li><a href="/edit2CapacitationMember/{{ $capacitation->id }}"class="btn-floating deep-orange hoverable tooltipped" data-position="left" data-delay="50" data-tooltip="Editar Miembros de la capacitacion"><i class="material-icons">edit</i></a></li>
                    </ul>
                </div>
            </p>
            <div class="row">
                <div class="col s12 m4">
                    <form action="/search2Capacitation/{{ $capacitation->id }}" method="post">
                        {{ csrf_field() }}
                        <div class="input-field">
                            <input id="search" type="search" name="search" required class="tooltipped" data-position="right" data-delay="50" data-tooltip="Buscar">
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                </div>
            </div>
            <div class="divider"></div>
                @if(!empty($members[0]))
                    <div class="collection">
                        <?php $i = 0; ?>
                        @foreach($members as $member)
                            <a class="collection-item">
                                {{ $member->id.' &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; '.$member->name.' '.$member->lastname }}</a>
                            </a>
                            <?php $i++; ?>
                        @endforeach
                    </div>
                @else
                    <h5 class="grey-text center">Actualmente no hay miembros!</h5>
                @endif
            <a href="/capacitation" class="btn btn-flat waves-effect waves-red">Atras</a>
        </div>
    @endsection
