@foreach ($messages as $message)
    @if ($message->outgoing)
        <div class="chat outgoing">
            <div class="details">
                <p>{{$message->text}}</p>
            </div>
        </div>
    @else
        <div class="chat incoming">
            <img src="{{ asset('images/'. $user->avatar) }}">
            <div class="details">
                <p>{{$message->text}}</p>
            </div>
        </div>
    @endif
@endforeach

@if (!count($messages))
    <div class="text">No messages are available. Once you send message they will appear here.</div>
@endif

