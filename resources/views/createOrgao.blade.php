@extends('templates.temp')
@section('content')
    <h1 class="text-center">@if (isset($orgao))Editar Orgão @else Cadastrar Orgão @endif</h1>
    <hr>
    @if(isset($errors) && count($errors)>0)
    <div class="text-center mt-4 mb-4 p-2 alert-danger">
        @foreach($errors->all() as $erro)
            {{$erro}}
        @endforeach
    </div>
    @endif
    <div class="col-6 m-auto">

        @if (isset($orgao))
            <form name="formEdit" id="formEdit" method="post" action="{{url("crud/$orgao->id")}}">
                @method('PUT')
        @else
            <form name="formCard" id="formCard" method="post" action="{{url('crud')}}">
        @endif
            @csrf
            Descrição: <input class="form-control mb-4" type="text" name="descricao" id="descricao" type="text" required value="{{$orgao->descricao ?? ''}}">
            Codigo: <input class="form-control mb-4" type="text" name="codigo" id="codigo" type="text" required value="{{$orgao->codigo ?? ''}}">
            <input type="submit" class="btn btn-primary" value="@if (isset($orgao))Editar @else Cadastrar @endif">
        </form>
    </div>
@endsection