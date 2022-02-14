@extends('layouts.master')

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            @include('partials.errors_toast')
            <div class="row">
                <div class="col-md-8">
                    <div class="iq-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img id="imgQR" src="{{$urlQR}}"/>
                                </div>
                                <div class="col-md-8">
                                    <h4 class="card-title">{{__('Autenticación de doble factor')}}</h4>
                                    <ol>
                                        <li>
                                            {{__('Instale la aplicación')}}
                                            <a href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=es&gl=US">
                                                Google Authenticator
                                            </a>
                                        </li>
                                        <li>{{__('Abra la aplicación y seleccione la opción escanear código qr.')}}</li>
                                        <li>{{__('Escanee el código qr que se muestra en esta página.')}}</li>
                                        <li>{{__('Presione Activar')}}</li>
                                    </ol>
                                    {{Form::open(['route'=>'user.active.a2fa'])}}
                                    @csrf

                                    @if(Auth::user()->token_login)
                                        {{Form::hidden('tokenLogin','')}}
                                        {{Form::submit(__('Desactivar'),['class'=>'btn btn-danger float-right'])}}
                                    @else
                                        {{Form::hidden('tokenLogin',$tokenLogin)}}
                                        {{Form::submit(__('Activar'),['class'=>'btn btn-primary float-right'])}}
                                    @endif
                                    {{Form::close()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
