{!! Form::open(['route'=> ['user.save.payment'] ,'method'=>'POST', 'files' => true]) !!}
{!! Form::token() !!}
@php($maxAmount = number_format(Auth::user()->balanceTotal(),2))
<div class="row align-items-center">
    <div class="form-group col-sm-12">
        {!! Form::label('amount_remove',__('Cantidad a retirar:')) !!}
        {!! Form::number('amount_remove',null,["class"=>"form-control","required","min" => 1, "max" => $maxAmount ,"step"=>".01"]) !!}
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('type',__('BITCOIN / ETHER:')) !!}
        {!! Form::select('type',config("options.typePayment"),null,["class"=>"form-control", "required", 'placeholder' => __('Seleccione')]) !!}
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('address_wallet',__('Direccion billetera:')) !!}
        {!! Form::text('address_wallet',null,['class'=>'form-control', "required"]) !!}
    </div>
    @if(Auth::user()->LegacyBalanceTotal())
        <div class="form-group col-sm-12">
            {!! Form::label('wallet_source',__('Wallet:')) !!}
            {!! Form::select('wallet_source',["actual"=>"Actual","legacy"=>"Legacy"],null,["class"=>"form-control", "required", 'placeholder' => __('Seleccione')]) !!}
        </div>
    @endif
</div>
<div class="row">
    <div class="col-md-12 text-center">
        @if(date("N")==(int)env('PAYMENT_DAY'))
            @if(Auth::user()->token_login)
                {!! Form::submit(__('Guardar'),["class" => "btn btn-primary mr-2"]) !!}
            @else
                <div class="alert alert-secondary" role="alert">
                    {{__("Debe activar la autenticación de doble factor en la configuración de su perfil para poder usar esta opción.")}}
                    &nbsp;
                </div>
            @endif
        @else
            <div class="alert alert-secondary" role="alert">
                {{__("Solicitud de retiro disponible solo el dia")}} &nbsp;
                <b>{{__(config('options.weekly_days_payment.'.(int)env('PAYMENT_DAY')))}}</b>
            </div>
        @endif
    </div>

</div>
{!! Form::close() !!}
