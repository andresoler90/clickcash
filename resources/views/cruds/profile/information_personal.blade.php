<div class="tab-pane fade active show" id="personal-information" role="tabpanel">
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">{{__('Información personal')}}</h4>
            </div>
        </div>
        <div class="iq-card-body">

            {!! Form::open(['route'=> ['profile.update',$user->id] ,'method'=>'PUT', 'files' => true]) !!}
            {!! Form::token() !!}

            <div class="form-group row align-items-center">
                <div class="col-md-12">
                    <div class="profile-img-edit">
                        <img class="profile-pic"
                             src="{{ asset(isset($user->contactInformation->url_image) ? $user->contactInformation->url_image : 'assets/images/user/11.png') }}"
                             alt="{{isset($user->contactInformation->name_image) ?$user->contactInformation->name_image : 'user-image'}}">
                        <div class="p-image">
                            <i class="ri-pencil-line upload-button"></i>
                            {!! Form::input('file','file_upload',null,["class" => "file-upload"]) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class=" row align-items-center">
                <div class="form-group col-sm-6">
                    {!! Form::label('username',__('Usuario:')) !!}
                    {!! Form::text('username',old('username',$user->username),["class"=>"form-control", "disabled"]) !!}
                </div>
                <div class="form-group col-sm-6">
                    {!! Form::label('email',__('Correo:')) !!}
                    {!! Form::text('email',old('email',$user->email),["class"=>"form-control", "disabled"]) !!}
                </div>
                <div class="form-group col-sm-6">
                    {!! Form::label('name',__('Nombre de pila:')) !!}
                    {!! Form::text('name',old('name',$user->name),["class"=>"form-control"]) !!}
                </div>
                <div class="form-group col-sm-6">
                    {!! Form::label('lastname',__('Apellido:')) !!}
                    {!! Form::text('lastname',old('lastname',$user->lastname),["class"=>"form-control"]) !!}
                </div>
                <div class="form-group col-sm-6">
                    {!! Form::label('birth_date',__('Fecha de nacimiento:')) !!}
                    {!! Form::date('birth_date',old('birth_date',isset($user->contactInformation->birth_date) ? $user->contactInformation->birth_date : null),["class"=>"form-control"]) !!}
                </div>
                <div class="form-group col-sm-6">
                    @php
                        $genderMale = false;
                        $genderFemale = false;
                        if ($user->contactInformation)
                        {

                            if (isset($user->contactInformation->gender) && $user->contactInformation->gender == 0)
                                $genderMale = true;
                            elseif (isset($user->contactInformation->gender) && $user->contactInformation->gender == 1)
                                $genderFemale = true;
                        }
                    @endphp
                    {!! Form::label('gender',__('Genero:'),["class"=>"d-block"]) !!}

                    {!! Form::radio('gender',0,$genderMale) !!}
                    {!! Form::label('gender',__('Masculino'),["class"=>"custom-control custom-radio custom-control-inline"]) !!}

                    {!! Form::radio('gender',1,$genderFemale) !!}
                    {!! Form::label('gender',__('Femenino'),["class"=>"custom-control custom-radio custom-control-inline"]) !!}

                </div>
            </div>
            {!! Form::submit(__('Guardar'),["class" => "btn btn-primary mr-2"]) !!}
            <a class="btn iq-bg-danger" href="{{url('/')}}">{{__('Cancelar')}}</a>
            {!! Form::close() !!}
        </div>
    </div>
</div>
