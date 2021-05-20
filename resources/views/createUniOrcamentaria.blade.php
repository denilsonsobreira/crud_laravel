@extends('templates.temp')
@section('content')
    <h1 class="text-center"> @if (isset($uniOrcamentaria))Editar Unidade Orçamentária @else Cadastrar Unidade Orçamentária @endif </h1>
    <hr>
    @if(isset($errors) && count($errors)>0)
    <div class="text-center mt-4 mb-4 p-2 alert-danger">
        @foreach($errors->all() as $erro)
            {{$erro}}
        @endforeach
    </div>
    @endif
    <div class="col-6 m-auto">

        @if (isset($uniOrcamentaria))
            <form name="formEdit" id="formEdit" method="post" action="{{url("cad/$uniOrcamentaria->id")}}">
                @method('PUT')
        @else
            <form name="formCard" id="formCard" method="post" action="{{url('cad')}}">
        @endif
            @csrf
            Descrição: <input class="form-control mb-4" type="text" name="descricao" id="descricao" type="text" required value="{{$uniOrcamentaria->descricao ?? ''}}">
            Orgão ID: <select class="form-control mb-4" name="orgao_id" id="orgao_id" required>
                <option value="{{$uniOrcamentaria->orgao_id ?? ''}}">{{$uniOrcamentaria->orgao_id ?? 'Orgão Id'}}</option>
                @if (isset($uniOrcamentaria))
                    @foreach ($orgao as $orgaos)
                    @if ($orgaos->id == $uniOrcamentaria->orgao_id)
                    @else
                        <option value="{{$orgaos->id}}">{{$orgaos->id}}</option>
                    @endif  
                    @endforeach
                @else
                    @foreach ($orgao as $orgaos)
                        <option value="{{$orgaos->id}}">{{$orgaos->id}}</option>
                    @endforeach
                @endif
                
            </select>
            <input type="submit" class="btn btn-primary" value="@if (isset($uniOrcamentaria))Editar @else Cadastrar @endif">
        </form>
    </div>
@endsection