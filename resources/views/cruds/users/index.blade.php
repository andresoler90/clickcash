@extends('layouts.master')

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">{{__('Listado de usuarios')}}</h4>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <ul class="nav nav-pills">

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('user.create')}}">{{__('Crear')}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid"
                                   aria-describedby="user-list-page-info">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Correo electrónico')}}</th>
                                    <th>{{__('Creado')}}</th>
                                    <th colspan="2">{{__('Opciones')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($users))
                                    @php($i=1)
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->created_at->diffForHumans()}}</td>
                                            <td>
                                                <a href="{{route('user.edit',$user->id)}}"
                                                   class="btn btn-sm btn-ghost-dark">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{route('user.destroy',$user->id)}}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                </form>
                                            </td>
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
                                    {{$users->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
