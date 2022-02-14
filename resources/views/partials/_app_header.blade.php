<!-- TOP Nav Bar -->
<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
        <div class="iq-sidebar-logo">
            <div class="top-logo">
                <a href="{{ route('dashboard-1') }}" class="logo">
                    <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid" alt="">
                    <span>{{config('APP_NAME')}}</span>
                </a>
            </div>
        </div>
        <div class="navbar-breadcrumb">
            <h5 class="mb-0 texto-naranja">Dashboard</h5>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Home</li>
                </ul>
            </nav>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="ri-menu-3-line"></i>
            </button>
            <div class="iq-menu-bt align-self-center">
                <div class="wrapper-menu">
                    <div class="line-menu half start"></div>
                    <div class="line-menu"></div>
                    <div class="line-menu half end"></div>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-list">
                    @if(App::getLocale()=='es')
                        <li class="nav-item">
                            <a href="{{route('locale',"en")}}" class="iq-waves-effect">EN</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{route('locale',"es")}}" class="iq-waves-effect">ES</a>
                        </li>
                    @endif

             <!--       <li class="nav-item">
                        <a class="search-toggle iq-waves-effect" href="#"><i class="ri-search-line"></i></a>
                        <form action="#" class="search-box">
                            <input type="text" class="text search-input" placeholder="Type here to search..."/>
                        </form>
                    </li> -->
                   <!-- <li class="nav-item dropdown">
                        <a href="#" class="search-toggle iq-waves-effect"><i class="ri-mail-line"></i></a>
                        <div class="iq-sub-dropdown">
                            <div class="iq-card shadow-none m-0">
                                <div class="iq-card-body p-0 ">
                                    <div class="bg-primary p-3">
                                        <h5 class="mb-0 text-white">All Messages<small
                                                class="badge  badge-light float-right pt-1">5</small></h5>
                                    </div>
                                    <a href="#" class="iq-sub-card">
                                        <div class="media align-items-center">
                                            <div class="">
                                                <img class="avatar-40 rounded"
                                                     src="{{ asset('assets/images/user/01.jpg') }}" alt="">
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Nik Emma Watson</h6>
                                                <small class="float-left font-size-12">13 Jun</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="iq-sub-card">
                                        <div class="media align-items-center">
                                            <div class="">
                                                <img class="avatar-40 rounded"
                                                     src="{{ asset('assets/images/user/02.jpg') }}" alt="">
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Lorem Ipsum Watson</h6>
                                                <small class="float-left font-size-12">20 Apr</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="iq-sub-card">
                                        <div class="media align-items-center">
                                            <div class="">
                                                <img class="avatar-40 rounded"
                                                     src="{{ asset('assets/images/user/03.jpg') }}" alt="">
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Why do we use it?</h6>
                                                <small class="float-left font-size-12">30 Jun</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="iq-sub-card">
                                        <div class="media align-items-center">
                                            <div class="">
                                                <img class="avatar-40 rounded"
                                                     src="{{ asset('assets/images/user/04.jpg') }}" alt="">
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Variations Passages</h6>
                                                <small class="float-left font-size-12">12 Sep</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="iq-sub-card">
                                        <div class="media align-items-center">
                                            <div class="">
                                                <img class="avatar-40 rounded"
                                                     src="{{ asset('assets/images/user/05.jpg') }}" alt="">
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Lorem Ipsum generators</h6>
                                                <small class="float-left font-size-12">5 Dec</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li> -->
        <!--        <li class="nav-item">
                        <a href="#" class="iq-waves-effect"><i class="ri-shopping-cart-2-line"></i></a>
                    </li>-->
             <!--       <li class="nav-item">
                        <a href="#" class="search-toggle iq-waves-effect"><i class="ri-notification-2-line"></i></a>
                        <div class="iq-sub-dropdown">
                            <div class="iq-card shadow-none m-0">
                                <div class="iq-card-body p-0 ">
                                    <div class="bg-danger p-3">
                                        <h5 class="mb-0 text-white">All Notifications<small
                                                class="badge  badge-light float-right pt-1">4</small></h5>
                                    </div>
                                    <a href="#" class="iq-sub-card">
                                        <div class="media align-items-center">
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">New Order Recieved</h6>
                                                <small class="float-right font-size-12">23 hrs ago</small>
                                                <p class="mb-0">Lorem is simply</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="iq-sub-card">
                                        <div class="media align-items-center">
                                            <div class="">
                                                <img class="avatar-40 rounded"
                                                     src="{{ asset('assets/images/user/01.jpg') }}" alt="">
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Emma Watson Nik</h6>
                                                <small class="float-right font-size-12">Just Now</small>
                                                <p class="mb-0">95 MB</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="iq-sub-card">
                                        <div class="media align-items-center">
                                            <div class="">
                                                <img class="avatar-40 rounded"
                                                     src="{{ asset('assets/images/user/02.jpg') }}" alt="">
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">New customer is join</h6>
                                                <small class="float-right font-size-12">5 days ago</small>
                                                <p class="mb-0">Jond Nik</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="iq-sub-card">
                                        <div class="media align-items-center">
                                            <div class="">
                                                <img class="avatar-40" src="{{ asset('assets/images/small/jpg.svg') }}"
                                                     alt="">
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Updates Available</h6>
                                                <small class="float-right font-size-12">Just Now</small>
                                                <p class="mb-0">120 MB</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>-->
                    <li class="nav-item iq-full-screen"><a href="#" class="iq-waves-effect" id="btnFullscreen"><i
                                class="ri-fullscreen-line"></i></a></li>
                </ul>
            </div>
            <ul class="navbar-list">
                <li>
                    <a href="#" class="search-toggle iq-waves-effect text-white color-naranja"><img
                            src="{{ asset(isset(Auth::user()->contactInformation->url_image) ? Auth::user()->contactInformation->url_image : 'assets/images/user/11.png') }}"
                            class="img-fluid rounded" alt="user-image"></a>
                    <div class="iq-sub-dropdown iq-user-dropdown">
                        <div class="iq-card shadow-none m-0">
                            <div class="iq-card-body p-0 ">
                                <div class="bg-primary p-3">
                                    <h5 class="mb-0 text-white line-height">{{__('Hola')}} {{Auth::user()->full_name}}</h5>
                                    <span class="text-white font-size-12">{{__('Disponible')}}</span>
                                </div>
                                <a href="{{ route('profile.edit','user') }}"
                                   class="iq-sub-card iq-bg-primary-success-hover">
                                    <div class="media align-items-center">
                                        <div class="rounded iq-card-icon iq-bg-success">
                                            <i class="ri-profile-line"></i>
                                        </div>
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0 ">{{__('Editar perfil')}}</h6>
                                            <p class="mb-0 font-size-12">{{__('Modifica algún detalle en tu perfil')}}</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="{{ route('user.settings') }}" class="iq-sub-card iq-bg-primary-danger-hover">
                                    <div class="media align-items-center">
                                        <div class="rounded iq-card-icon iq-bg-danger">
                                            <i class="ri-account-box-line"></i>
                                        </div>
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0 ">{{__('Configuraciones')}}</h6>
                                            <p class="mb-0 font-size-12">{{__('Administra las configuraciones de tu cuenta')}}</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="{{ route('privacy_settings') }}"
                                   class="iq-sub-card iq-bg-primary-secondary-hover">
                                    <div class="media align-items-center">
                                        <div class="rounded iq-card-icon iq-bg-secondary">
                                            <i class="ri-lock-line"></i>
                                        </div>
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0 ">Privacy Settings</h6>
                                            <p class="mb-0 font-size-12">Control your privacy parameters.</p>
                                        </div>
                                    </div>
                                </a>
                                <div class="d-inline-block w-100 text-center p-3">
                                    <a class="iq-bg-danger iq-sign-btn" role="button" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                        <i class="ri-login-box-line ml-2"></i>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- TOP Nav Bar END -->
