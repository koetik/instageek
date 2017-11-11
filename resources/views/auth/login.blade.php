@extends('layouts.app')

@section('content')
<style type="text/css">
    body{
        background-color: #F9FAF9;
    }
    .container{
        margin-top: 100px;
    }
</style>
<div class="ui container">
    <div class="ui equal width center aligned padded grid stackable">
        <div class="row">
            <div class="five wide column">
                <img src="{{asset('img/front_page.jpg')}}" width="250">
            </div>
            <div class="five wide column">
                <div class="ui segments">
                    <div class="ui segment">
                        <img src="{{asset('img/brand.png')}}" width="250">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="ui input fluid">
                                <input type="text" placeholder="Your Email..." name="email">
                            </div>
                            <div class="ui divider hidden"></div>
                            <div class="ui input fluid">
                                <input type="password" placeholder="Your Password..." name="password">
                            </div>
                            @if ($errors->has('email'))
                                <div class="ui error message">
                                    <!-- belum tau caranya custom message error login -->
                                    <div class="header">Periksa kembali email anda</div>
                                </div>
                            @endif
                            <div class="ui divider hidden"></div>
                            <button class="ui primary fluid button">
                                <i class="key icon"></i>
                                Login
                            </button>
                        </form>
                    </div>
                </div>
                <div class="ui segment">
                    Do not have an account? <a href="{{ route('register') }}">Register</a>
                </div>
            </div>

        </div>
        
    </div>
</div>

@endsection
