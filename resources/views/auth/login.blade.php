@extends('layouts.master')
<div class="wrapper">
    <section class="form login">
        <header>Realtime Chat App</header>
        <form action="#" method="POST" action="{{ route('login') }}" autocomplete="off" >
            @csrf
            @if ($errors->any())
                <div class="error-text">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="field input">
                <label>Email Address</label>
                <input type="text" name="email" placeholder="Enter your email" required value="{{old('email')}}">
            </div>
            <div class="field input">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password" required>
                <i class="fas fa-eye"></i>
            </div>
            <div class="field button">
                <input type="submit" name="submit" value="Continue to Chat">
            </div>
        </form>
        <div class="link">Not yet signed up? <a href="{{ route('register') }}">Signup now</a></div>
    </section>
</div>
