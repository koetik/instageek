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
                <div class="ui segments">
                    <div class="ui segment inverted nightli">
                        <h3 class="ui header">
                            Register
                        </h3>
                    </div>
                    <div class="ui segment">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <div class="ui input fluid">
                                <input type="email" placeholder="Email..." name="email">
                            </div>
                            <div class="ui divider hidden"></div>
                            <div class="ui input fluid">
                                <input type="text" placeholder="Username" name="username">
                            </div>
                            <div class="ui divider hidden"></div>
                            <div class="ui input fluid">
                                <input type="password" placeholder="Password..." name="password">
                            </div>
                            <div class="ui divider hidden"></div>
                            <div class="ui input fluid">
                                <input type="password" placeholder="Confirm Password..." name="password_confirmation">
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
                                Register
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        
    </div>
</div>

@endsection
