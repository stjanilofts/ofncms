@extends('frontend.layout')

@section('content')


    <div class="container container--shadow">
        <div class="Page">
            <div class="Page__content">
                <form method="POST" action="{{ url('/auth/login') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-row fullwidth">
                        <input class="" type="email" name="email" placeholder="Netfang">
                        @if($errors->first('email'))
                            <small class="error">Netfang vantar eða ekki rétt stimplað inn.</small>
                        @endif
                    </div>

                    <div class="form-row fullwidth">
                        <input class="" type="password" name="password" placeholder="Lykilorð">
                        @if($errors->first('password'))
                            <small class="error">Lykilorð vantar eða ekki rétt.</small>
                        @endif
                    </div>

                    <div class="form-row fullwidth">
                        <button class="takki" href="#">Innskrá</button>
                    </div>
                    
                    {{-- <div class="form-row fullwidth">
                        <label class="">Muna eftir mér</label>
                        <input type="checkbox" name="remember">
                        <!--// <a class="uk-float-right uk-link uk-link-muted" href="#">Forgot Password?</a> -->
                    </div> --}}
                </form>
            </div>
        </div>
    </div>

@stop