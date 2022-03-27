@extends('layouts.master')
<div class="wrapper">
    <section class="chat-area">
        <header>
            <a href="{{ route('users') }}" class="back-icon"><i class="fas fa-arrow-left"></i></a>
            <img src="{{ asset('images/'. $user->avatar) }}">
            <div class="details">
                <span>{{$user->name}}</span>
                <p>{{$user->status}}</p>
            </div>
        </header>
        <div class="chat-box">

        </div>
        <form action="#" class="typing-area" data-incoming="{{ route('conversation', ['id' => $user->id]) }}" data-outgoing="{{ route('sendMessage', ['id' => $user->id]) }}">
            <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
            <button><i class="fab fa-telegram-plane"></i></button>
        </form>
    </section>
</div>

<script src="{{asset('js/chat.js')}}"></script>
