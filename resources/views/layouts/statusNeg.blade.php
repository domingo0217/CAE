@if (session('statusNeg'))
    <div id="message" class="card-panel red lighten-4 red-text text-darken-3">
        <h6>{{ session('statusNeg') }} <i class="material-icons">info_outline</i></h6>
    </div>
@endif
