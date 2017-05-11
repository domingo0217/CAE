@extends('layouts.main')

    @section('title')
        Ver Asamblea
    @endsection

    @section('content')
        <div class="row card-panel white">
            {{-- <script src="/tinymce/js/tinymce/tinymce.min.js"></script>
            <script type="text/javascript">
                tinyMCE.init({
                    selector : "#textarea",
                    plugins: "lists advlist print",
                    toolbar: ["undo redo | fontselect fontsizeselect | bold italic underline | alignleft aligncenter alignjustify alignright | bullist numlist | indent outdent"],
                    height: 300
                });
            </script> --}}
            <h4>{{ $assembly->assembly }}</h4>
            <h6><strong>Fecha: </strong>{{ $assembly->date }}</h6>
            <div class="divider"></div>
            <textarea class="materialize-textarea" id="textarea" readonly>{{ $assembly->record }}</textarea>
            <a href="/assembly" class="btn-flat waves-effect">Atras</a>
            <div class="fixed-action-btn">
                <a  class="btn-floating btn-large red pulse">
                    <i class="large material-icons">add</i>
                </a>
                <ul>
                    <li><a href="/attendance/{{ $assembly->id }}" data-position="left" data-delay="50" data-tooltip="Ver asistencia" class="tooltipped btn-floating deep-orange"><i class="material-icons">done_all</i></a></li>
                    <li><a href="/listTopic/{{ $assembly->id }}" data-position="left" data-delay="50" data-tooltip="Ver temas" class="tooltipped btn-floating yellow darken-3"><i class="material-icons">reorder</i></a></li>
                    <li><a href="/assembly/{{ $assembly->id }}/edit" data-position="left" data-delay="50" data-tooltip="Editar" class=" tooltipped btn-floating blue"><i class="material-icons">edit</i></a></li>
                </ul>
            </div>
        </div>
    @endsection
