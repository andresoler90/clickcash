@extends('layouts.master')

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="iq-card iq-card-block iq-card-stretch">
                        <div class="iq-card-body">
                            <h2 class="mb-0"><span>$</span><span
                                    class="counter">{{number_format(Auth::user()->balanceTotal())}}</span>
                                <input type="hidden" id="total_amount" value="{{number_format(Auth::user()->balanceTotal())}}">
                            </h2>
                            <p class="mb-3">{{__('Saldo actual')}}</p>
                            <div class="row align-items-center justify-content-between">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center mb-3 mb-md-0">
                                        <div class="rounded-circle iq-card-icon iq-bg-danger mr-3"><i
                                                class="ri-group-line"></i></div>
                                        <div class="text-left">
                                            <h4>{{count(Auth::user()->referreds())}}</h4>
                                            <p class="mb-0">{{__('Referidos')}}</p>
                                        </div>
                                    </div>
                                </div>
{{--                                <div class="col-md-6 ">--}}
{{--                                    <div class="d-flex align-items-center mb-3 mb-md-0">--}}
{{--                                        <div class="rounded-circle iq-card-icon iq-bg-warning mr-3"><i--}}
{{--                                                class="ri-task-line"></i></div>--}}
{{--                                        <div class="text-left">--}}
{{--                                            <h4>690</h4>--}}
{{--                                            <p class="mb-0">{{__('Tareas')}}</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                    {{Form::open(['route'=>'user.transfer','method'=>'POST'])}}
                    <div class="iq-card iq-card-block iq-card-stretch mt-1">
                        <div class="iq-card-body">
                            <p class="mb-3">{{__('Transferencia de fondos')}}</p>
                            <div class="row align-items-center justify-content-between">
                                <div class="form-group col-sm-12">
                                    <label for="name">{{__('Traslado a (Usuario)')}}</label>
                                    {{Form::text('name','',['class'=>'form-control'])}}
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="amount_transfer">{{__('Cantidad a transferir')}}</label>
                                    {{Form::number('amount_transfer','',['class'=>'form-control', 'id'=>'amount_transfer', 'step' => 'any'])}}
                                    <div class="invalid-feedback" id="validate" type="hide">El monto que digito supera su monto total</div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="comment">{{__('Nota Transacción')}}</label>
                                    {{Form::text('comment',isset($data->comment)?$data->comment:old('comment'),['class'=>'form-control'])}}
                                </div>
                                <div class="form-group col-sm-12">
                                    <button class="btn btn-primary" type="submit">{{__('Guardar')}}</button>
                                    <span class="float-right">Se cobarara un {{isset($feeValue)?$feeValue:''}}% por cada transacción</span>
                                    <input type="hidden" id="feeValue" value="{{isset($feeValue)?$feeValue:''}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{Form::close()}}
                </div>

                <div class="col-md-8">
                    @include('user.partials.filters')
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">{{__('Billetera electrónica')}}</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <table id="user-list-table" class="table table-borderless  table-striped" role="grid"
                                   aria-describedby="user-list-page-info">
                                <thead>
                                <tr>
                                    <th>{{__('Tipo')}}</th>
                                    <th>{{__('Fecha')}}</th>
                                    <th>{{__('Monto')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($balances))
                                    @php($i=1)
                                    @foreach($balances as $balance)
                                        <tr>
                                            <td>{{$balance->type}}</td>
                                            <td>{{$balance->created_at}}</td>
                                            <td>${{number_format($balance->amount)}}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8" class="text-center">{{__('Sin registros asociados')}}</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="row justify-content-between mt-3">
                                <div class="col-md-6">
                                    {{$balances->appends(['type'=> $type, 'date'=> $date])}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script type="text/javascript">
        $("#amount_transfer").blur(function () {
            var amount_transfer = $("#amount_transfer").val();
            var feeValue = $("#feeValue").val();
            var total_amount = parseFloat($("#total_amount").val());

            var fee = feeValue / 100;
            var totalFee = amount_transfer * fee;
            var discount = parseFloat(amount_transfer) + parseFloat(totalFee);

            if (discount > total_amount) {
               $("#validate").show();
            }else {
                $("#validate").hide();
            }
        });
    </script>
@endsection
