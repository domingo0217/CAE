@if (session('status'))
    <div id="message" class="card-panel green lighten-4 green-text text-darken-3">
        {{ session('status') }} <i class="material-icons">info_outline</i>
    </div>
@endif
