@extends('layouts.master')
<div class="wrapper">
    <section class="users">
        <header>
            <div class="content">
                <img src="{{ asset('images/'. Auth::user()->avatar) }}">
                <div class="details">
                    <span>{{Auth::user()->name}}</span>
                    <p>Online</p>
                </div>
            </div>
            <a href="{{ route('logout') }}" class="logout">Logout</a>
        </header>
        <div class="search">
            <span class="text">Select an user to start chat</span>
            <input type="text" placeholder="Enter name to search...">
            <button><i class="fas fa-search"></i></button>
        </div>
        <div class="users-list">

        </div>
    </section>
</div>

<script src="{{asset('js/users.js')}}"></script>
