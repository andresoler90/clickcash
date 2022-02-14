@extends('layouts.master')
@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            @include('partials.errors_toast')
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="card-header"><strong>{{__('Usuario')}}</strong>
                            <small>{{__('Edición de  registro')}}</small>
                        </div>
                        <div class="card-body">
                            @include('cruds.users._form',['data'=>$user,'roles'=>$roles])
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="iq-card iq-card-block">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">{{__('Producto')}}</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">

                            @if($listProduct)
                                <div class="media">
                                    @if($listProduct->product->image)
                                        <img class="mr-3 rounded-circle img-fluid"
                                             src="{{asset('storage/products/'.$listProduct->product->image)}}"
                                             alt="Generic placeholder image" style="width: 50px; height: 50px">
                                    @else
                                        <img class="mr-3 rounded-circle" src="{{asset('img/img1.png')}}"
                                             alt="Generic placeholder image">
                                    @endif

                                    <div class="media-body">
                                        <h5 class="mt-0 mb-0">{{$listProduct->product->name}}</h5>
                                        <p>{{$listProduct->product->description}}</p>
                                    </div>
                                </div>
                                <table id="user-list-table" class="table table-striped table-bordered mt-2">
                                    <tr>
                                        <th>{{__('Comision por referidos')}}</th>
                                        <td>{{$listProduct->product->commission_referred}}</td>
                                    </tr>
                                    <tr>
                                        <th>{{__('Clicks')}}</th>
                                        <td>{{$listProduct->product->clicks}}</td>
                                    </tr>
                                    <tr>
                                        <th>{{__('Precio')}}</th>
                                        <td>{{$listProduct->product->price}}</td>
                                    </tr>
                                    <tr>
                                        <th>{{__('Fecha')}}</th>
                                        <td>{{$listProduct->created_at}}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            @else
                                {{Form::open(['route'=>['user.product.assign'],'method'=>'POST'])}}
                                @csrf
                                {{Form::hidden('users_id',isset($user->id)?$user->id:'')}}
                                <div class="row">
                                    <div class="col-md-9">
                                        {{Form::select('products_id',$products,isset($data->products_id)?$data->products_id:old('products_id'),["class"=>"custom-select",'placeholder'=>'Seleccione...'])}}
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-primary" type="submit">{{__('Agregar')}}</button>
                                    </div>
                                </div>
                                {{Form::close()}}
                            @endif
                        </div>
                    </div>
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">{{__('KYC')}}</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <table class="table table-striped table-borderless">
                                <tbody>
                                @if(count($typesKyc))
                                    @foreach($typesKyc as $type)
                                        @if($type->hasDocument())
                                            @php($document=$type->hasDocument())
                                            @if($document->status == 2)
                                                {{Form::open(['route'=>'kyc.store','enctype'=>'multipart/form-data'])}}
                                                <tr>
                                                    <td>{{$type->name}}</td>
                                                    <td>
                                                        <span class="badge badge-amber">{{__('Sin documento')}}</span>
                                                    </td>
                                                </tr>
                                                {{Form::close()}}
                                            @else
                                                <tr>
                                                    <td>{{$type->name}}</td>
                                                    <td>
                                                        <span class="badge badge-cyan">{{$document->status_name}}</span>
                                                    </td>
                                                </tr>
                                            @endif
                                        @else
                                            {{Form::open(['route'=>'kyc.store','enctype'=>'multipart/form-data'])}}
                                            <tr>
                                                <td>{{$type->name}}</td>
                                                <td>
                                                    <span class="badge badge-amber">{{__('Sin documento')}}</span>
                                                </td>
                                            </tr>
                                            {{Form::close()}}
                                        @endif
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="col-sm-7">
                    <div class="iq-card iq-card-block iq-card-stretch">
                        <div class="iq-card-body">
                            <h2 class="mb-0"><span>$</span><span class="counter">{{$user->balanceTotal()}}</span></h2>
                            <p class="mb-3">{{__('Saldo actual')}}</p>
                            {{Form::open(['route'=>'user.add.balance'])}}
                            @csrf
                            {{Form::hidden('users_id',$user->id)}}
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" name="amount" placeholder="{{__('Monto')}}">
                                <div class="input-group-append">
                                    <button class="btn btn-danger" type="submit">{{__('Añadir saldo')}}</button>
                                </div>
                            </div>
                            {{Form::close()}}
                            <hr>
                            <div class="row align-items-center justify-content-between">

                                <div class="col-md-6 col-lg-4">
                                    <div class="d-flex align-items-center mb-3 mb-lg-0">
                                        <div class="rounded-circle iq-card-icon iq-bg-info mr-3"><i
                                                class="ri-message-3-line"></i></div>
                                        <div class="text-left">
                                            <h4>110</h4>
                                            <p class="mb-0">{{__('Transferencias')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="d-flex align-items-center mb-3 mb-md-0">
                                        <div class="rounded-circle iq-card-icon iq-bg-danger mr-3"><i
                                                class="ri-group-line"></i></div>
                                        <div class="text-left">
                                            <h4>{{count($user->referreds())}}</h4>
                                            <p class="mb-0">{{__('Referidos')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="d-flex align-items-center mb-3 mb-md-0">
                                        <div class="rounded-circle iq-card-icon iq-bg-warning mr-3"><i
                                                class="ri-task-line"></i></div>
                                        <div class="text-left">
                                            <h4>690</h4>
                                            <p class="mb-0">{{__('Tareas')}}</p>
                                        </div>
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
