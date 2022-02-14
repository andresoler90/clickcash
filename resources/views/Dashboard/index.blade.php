@extends('layouts.master')

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="iq-card">
                        <div class="iq-card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="card-title"><b>URL publica de referidos</b></span>
                                </div>
                                <div class="col-md-8">{{url('/').'/reply/'.Auth::id()}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @if($membership)
                    <div class="col-md-12">
                        <div class="iq-card">
                            <div class="iq-card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span
                                            class="card-title"><b>Membresia {{$membership->membership->name}}</b></span>
                                    </div>
                                    {{Form::open(['route'=>['create.payment', $membership], 'method'=>'POST'])}}
                                    <div class="col-md-4">
                                        <button class="btn btn-outline-primary" type="submit">{{__('CoinPayment')}}</button>
                                    </div>
                                    {{Form::close()}}
                                    {{Form::open(['route'=>['wallet.payment', $membership], 'method'=>'POST'])}}
                                    <div class="col-md-4">
                                        <button class="btn btn-outline-primary" type="submit">{{__('Wallet')}}</button>
                                    </div>
                                    {{Form::close()}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="row row-eq-height">

                <div class="col-lg-2 col-md-6">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height wow zoomIn">
                        <div class="iq-card-body">
                            <div class="row center-text">
                                <div class="col-lg-12 mb-2 d-flex justify-content-between">
                                    <div class="icon iq-icon-box rounded-circle iq-bg-dark rounded-circle center-icon">
                                        <img src={{asset("assets/images/suitcase-line.png")}} alt="">
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <h6 class="card-title text-uppercase text-secondary mb-0">Membresía Activa</h6>
                                    <span class="h2 text-dark mb-0">Basic</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height wow zoomIn">
                        <div class="iq-card-body">
                            <div class="row center-text">
                                <div class="col-lg-12 mb-2 d-flex justify-content-between">
                                    <div class="icon iq-icon-box rounded-circle iq-bg-success rounded-circle center-icon">
                                        <i class="ri-wallet-3-fill"></i>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <h6 class="card-title text-uppercase text-secondary mb-0">Saldo Billetera</h6>
                                    <span class="h2 text-dark mb-0 counter">{{Auth::user()->balanceTotal()}}</span><span class="h2 text-dark">$ </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height wow zoomIn">
                        <div class="iq-card-body">
                            <div class="row center-text">
                                <div class="col-lg-12 mb-2 d-flex justify-content-between">
                                    <div class="icon iq-icon-box rounded-circle iq-bg-warning rounded-circle center-icon">
                                        <img src="{{asset("assets/images/team-line.png")}}" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <h6 class="card-title text-uppercase text-secondary mb-0">Miembros Totales</h6>
                                    <span class="h2 text-dark mb-0 counter">39</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height wow zoomIn">
                        <div class="iq-card-body">
                            <div class="row center-text">
                                <div class="col-lg-12 mb-2 d-flex justify-content-between">
                                    <div class="icon iq-icon-box rounded-circle iq-bg-primary rounded-circle center-icon">
                                        <i class="ri-user-follow-line"></i>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <h6 class="card-title text-uppercase text-secondary mb-0">Activos en la Red</h6>
                                    <span class="h2 text-dark mb-0 counter">110</span>
                                </div>
                            </div>
                       </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height wow zoomIn">
                        <div class="iq-card-body">
                            <div class="row center-text">
                                <div class="col-lg-12 mb-2 d-flex justify-content-between">
                                    <div class="icon iq-icon-box rounded-circle iq-bg-danger rounded-circle center-icon">
                                        <i class="ri-money-dollar-circle-line"></i>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <h6 class="card-title text-uppercase text-secondary mb-0">Total Retirado</h6>
                                    <span class="h2 text-dark mb-0 counter">140</span><span class="h2 text-dark">$ </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height wow zoomIn">
                        <div class="iq-card-body">
                            <div class="col-lg-12 mb-2 d-flex justify-content-between">
                                <div class="icon iq-icon-box rounded-circle iq-bg-warning rounded-circle center-icon">
                                    <i class="ri-currency-fill"></i>
                                </div>
                            </div>
                            <div class="row center-text">
                                <div class="col-lg-12 mt-3">
                                    <h6 class="card-title text-uppercase text-secondary mb-0">Total Bonos</h6>
                                    <span class="h2 text-dark mb-0 counter">429</span><span class="h2 text-dark">$ </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-eq-height">
                    <div class="col-lg-6 col-md-12">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height wow zoomIn" data-wow-delay="0.8s">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Mapa de Referidos</h4>
                                </div>
                                <div class="iq-card-header-toolbar d-flex align-items-center">
{{--                                    <ul class="nav nav-pills">--}}
{{--                                        <li class="nav-item">--}}
{{--                                            <a href="#" class="nav-link active">Día</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="nav-item">--}}
{{--                                            <a href="#" class="nav-link">Semana</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="nav-item">--}}
{{--                                            <a href="#" class="nav-link">Mes</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
                                </div>
                            </div>
                            <div class="iq-card-body p-0">
                                <!--                           <div id="chart-10"></div>-->
                                <div id="chartdiv" style="height: 500px;width: 100%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Ultimos Ingresos</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <table class="table mb-0 table-borderless">
                                    <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Usuario</th>
                                        <th scope="col">Membresía</th>
                                        <th scope="col">Fecha Registro</th>
                                        <th scope="col">Pago</th>
                                        <th scope="col">Estatus</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-center">
                                            <img class="rounded-circle img-fluid avatar-40" src="{{asset("assets/images/user/01.jpg")}}" alt="profile">
                                        </td>
                                        <td>Anna Sthesia</td>
                                        <td>Basic</td>
                                        <td>15 min</td>
                                        <td>$300</td>
                                        <td><div class="badge badge-pill badge-success">Activa</div></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <img class="rounded-circle img-fluid avatar-40" src="{{asset("assets/images/user/02.jpg")}}" alt="profile">
                                        </td>
                                        <td>Brock Lee</td>
                                        <td>Standar</td>
                                        <td>45 min</td>
                                        <td>$1200</td>
                                        <td><div class="badge badge-pill badge-danger">Pendiente</div></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <img class="rounded-circle img-fluid avatar-40" src="{{asset("assets/images/user/03.jpg")}}" alt="profile">
                                        </td>
                                        <td>Dan Druff</td>
                                        <td>Basic</td>
                                        <td>1 hora</td>
                                        <td>$600</td>
                                        <td><div class="badge badge-pill badge-danger">Pendiente</div></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <img class="rounded-circle img-fluid avatar-40" src="{{asset("assets/images/user/04.jpg")}}" alt="profile">
                                        </td>
                                        <td>Lynn Guini</td>
                                        <td>Plus</td>
                                        <td>4 horas</td>
                                        <td>$200</td>
                                        <td><div class="badge badge-pill badge-danger">Pendiente</div></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <img class="rounded-circle img-fluid avatar-40" src="{{asset("assets/images/user/05.jpg")}}" alt="profile">
                                        </td>
                                        <td>Eric Shun</td>
                                        <td>Basic</td>
                                        <td>2 días</td>
                                        <td>$300</td>
                                        <td><div class="badge badge-pill badge-success">Activa</div></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <img class="rounded-circle img-fluid avatar-40" src="{{asset("assets/images/user/06.jpg")}}" alt="profile">
                                        </td>
                                        <td>Eric Shun</td>
                                        <td>Plus</td>
                                        <td>1 semana</td>
                                        <td>$300</td>
                                        <td><div class="badge badge-pill badge-success">Activa</div></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <img class="rounded-circle img-fluid avatar-40" src="{{asset("assets/images/user/05.jpg")}}" alt="profile">
                                        </td>
                                        <td>Eric Shun</td>
                                        <td>Basic</td>
                                        <td>1 semana</td>
                                        <td>$300</td>
                                        <td><div class="badge badge-pill badge-success">Activa</div></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="iq-card dash-hover-gradient iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-body">
                                <h3>Rango Actual</h3>

                            </div>
                            <div class="col-lg-12 center-text">
                                <img src={{asset("assets/images/rango1.png")}} alt="Rango" style="max-width: 100px">
                            </div>
                            <div class="card-action font-size-14 p-3">
                                <span class="float-right">Member</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="iq-card dash-hover-gradient iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-body">
                                <h3>Próximo Rango</h3>

                            </div>
                            <div class="col-lg-12 center-text">
                                <img src={{asset("assets/images/rango1.png")}} alt="Rango" style="max-width: 100px">
                            </div>
                            <div class="card-action font-size-14 p-3">
                                <span class="float-right">Silver</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="iq-card dash-hover-gradient iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-header d-flex justify-content-between border-0">
                                <div class="mb-0 font-size-32 text-dark"><i class="ri-timer-line font-weight-light"></i></div>
                                <div class="iq-card-header-toolbar d-flex align-items-center">
                                    <div class="dropdown">
                                    <span class="dropdown-toggle" id="d-29" data-toggle="dropdown">
                                    <i class="ri-more-2-fill "></i>
                                    </span>
                                        <div class="dropdown-menu dropdown-menu-right shadow-none" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                            <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                            <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                            <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                            <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <h3>Ticket soporte</h3>
                                <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                            <div class="card-action font-size-14 p-3">
                                <span class="float-right">1 día</span>
                                <i class="ri-timer-2-line"></i> 2:30pm
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="iq-card dash-hover-blank d-flex align-items-center iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-body text-center">
                                <h5 class="">¿Quiéres hacer upgrade?</h5>
                                <h2>haz clic aquí</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="iq-card">
                            <div class="iq-card">
                                <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">Rendimiento del Equipo</h4>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <ul class="nav nav-tabs" id="myTab-three" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab-three" data-toggle="tab" href="#mejores-three" role="tab" aria-controls="home" aria-selected="true">Los Mejores Ganadores</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab-three" data-toggle="tab" href="#reclutadores-three" role="tab" aria-controls="profile" aria-selected="false">Reclutadores Principales</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab-three" data-toggle="tab" href="#paquetes-three" role="tab" aria-controls="contact" aria-selected="false">Resumen de Paquetes</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content" id="myTabContent-4">
                                        <div class="tab-pane fade show active" id="mejores-three" role="tabpanel" aria-labelledby="home-tab-three">
                                            <table class="table">
                                                <caption>Lista de mejores ganadores</caption>
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Rango</th>
                                                    <th scope="col">Monto</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>@mdo</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Jacob</td>
                                                    <td>Thornton</td>
                                                    <td>@fat</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Larry</td>
                                                    <td>the Bird</td>
                                                    <td>@twitter</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="reclutadores-three" role="tabpanel" aria-labelledby="profile-tab-three">
                                            <table class="table">
                                                <caption>Lista de Reclutadores Principales</caption>
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Rango</th>
                                                    <th scope="col">Cantidad</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>@mdo</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Jacob</td>
                                                    <td>Thornton</td>
                                                    <td>@fat</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Larry</td>
                                                    <td>the Bird</td>
                                                    <td>@twitter</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="paquetes-three" role="tabpanel" aria-labelledby="contact-tab-three">
                                            <table class="table">
                                                <caption>Lista de Compras de Paquetes</caption>
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Paquete</th>
                                                    <th scope="col">Precio</th>
                                                    <th scope="col">Cantidad</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Standar</td>
                                                    <td>300$</td>
                                                    <td>3</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Basic</td>
                                                    <td>25$</td>
                                                    <td>15</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Plus</td>
                                                    <td>1000$</td>
                                                    <td>1</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">4</th>
                                                    <td>Plus</td>
                                                    <td>1000$</td>
                                                    <td>1</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                </div>
         </div>
    </div>
</div>

@endsection
