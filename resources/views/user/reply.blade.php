@include('partials._body_style')
<div class="container-fluid" style="background-color: white">
    <div class="row">

        <div class="col-sm-6 align-self-center">

            <div class="sign-in-from">

                <h1 class="mb-0  pt-3">{{$user->full_name}}</h1>
                @include('partials.errors_toast')
                <form method="POST" action="{{ route('register') }}">
                    {{Form::hidden('sponsor',$user->username)}}
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
                            <label for="products_id">{{__('Producto')}}</label>
                            {{Form::select('products_id',\App\Models\Product::all()->pluck('name','id'),null,['class'=>'custom-select','id'=>'products_id','placeholder'=>'Seleccione...'])}}
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="username">{{__('Usuario')}}</label>
                            <input id="username" type="text"
                                   class="form-control mb-0 @error('username') is-invalid @enderror" name="username"
                                   value="{{ old('username') }}" required autocomplete="name" autofocus>
                            @error('name')
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
                    <div class="sign-info">
                            <span class="dark-color d-inline-block line-height-2">{{__('Posee cuenta')}} ? <a
                                    href="{{route('login')}}">{{__('Ingrese aquí')}}</a></span>
                        <ul class="iq-social-media">
                            <li><a href="#"><i class="ri-facebook-box-line"></i></a></li>
                            <li><a href="#"><i class="ri-twitter-line"></i></a></li>
                            <li><a href="#"><i class="ri-instagram-line"></i></a></li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-6 text-center">
            <div class="sign-in-detail text-white"
                 style="background: url(assets/images/login/2.jpg) no-repeat 0 0; background-size: cover;">
                <a class="sign-in-logo mb-5" href="#"><img
                        src={{asset("assets/images/logo-white.png")}} class="img-fluid" alt="logo"></a>
                <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true"
                     data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1"
                     data-items-mobile-sm="1" data-margin="0">
                    <div class="item">
                        <img class="profile-pic"
                             src="{{ asset(isset($user->contactInformation->url_image) ? $user->contactInformation->url_image : 'assets/images/user/11.png') }}"
                             alt="{{isset($user->contactInformation->url_image) ?$user->contactInformation->url_image : 'user-image'}}">
                        <h4 class="mb-1 text-white">Manage your orders</h4>
                        <p>It is a long established fact that a reader will be distracted by the readable
                            content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials._body_footer')

