@foreach ($users as $user)
    <a href="{{ route('chat', ['id' => $user->id]) }}">
        <div class="content">
            <img src="{{ asset('images/'. $user->avatar) }}">
            <div class="details">
                <span>{{$user->name}}</span>
                <p>{{$user->message}}</p>
            </div>
        </div>
        <div class="status-dot {{$user->status}}"><i class="fas fa-circle"></i></div>
    </a>
@endforeach
