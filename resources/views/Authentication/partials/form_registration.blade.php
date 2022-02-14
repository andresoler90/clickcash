@include('partials.errors_toast')
@php($route = Auth::user() ? 'user.create.reference' : 'register')

<form method="POST" action="{{ route($route) }}">
    @csrf
    <div class="row">
        <div class="form-group col-12">
            <label for="name">{{__('Nombre')}}</label>
            <input id="name" type="text"
                   class="form-control mb-0 @error('name') is-invalid @enderror" name="name"
                   value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="form-group col-12">
            <label for="lastname">{{__('Apellido')}}</label>
            <input id="lastname" type="text"
                   class="form-control mb-0 @error('lastname') is-invalid @enderror" name="lastname"
                   value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="form-group col-12">
            <label for="email">{{__('Correo electrónico')}}</label>
            <input id="email" type="email"
                   class="form-control mb-0 @error('email') is-invalid @enderror" name="email"
                   value="{{ old('email') }}" required autocomplete="email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="form-group col-12">
            <label for="countries_id">{{__('País')}}</label>
            {{Form::select('countries_id',\App\Models\Country::all()->pluck('name','id'),null,['class'=>'custom-select','id'=>'countries_id','placeholder'=>'Seleccione...'])}}

            @error('countries_id')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group col-12">
            <label for="products_id">{{__('Membresia')}}</label>
            {{Form::select('memberships_id',\App\Models\Membership::all()->pluck('name','id'),null,['class'=>'custom-select','id'=>'memberships_id','placeholder'=>'Seleccione...'])}}
            @error('memberships_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <hr>
    @if(Auth::user())
        {{Form::hidden('sponsor',Auth::user()->username)}}
    @else
        <div class="row">
            <div class="form-group col-12">
                <label for="sponsor_id">{{__('Referido por')}}</label>
                <input id="sponsor" type="text"
                       class="form-control mb-0 @error('sponsor') is-invalid @enderror" name="sponsor"
                       value="{{ isset(Auth::user()->name) ? Auth::user()->name :  old('sponsor') }}" required
                       autocomplete="sponsor" autofocus>
                @error('sponsor')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <hr>
    @endif
    <div class="row">
        <div class="form-group col-12">
            <label for="username">{{__('Usuario')}}</label>
            <input id="username" type="text"
                   class="form-control mb-0 @error('username') is-invalid @enderror" name="username"
                   value="{{ old('username') }}" required autocomplete="name" autofocus>
            @error('username')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="form-group col-6">
            <label for="password">{{__('Clave')}}</label>
            <input id="password" type="password"
                   class="form-control mb-0 @error('password') is-invalid @enderror" name="password"
                   required autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group col-6">
            <label for="password-confirm">{{ __('Confirmar clave') }}</label>
            <input id="password-confirm" type="password" class="form-control"
                   name="password_confirmation" required autocomplete="new-password">
        </div>
    </div>
    <div class="d-inline-block w-100">
        <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
            <input type="checkbox" class="custom-control-input" id="customCheck1">
            <label class="custom-control-label" for="customCheck1"{{__("Aceptar")}} <a
                href="#">{{__('Términos y condiciones')}}</a></label>
        </div>
        <button type="submit" class="btn btn-primary float-right">{{__('Continuar')}}</button>
    </div>
    @if(!Auth::user())
        <div class="sign-info">
                            <span class="dark-color d-inline-block line-height-2">{{__('Posee cuenta')}} ? <a
                                    href="{{route('login')}}">{{__('Ingrese aquí')}}</a></span>
            <ul class="iq-social-media">
                <li><a href="#"><i class="ri-facebook-box-line"></i></a></li>
                <li><a href="#"><i class="ri-twitter-line"></i></a></li>
                <li><a href="#"><i class="ri-instagram-line"></i></a></li>
            </ul>
        </div>
    @endif
</form>
