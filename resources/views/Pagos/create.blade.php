{{-- Instanciando layout --}}
@extends('layouts/main')

{{-- Titulo de la pagina --}}
@section('title')
    Nuevo pago
@endsection

{{-- Contenido de la pagina --}}
@section('content')
    <div class="section white z-depth-1">
        @if (count($errors) > 0)
            <div class="card-panel red lighten-4 z-depth-0">
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="red-text">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <form class="col s8 offset-s2" action="/Pagos" method="post">

                {{ csrf_field() }}
                
                        <div class="row">
                    <div class="col s12 m6 input-field">
                        <select name="city" required value="{{ old('id')}}">
                            <option name="id" id="id" value="null" disabled selected>Elija una cedula</option>
                            @foreach($member as $member)
                                <option value="{{ $member->id }}">{{ $member->id }}</option>
                            @endforeach
                        </select>
                        
                    </div>
                <div class="row">
                    <div class="col s12 m6 input-field">
                        <input type="text" name="name" id="name" class="validate" required value="{{ old('name')}}" data-length="30" maxlength="30" minlength="3">
                        <label data-error="incorrecto" data-success="correcto" for="name">Nombre*</label>
                    </div>
                    <div class="col s12 m6 input-field">
                        <input type="text" name="lastname" id="lastname" class="validate" required value="{{ old('lastname')}}" data-length="30" maxlength="30" minlength="3">
                        <label data-error="incorrecto" data-success="correcto" for="lastname">Apellido*</label>
                    </div>
                           
                    <div class="col s12 m6 input-field">
                        <input type="text" name="monto" id="monto" class="validate" required value="{{ old('monto')}}" data-length="20" maxlength="20" minlength="4">
                        <label data-error="incorrecto" data-success="correcto" for="monto">Monto a pagar*</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 input-field">
                        <input type="date" name="fecha_pago" id="fecha_pago" class="datepicker" required value="{{ old('fecha_pago')}}">
                        <label for="fecha_pago">Fecha de Pago*</label>
                    </div>
                   
             
                <button class="btn yellow darken-3 waves-effect right pulse" type="submit" name="submit">Generar pago</button>
            </form>
        </div>
    </div>
@endsection
