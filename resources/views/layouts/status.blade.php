@if (session('status'))
    <div class="card-panel green lighten-4 green-text text-darken-3">
        {{ session('status') }} <i class="material-icons">done</i>
    </div>
@endif
