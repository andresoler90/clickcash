<!-- Sidebar  -->
<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="{{ route('dashboard-1') }}">
            <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid" alt="">
             <a class="sign-in-logo" href="#"><img
                            src={{asset("assets/images/letras-gris-logo.png")}} class="img-fluid" alt="logo" style="    height: auto; padding: 17px 10px;"></a>
        </a>
       <!--  <div class="iq-menu-bt align-self-center">
            <div class="wrapper-menu">
                <div class="line-menu half start"></div>
                <div class="line-menu"></div>
                <div class="line-menu half end"></div>
            </div>
        </div> -->
    </div>

    @php
        $MyNavBar = \Menu::make('MenuList', function ($menu) {

            $menu->raw('Menu Usuario', ['class' => 'iq-menu-title'])->prepend('<i class="ri-separator"></i>');

            $menu->add('<span>'.__('Inicio').'</span>', ['route' => 'dashboard-1'] )
                    ->active('dashboard-1/*')
                    ->prepend('<i class="ri-home-4-line"></i>')
                    ->link->attr(["class" => "nav-link iq-waves-effect"]);

            if (Auth::user()->role->id == 1){
            $menu->add('<span>'.__('Administración').'</span>', ['class' => ''])
                ->prepend('<i class="ri-user-settings-line"></i>')
                ->nickname('admin')
                ->link->attr(["class" => "nav-link iq-waves-effect"])
                ->href('#email');
            $menu->admin
                ->add('<span>'.__('Usuarios').'</span>', ['route' => 'user.index'])
                ->active('crud/user/*')
                ->link->attr(['class' => '']);
            $menu->admin
                ->add('<span>'.__('KYC').'</span>', ['route' => 'kyc.index'])
                ->active('crud/kyc/*')
                ->link->attr(['class' => '']);
            $menu->admin
                ->add('<span>'.__('Tareas').'</span>', ['route' => 'task.index'])
                ->active('crud/task/*')
                ->link->attr(['class' => '']);
            $menu->admin
                ->add('<span>'.__('Roles').'</span>', ['route' => 'roles.index'])
                ->active('crud/roles/*')
                ->link->attr(['class' => '']);
            $menu->admin
                ->add('<span>'.__('Pagos').'</span>', ['route' => 'payment.index'])
                ->active('crud/payment/*')
                ->link->attr(['class' => '']);
            }
            $menu->add('<span>'.__('Red').'</span>', ['route' => 'user.multilevel'] )
                    ->prepend('<i class="fa fa-users"></i>')
                    ->active('red/*')
                    ->link->attr(["class" => "nav-link iq-waves-effect"]);
            $menu->add('<span>'.__('Registro de usuario').'</span>', ['route' => 'user.add.reference'] )
                    ->prepend('<i class="ri-user-add-line"></i>')
                    ->active('multinivel/*')
                    ->link->attr(["class" => "nav-link iq-waves-effect"]);
            $menu->add('<span>'.__('Billetera electrónica').'</span>', ['route' => 'user.wallet'] )
                    ->active('wallet/*')
                    ->prepend('<i class="ri-wallet-3-line"></i>')
                    ->link->attr(["class" => "nav-link iq-waves-effect"]);
            $menu->add('<span>'.__('Pagos').'</span>', ['route' => 'user.payment'] )
                    ->prepend('<i class="fa fa-money"></i>')
                    ->active('payments/*')
                    ->link->attr(["class" => "nav-link iq-waves-effect"]);
            $menu->add('<span>'.__('Gestión de perfil').'</span>', ['class' => ''])
                ->prepend('<i class="fa fa-id-card-o"></i>')
                ->nickname('profile')
                ->link->attr(["class" => "nav-link iq-waves-effect"])
                ->href('#perfil');
            $menu->profile
                    ->add('<span>'.__('Vista del perfil').'</span>', ['route' => ['profile.edit', 'user']] )
                    ->active('profiles/*')
                    ->link->attr(["class" => "nav-link iq-waves-effect"]);
            $menu->profile
                    ->add('<span>'.__('Detalle de KYC').'</span>', ['route' => 'user.kyc'] )
                    ->active('kyc/*')
                    ->link->attr(["class" => "nav-link iq-waves-effect"]);
            $menu->add('<span>'.__('Cerrar sesión').'</span>', ['route' => 'logout'] )
                    ->prepend('<i class="ri-login-box-line"></i>')
                    ->active('logout/*')
                    ->link->attr(["class" => "nav-link iq-waves-effect",'onclick' => "event.preventDefault(); document.getElementById('logout-form').submit()"]);
        })->filter(function ($item) {
            return $item;
        });
    @endphp

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                @include(config('laravel-menu.views.bootstrap-items'), ['items' => $MyNavBar->roots()])
            </ul>
        </nav>
        <div class="p-3"></div>
    </div>
</div>
