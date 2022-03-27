@extends('layouts.master')
<div class="wrapper">
    <section class="form signup">
        <header>Realtime Chat App</header>
        <form action="#" method="POST" action="{{ route('register') }}" autocomplete="off" enctype="multipart/form-data">
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
            <div class="name-details">
                <div class="field input">
                    <label>First Name</label>
                    <input type="text" name="fname"  value="{{old('fname')}}" placeholder="First name" required>
                </div>
                <div class="field input">
                    <label>Last Name</label>
                    <input type="text" name="lname" value="{{old('lname')}}" placeholder="Last name" required>
                </div>
            </div>
            <div class="field input">
                <label>Email Address</label>
                <input type="text" name="email" value="{{old('email')}}" placeholder="Enter your email" required>
            </div>
            <div class="field input">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter new password" required>
                <i class="fas fa-eye"></i>
            </div>
            <div class="field image">
                <label>Select Image</label>
                <input type="file" name="image" value="{{old('image')}}" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
            </div>
            <div class="field button">
                <input type="submit" name="submit" value="Continue to Chat">
            </div>
        </form>
        <div class="link">Already signed up? <a href="{{ route('login') }}">Login now</a></div>
    </section>
</div>

{{--<script src="javascript/pass-show-hide.js"></script>--}}
{{--<script src="javascript/signup.js"></script>--}}

