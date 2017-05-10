@extends('layouts.main')

    @section('title')
        Ver Tema
    @endsection

    @section('content')
        <div class="row card-panel white">
            <h4>{{ $topic->topic }}</h4>
            <div class="divider"></div>
            <a href="/assembly" class="btn-flat waves-effect">Atras</a>
            <div class="fixed-action-btn">
                <a  class="btn-floating btn-large red pulse">
                    <i class="large material-icons">add</i>
                </a>
                <ul>
                    <li><a href="" data-position="left" data-delay="50" data-tooltip="Votar" class="tooltipped btn-floating deep-orange"><i class="material-icons">done</i></a></li>
                    <li><a href="" data-position="left" data-delay="50" data-tooltip="Editar votos" class=" tooltipped btn-floating blue"><i class="material-icons">edit</i></a></li>
                </ul>
            </div>
        </div>
    @endsection
