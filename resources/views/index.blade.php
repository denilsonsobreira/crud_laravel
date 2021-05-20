@extends('templates.temp')
@section('content')
    <h1 class="text-center">CRUD</h1>
    <hr>
    <div class="container">
        @csrf
        <table class="table table-dark table-striped text-center">
            <caption>Tabela De Orgaõs 
                <a href="{{url("crud/create")}}">
                    <button class="btn btn-success">Cadastrar</button>
                </a>      
            </caption>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descrição</th>
                    <th>Codigo</th>
                </tr>
            </thead>
            @foreach ($orgao as $orgaos)
                <tbody>
                    <tr>
                        <td>{{$orgaos->id}}</td>
                        <td>{{$orgaos->descricao}}</td>
                        <td>{{$orgaos->codigo}}</td>
                        <td>
                            <a href="{{"crud/$orgaos->id/edit"}}">
                                <button class="btn btn-info">Editar</button>
                            </a>
                            <a href="{{"crud/$orgaos->id"}}" class="js-del-orgao">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
                </tbody>
            @endforeach 
        </table>

        @csrf
        <table class="table table-dark table-striped ml-3 text-center">
            <caption>Tabela Unidade Orçamentária
                <a href="{{"cad/create"}}">
                    <button class="btn btn-success">Cadastrar</button>
                </a>
            </caption>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Orgão Id</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            @foreach ($uniOrcamentaria as $uniOrcamentarias)
                <tbody>
                    <tr>
                        <td>{{$uniOrcamentarias->id}}</td>
                        <td>{{$uniOrcamentarias->orgao_id}}</td>
                        <td>{{$uniOrcamentarias->descricao}}</td>
                        <td>
                            <a href="{{url("cad/$uniOrcamentarias->id/edit")}}">
                                <button class="btn btn-info">Editar</button>
                            </a>
                            <a href="{{"cad/$uniOrcamentarias->id"}}" class="js-del-uni">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>    
    </div>
    </h2>
@endsection