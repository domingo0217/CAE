@extends('layouts.main')

    @section('title')
        Editar Asamblea
    @endsection

    {{-- @section('quillCss')
        <link rel="stylesheet" href="/quill/quill.core.css">
        <link rel="stylesheet" href="/quill/quill.snow.css">
    @endsection --}}

    @section('content')
        <div class="row card-panel white">
            @include('layouts.errors')
            <form action="/assembly/{{ $assembly->id }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="col s12 m6 input-field">
                    <?php $nombre = 'Asamblea General'; ?>
                    <input type="text" name="" value="{{ $assembly->assembly or old('assembly') }}"required class="validate" minlength="8">
                    <label for="assembly" data-success="correcto" data-error="incorrecto">Asamblea</label>
                </div>
                <div class="col s12 m6 input-field">
                    <input type="date" class="datepicker" name="date" value="{{ $assembly->date or old('date') }}" required class="validate">
                    <label for="date" data-success="correcto" data-error="incorrecto">Fecha</label>
                </div>
                <div class="col s12 input-field">
                    <textarea name="record" id="textarea" class="materialize-textarea" required>
                        {{ $assembly->record or old('record') }}
                    </textarea>
                    <label for="textarea">Acta</label>
                </div>
                <div class="col s12 input-field">
                    <a href="/assembly" class="btn-flat waves-effect">Atras</a>
                    <button type="submit" class="btn yellow darken-3 right">Guardar</button>
                </div>
            </form>
        </div>
    @endsection

    {{-- @section('quillScript')
        <script src="/quill/quill.core.js"></script>
        <script src="/quill/quill.js"></script>
        <script type="text/javascript">
        var toolbarOptions = [
          ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
          ['blockquote', 'code-block'],             // custom button values
          [{ 'list': 'ordered'}, { 'list': 'bullet' }],     // superscript/subscript
          [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
          [{ 'direction': 'rtl' }],                         // text direction

          [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
          [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

          [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
          [{ 'font': [] }],
          [{ 'align': [] }],

          ['clean']                                         // remove formatting button
        ];
        var options = new Quill('#textarea', {
            modules: {
                toolbar: toolbarOptions
            },
            placeholder: 'Escribe aqui...',
            theme: 'snow'
        });
        </script>
    @endsection --}}
