@if (count($errors) > 0)
    <div class="card-panel red lighten-4 z-depth-0">
        <ul>
            @foreach($errors->all() as $error)
                <li class="red-text">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
